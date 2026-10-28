# PRM-5 · Estudio de viabilidad: Trayecta dentro de Moodle sin registros extra

> **Proyecto:** Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle  
> **Tarea Jira:** PRM-5  
>  
> **Requisitos relacionados:** REQ-INT-001, REQ-INT-005  
>  
> **Responsable:** Alfredo Aguilar  
>  
> **Estado:** Borrador para revisión del asesor  

**Fecha:** 2026-10-21. **Entorno verificado:** Moodle 5.1.8 + PostgreSQL 16 de pruebas (entorno Docker de PRM-8) con el curso FIS_TECNM2025 restaurado. Los datos de la instancia institucional quedan por confirmar (sección 5).

## Respuestas

1. **¿El estudiante puede entrar y ser identificado sin registro extra?** **Sí.** Dentro de Moodle, ya sea con configuración nativa o con un plugin, la aplicación usa la sesión del estudiante: su identidad, sus inscripciones y su rol en el curso. No hay contraseñas propias ni un segundo inicio de sesión. Por LTI también es posible: Moodle envía la identidad en el lanzamiento.
2. **¿Qué datos de Moodle están disponibles y por qué vía?** Usuarios, inscripciones, grupos, calificaciones y actividad, sin pedirle nada al estudiante (secciones 1 y 2). Desde dentro de Moodle se puede leer y escribir todo. Por REST se puede casi todo, pero **no** los registros de actividad ni las restricciones de acceso (sección 3).
3. **¿La aplicación puede funcionar dentro de la plataforma?** **Sí, con una condición.** Aplicar automáticamente las restricciones de acceso por etiquetas (REQ-INT-004 y REQ-INT-007) solo es posible desde dentro de Moodle: con un plugin propio, o a mano por el docente. Con servicios web no se puede.

## 1. Tablas y relaciones

| Área | Tablas | Relaciones (claves foráneas declaradas en XMLDB) |
|---|---|---|
| Usuarios | `user`, `user_info_field`, `user_info_data`, `user_lastaccess` | Base de casi todo: 138 claves foráneas del esquema apuntan a `user` |
| Cursos | `course`, `course_sections`, `course_modules`, `context` | `course_modules.groupingid → groupings`. La columna `course_modules.availability` guarda las restricciones de acceso en JSON |
| Inscripciones y roles | `enrol`, `user_enrolments`, `role_assignments` | `user_enrolments.userid → user`, `user_enrolments.enrolid → enrol → course`, `role_assignments.userid → user`, `role_assignments.contextid → context` |
| Grupos | `groups`, `groups_members`, `groupings`, `groupings_groups` | `groups_members.userid → user`, `groups_members.groupid → groups → course` |
| Calificaciones | `grade_items`, `grade_grades`, `course_completions` | `grade_grades.userid → user`, `grade_grades.itemid → grade_items → course` |
| Actividad | `logstore_standard_log` | `userid → user`, `courseid → course`, `contextid → context` |

Moodle **no crea claves foráneas en PostgreSQL**: la base de pruebas tiene 504 tablas y 0 restricciones de clave foránea. Las relaciones están declaradas en los archivos XMLDB (`db/install.xml`), que suman 601 claves foráneas, y Moodle las mantiene en su código. Algunas relaciones se resuelven por convención y no tienen clave declarada: `course_modules.course`, y `context.instanceid` según `contextlevel`.

## 2. Datos del estudiante disponibles sin pedirle nada

- **Identidad** (`user`): nombre, usuario, correo, `idnumber` (la matrícula, si la institución la carga), institución, departamento, idioma, zona horaria, primer y último acceso.
- **Situación en el curso:** inscripción y su estado, rol y grupos.
- **Historial en la plataforma:** inscripciones, calificaciones y finalización de otros cursos; insumo posible para enriquecer el perfil, según lo que haya en la instancia institucional.
- **Actividad** (`logstore_standard_log`): evento, recurso, contexto y hora de cada acción. De aquí salen los accesos, la secuencia de navegación y el tiempo entre accesos (REQ-INT-003).
- **No disponible:** el estilo de aprendizaje, la parte psicométrica y las preferencias de formato/disponibilidad. Esos datos se obtienen con las herramientas de perfilamiento (H1 a H3 en la fase inicial, H4 por unidad), dentro de Moodle; no son un registro aparte.

