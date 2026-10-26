# Flujo de trabajo y control de versiones (GitHub)

**Plugin de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle (local_trayecta)**

Este documento define la estrategia de ramificación (branching) y las convenciones de commits del proyecto. Todo el equipo, incluido quien trabaje con un asistente de IA, debe apegarse a estas reglas para mantener un historial limpio, trazable y estructurado. Está pensado para dos desarrolladores y un asesor, y se alinea con el ERS y el manual técnico del proyecto.

## 1. Estructura de carpetas

El repositorio de GitHub contiene todo lo que se versiona:

```text
Trayecta/
├── docker/                                    # Entorno local: Moodle 5.1 + PHP 8.3 + PostgreSQL 16
├── docs/
│   ├── ERS.md                                 # Especificación de Requisitos de Software (v1.3)
│   ├── ERS_V1.md                              # Respaldo canónico de requisitos
│   ├── Manual Tecnico.md                      # Manual técnico de arquitectura del plugin (v1.0)
│   ├── Plan de Pruebas.md                     # Plan de pruebas PHPUnit y cuasiexperimentales (v1.0)
│   ├── Backlog del producto.md                # Planificación de los 10 sprints
│   ├── Flujo de trabajo y control de versiones (GitHub).md # Este documento
│   ├── SPRINT_0/                              # Entregables metodológicos y de viabilidad
│   │   ├── Backlog Sprint 0.md
│   │   ├── PRM-1_Definir el nombre del proyecto.md # Nombre "Trayecta"
│   │   ├── PRM-2_tabla_reglas_ILS_formatos.md # Matriz estilos ILS vs. formatos
│   │   ├── PRM-3_Validación de los instrumentos que determinan el perfil.md # Fichas de las 4 herramientas
│   │   ├── PRM-4_Reglas para asignar etiquetas y crear ruta.md # Reglas de asignación y cohortes
│   │   ├── PRM-5_estudio_viabilidad.md        # Viabilidad técnica en Moodle
│   │   ├── PRM-6_flujo_proceso.md             # Diagramas de secuencia y flujo por rol
│   │   ├── PRM-7_configuracion_repositorio.md # Configuración del repo, ramas y .gitignore
│   │   └── PRM-8_dockerizar_moodle.md         # Entorno Docker local Moodle + PostgreSQL
│   └── SPRINT_1/                              # Planificación del Sprint 1
│       └── Backlog Sprint 1.md
├── LICENSE                                    # Licencia MIT
└── README.md
```

**Carpeta Local/:** es un directorio estrictamente local, ignorado por Git (se agrega al archivo `.gitignore`). Sirve para notas personales, tokens, credenciales temporales, borradores y datos de prueba reales de estudiantes. Nada de lo que esté ahí se comparte ni se sube al repositorio.

También se ignoran `.env`, `.venv/` y cualquier archivo con secretos (sección 8).

## 2. Ramas principales

El repositorio tiene dos ramas de larga duración:

- **main (versión estable):** contiene solo código probado que está listo para instalarse en el servidor institucional. Bajo ninguna circunstancia se hace commit ni push directo a esta rama. Las actualizaciones llegan únicamente por Pull Request desde `develop`.
- **develop (integración y pruebas):** es la rama donde se consolida el trabajo de ambos desarrolladores y se prueba en el servidor de pruebas antes de liberar. Tampoco acepta push directos: todo se integra por Pull Request.

## 3. Ramas de tareas

Para cualquier desarrollo nuevo, corrección de errores o tarea del backlog se crea una rama temporal a partir de `develop`. Cada rama se enlaza con una tarea del backlog (por ejemplo, tsk-1, tsk-2, prm-1), para que se pueda rastrear qué requisito del ERS resuelve.

**Estructura:** `<tipo>/tsk-<numero>-<descripcion-corta>`

| Tipo | Para qué se usa |
| --- | --- |
| feature/ | Nuevas funcionalidades del plugin |
| fix/ | Corrección de errores |
| test/ | Pruebas automatizadas (PHPUnit) |
| chore/ | Configuración, dependencias y scripts de Docker |
| docs/ | Documentación (ERS, manual técnico, entregables PRM) |

**Ejemplos válidos:**

- `feature/tsk-4-calculo-ils`
- `feature/tsk-9-motor-recomendacion-reglas`
- `fix/tsk-15-sincronizacion-duplica-registros`
- `docs/tsk-3-actualizacion-ers`

