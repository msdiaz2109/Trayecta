# PRM-8 · Dockerización de Moodle 5.1 y PostgreSQL para entorno de desarrollo

> **Proyecto:** Trayecta — Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle  
> **Tarea Jira:** PRM-8  
> **Requisitos relacionados:** MT 12, REQ-OPER-002  
> **Responsable:** Alfredo Aguilar  
> **Estado:** Borrador para revisión del asesor  

---

## 1. Propósito de la tarea

Proveer un entorno de ejecución local reproducible y aislado para Moodle 5.1 y PostgreSQL 16 mediante Docker Compose. Esto permite a todo el equipo desarrollar, ejecutar pruebas y verificar la integración de Trayecta sin depender de un servidor externo durante las fases tempranas del proyecto.

## 2. Arquitectura del Entorno Docker

El entorno está compuesto por dos servicios principales orquestados por Docker Compose:
- **`moodle-db`:**
  - Imagen base: `postgres:16-alpine`
  - Base de datos: `moodle`
  - Usuario: `moodleuser`
  - Puerto mapeado: `5432:5432`
  - Persistencia: Volumen de Docker `pgdata`
- **`moodle-app`:**
  - Imagen base: Moodle 5.1 con PHP 8.3 y extensiones requeridas (`pgsql`, `gd`, `intl`, `xml`, `curl`, `zip`, `soap`, `opcache`).
  - Puerto mapeado: `8080:80` (accesible en `http://localhost:8080`)
  - Volúmenes:
    - Directorio de datos `moodledata`
    - Montaje del plugin local en desarrollo en `/var/www/html/local/trayecta`

## 3. Carga del Respaldo del Curso de Prueba

Se preparó el procedimiento para restaurar el curso institucional de prueba (Fundamentos de Ingeniería de Software - `FIS_TECNM2025`):
1. Copia del archivo `.mbz` al contenedor o vía CLI de Moodle (`moosh` / `admin/cli/restore_backup.php`).
2. Creación y asignación de usuarios de prueba para los tres roles clave: estudiante, profesor y administrador.
3. Habilitación de los servicios web REST y generación de tokens de acceso para las pruebas de integración.

## 4. Comandos de Operación Rápida

- **Iniciar el entorno:**
  ```bash
  docker compose up -d
  ```
- **Verificar estado de los contenedores:**
  ```bash
  docker compose ps
  ```
- **Consultar bitácoras de logs:**
  ```bash
  docker compose logs -f moodle-app
  ```
- **Detener el entorno:**
  ```bash
  docker compose down
  ```

## 5. Criterios de Aceptación Cumplidos

- [x] Archivo `docker-compose.yml` funcional y validado con Moodle 5.1 y PostgreSQL 16.
- [x] Contenedores arrancan sin errores y Moodle es accesible vía navegador web en puerto local.
- [x] Curso de prueba restaurado con usuarios de prueba y roles operativos.
- [x] Servicios web REST habilitados y listos para las pruebas de viabilidad e integración.