## 3. Vías de conexión

| Vía | Identificación | Qué puede leer | ¿Puede asignar etiquetas y restricciones? | Permisos que necesita | ¿Registro extra? |
|---|---|---|---|---|---|
| **Plugin propio de Moodle** (p. ej. `local_`) | Sesión de Moodle | Todo, con las APIs internas: datos, lector de logs, calificaciones, grupos | **Sí.** API de grupos y `core_availability\tree` para escribir restricciones. Un observador de `course_module_created` oculta los recursos nuevos. Una tarea programada hace el proceso de cada 5 min | Instalar el plugin (administrador del sitio) | No |
| **Configuración nativa** | Sesión de Moodle | Lo que muestran quiz, feedback e informes | Solo a mano: el docente crea grupos y restricciones, lo que aumenta su carga | Docente del curso | No |
| **LTI** (herramienta externa, `mod_lti`) | Lanzamiento con `user_id`, nombre, usuario, correo (según la privacidad configurada), roles y `context_id` | Solo identidad y contexto; lo demás requiere REST | No, por sí sola | Administrador: registrar la herramienta | No (un clic desde el curso) |
| **Servicios web REST** | Token de un usuario de servicio | Usuarios, inscripciones, grupos, contenidos, calificaciones y finalización (767 funciones) | Solo grupos. **No hay ninguna función para restricciones de acceso**, y `core_course_edit_module` solo permite ocultar, mostrar, duplicar y cambiar el modo de grupo. Tampoco hay funciones para leer los logs | Activar servicios web (vienen apagados), protocolo REST, usuario y token con capacidades | No |
| **Lectura directa de la BD** | — | Todo | No recomendable: se salta la lógica y las cachés de Moodle | Credenciales de la BD | No |

## 4. Conclusión

- **Es posible:** identificar al estudiante sin registro extra, leer todos los datos que necesita el perfil y el motor, y asignar etiquetas como grupos.
- **No es posible solo con REST o LTI:** aplicar restricciones de acceso por etiquetas, leer la actividad del estudiante y ocultar al instante los recursos nuevos.
- **Alternativa:** la variante **plugin** del ERS (§2.5). Un plugin local usa las APIs internas de Moodle para escribir las restricciones, leer los logs, ocultar los recursos nuevos y correr el proceso periódico. No modifica el núcleo (REQ-INT-005 v1.1). La configuración nativa también funciona, pero deja en el docente las restricciones de cada recurso, y el ERS pide no aumentar su carga.
- **Para el asesor:**
  - Confirmar la variante plugin, que resuelve el pendiente 1 del ERS §2.8.
  - Confirmar que el acceso a datos con la API `$DB` de Moodle desde el plugin **no** cuenta como "lectura directa de la base de datos": ocurre dentro de Moodle, con sus permisos y su capa de datos.

## 5. Pendientes con la administración de Moodle

Los pasos 1 y 4 de la tarea, revisar el esquema y confirmar permisos con quien administra Moodle, se hicieron sobre la instancia de pruebas. Esa instancia tiene la versión que fija el ERS. Falta confirmar con la administración institucional:

1. La versión real de Moodle: el ERS dice 5.1 y el protocolo dice 4.1.
2. Si permite instalar un plugin local y, de ser necesario, los plugins `mod_hvp` y `format_tiles` que usa el curso.
3. Si permitiría activar los servicios web, por si hicieran falta.
4. Que el registro estándar de actividad (`logstore_standard`) esté activo y cuánto tiempo conserva los registros.
