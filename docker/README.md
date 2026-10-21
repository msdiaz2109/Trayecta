# Entorno de desarrollo (Docker)

Moodle 5.1 (PHP 8.3) y PostgreSQL 16 en contenedores, con el curso de Fundamentos de Ingeniería de Software restaurado desde un respaldo `.mbz`. Pensado para Docker Engine dentro de Ubuntu en WSL. Todos los comandos se ejecutan **dentro de Ubuntu**, desde la carpeta `docker/`.

| Servicio | Imagen | Uso |
|---|---|---|
| `db` | `postgres:16` | Base de datos de Moodle (volumen `pgdata`) |
| `moodle` | `moodlehq/moodle-php-apache:8.3` | Apache + PHP; sirve `public/` en `http://localhost:8080` |
| `cron` | la misma de `moodle` | Ejecuta `admin/cli/cron.php` cada minuto, una vez instalado Moodle |

El código de Moodle **no** está en este repositorio. Se clona en `MOODLE_DIR`, dentro del sistema de archivos de WSL, porque montarlo desde `/mnt/c` es muy lento. `moodle/config.php` se monta encima y toma sus valores de las variables de `.env`. `moodledata` vive en el volumen `moodledata`.

## Primera vez

```bash
cp .env.example .env                 # y ajusta contraseñas y rutas
bash scripts/preparar-codigo.sh      # clona Moodle 5.1 e instala los plugins de plugins.txt
docker compose up -d
bash scripts/instalar-moodle.sh      # crea las tablas y el usuario administrador
bash scripts/restaurar-curso.sh respaldo-moodle2-course-54-fis_tecnm2025-20261020-1323-nu.mbz
```

`restaurar-curso.sh` busca el `.mbz` en `BACKUPS_DIR`, que se monta de solo lectura en `/backups`, y lo restaura como curso nuevo en la categoría 1 (o la que indiques como segundo argumento). El respaldo de 122 MB tarda unos 5 minutos.

## Uso diario

```bash
docker compose up -d          # levantar
docker compose stop           # detener sin borrar datos
docker compose logs -f moodle
docker compose exec -u www-data -w /var/www/html moodle php admin/cli/purge_caches.php
docker compose down -v        # borrar TODO: base de datos y moodledata
```

## Plugins de terceros

El curso restaurado usa `mod_hvp` (32 actividades H5P) y el formato `format_tiles`. Sin ellos, las actividades H5P no se restauran. Las versiones fijadas en `plugins.txt` son las compatibles con Moodle 5.1 en el directorio de plugins de Moodle. Para agregar otro plugin, añade su línea en `plugins.txt`, ejecuta `preparar-codigo.sh` y luego `admin/cli/upgrade.php`.

## Problemas conocidos

- Si el disco se llena durante una restauración, PostgreSQL se recupera solo al reiniciar, pero el curso queda incompleto. Bórralo con `admin/cli/delete_course.php`, vacía `moodledata/temp/backup/` y vuelve a restaurar.