**Varias tareas en una sola rama:** si el trabajo cubre más de una tarea, se incluyen todas las claves juntas, separadas por guion, en el mismo lugar: `<tipo>/tsk-<numero1>-<numero2>-<descripcion-corta>`. Ejemplo: `feature/tsk-12-15-etiquetas-de-acceso`.

**Antes de crear la rama:** nadie, ni persona ni asistente de IA, debe inventar o adivinar la clave de la tarea. Si la clave no se conoce, se pregunta al responsable del backlog antes de ejecutar `git checkout -b ...`.

## 4. Convención de commits

Los mensajes de los commits son semánticos, claros y describen qué hace exactamente el cambio. Deben referenciar la tarea que resuelven.

**Estructura:** `[tsk-<numero>] <tipo>: <descripcion clara en imperativo>`

- **Tipos comunes:** `feat` (nueva característica), `fix` (corrección), `test` (pruebas), `chore` (mantenimiento), `docs` (documentación) y `refactor` (mejora de código sin cambiar el comportamiento).
- **Descripción:** se escribe como una orden ("agregar", "corregir"), no como "agregué" o "corrigiendo".

**Ejemplos:**

- `[tsk-4] feat: calcular las cuatro dimensiones del ILS`
- `[tsk-9] feat: ordenar la ruta en bloques semanales segun disponibilidad`
- `[tsk-15] fix: evitar duplicar registros en mdl_trayecta_interaccion`
- `[tsk-6] test: verificar observador de evento course_module_created`
- `[tsk-3] docs: actualizar requisitos del perfilamiento en el ERS`

## 5. Resumen del flujo de trabajo

1. **Sincronizar la base:** `git checkout develop` y luego `git pull`.
2. **Crear la rama:** `git checkout -b feature/tsk-X-nombre`.
3. **Desarrollar y hacer commit:** commits atómicos con la estructura `[tsk-X] tipo: descripcion`.
4. **Probar:** ejecutar las pruebas de Moodle (`vendor/bin/phpunit`) y comprobar que todo pasa antes de subir.
5. **Push:** empujar la rama al repositorio remoto.
6. **Pull Request:** abrir un PR hacia `develop`. La descripción indica qué requisito del ERS resuelve (por ejemplo, REQ-REC-005).
7. **Revisión y merge:** el otro desarrollador revisa y aprueba. Se hace merge a `develop` y se elimina la rama temporal.
8. **Liberación:** cuando `develop` está probado en el servidor de pruebas, se abre un PR de `develop` a `main`, que revisan ambos desarrolladores y se avisa al asesor. Al fusionar se crea una etiqueta de versión (por ejemplo, v1.0.0) y se instala en el servidor institucional siguiendo el manual técnico.

## 6. La documentación también se versiona

El ERS, el manual técnico, el plan de pruebas y los entregables de Sprint 0 viven en la carpeta `docs/`. Cuando un cambio modifica un requisito (REQ-XXX), una decisión de arquitectura o el procedimiento de instalación, el PR incluye la actualización de esos documentos. Un cambio de comportamiento sin su documentación se trata como pendiente, no como terminado.

## 7. Toda migración de base de datos se realiza bajo el estándar de Moodle

La base de datos del plugin (`mdl_trayecta_*`) en PostgreSQL 16 no se modifica directamente con sentencias SQL manuales en producción:

1. Se define o modifica la estructura mediante la herramienta XMLDB de Moodle en `db/install.xml`.
2. Los cambios incrementales de versión se programan en `db/upgrade.php` incrementando el `$plugin->version` en `version.php`.
3. Se verifica la migración ejecutando `php admin/cli/upgrade.php` en el entorno de desarrollo y pruebas.
4. El archivo `db/install.xml` y `db/upgrade.php` se versionan en el mismo PR que introduce la funcionalidad.

## 8. Secretos y datos de estudiantes

- Nunca se sube al repositorio una contraseña de base de datos, credenciales de administración de Moodle ni un archivo `.env`. Esos datos viven en variables de entorno y en la carpeta `Local/`.
- Nunca se suben datos reales de estudiantes. Las pruebas usan datos sintéticos de ejemplo.
- Si un secreto se subió por error, se considera comprometido: se revoca o se cambia de inmediato y se avisa al asesor, además de retirarlo del historial de Git.

## 9. Protección de las ramas

En la configuración de GitHub se activan las siguientes reglas para `main` y `develop`: sin push directo, Pull Request obligatorio y al menos una aprobación antes del merge.