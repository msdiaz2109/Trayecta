# Backlog del producto

Son 85 tareas repartidas en 10 sprints, del 12 de octubre de 2026 al 12 de marzo de 2027, para construir y evaluar el plugin de Moodle de perfilamiento multidimensional y recomendación de rutas de aprendizaje (Trayecta), evaluando su impacto académico mediante un diseño cuasiexperimental (grupo experimental vs. grupo de control).

## De un vistazo

| Sprint | Fechas | Qué se logra | Tareas |
| --- | --- | --- | --- |
| Sprint 0 | 12 oct a 23 oct 2026 | Nombre, viabilidad con Moodle, flujo del proceso, instrumentos y reglas de resultados definidos, repositorio creado y Moodle dockerizado | 8 |
| Sprint 1 | 26 oct a 6 nov 2026 | Estructura del repositorio, documentación inicial y estructura base del plugin | 7 |
| Sprint 2 | 9 nov a 20 nov 2026 | Se sabe si el acceso por etiquetas es viable, y hay bocetos de pantallas y logo | 10 |
| Sprint 3 | 23 nov a 4 dic 2026 | Decisión de viabilidad, base de la aplicación y matriz de contenidos | 6 |
| Sprint 4 | 7 dic a 18 dic 2026 | Base de datos, roles, conexión con Moodle y primera sincronización | 9 |
| Receso | 21 dic 2026 a 1 ene 2027 | Sin tareas (por confirmar con el calendario del ITM) |  |
| Sprint 5 | 4 ene a 15 ene 2027 | Sincronización completa, etiquetas e instrumentos de perfilamiento | 8 |
| Sprint 6 | 18 ene a 29 ene 2027 | Perfil completo y primera versión del motor | 8 |
| Sprint 7 | 1 feb a 12 feb 2027 | Rutas con acceso restringido, desbloqueos y seguimiento | 8 |
| Sprint 8 | 15 feb a 26 feb 2027 | Despliegue en el servidor institucional y prueba piloto | 8 |
| Sprint 9 | 1 mar a 12 mar 2027 | Sistema verificado contra el ERS y aceptado por el asesor | 9 |
| Fuera de sprints | Según el calendario del curso | Aplicación a grupos completos, informe, artículo y memoria | 4 |

## Cómo usar este backlog

- Avanza sprint por sprint, de arriba hacia abajo, y respeta la columna Depende de.
- Las tareas están numeradas en el orden en que se hacen. La clave PRM-N va en la rama y en los commits, en minúsculas (prm-N).
- La fecha límite es el día en que la tarea debe estar en `develop` por Pull Request aprobado. Se confirma en la planificación de cada sprint.
- Una tarea está hecha cuando el código está en `develop` con Pull Request revisado, las pruebas pasan, hay archivo de migración si cambió la base de datos y el ERS y el manual quedaron actualizados si el cambio tocó un requisito.
- Áreas: Frontend (interfaces Mustache y JavaScript en Moodle), Backend (lógica del plugin `local_trayecta` en PHP 8.3 y APIs nativas de Moodle), BD (tablas `mdl_trayecta_*` en PostgreSQL 16), Moodle (configuración, eventos y cron), Servidor (instalación y soporte), Repositorio (GitHub), Pruebas (PHPUnit y contraste cuasiexperimental) y Documentación.
- Referencias: ERS es la especificación de requisitos, MT el manual técnico y Plan el plan de pruebas de viabilidad.

## Equipo y reuniones

| Rol o reunión | Quién o cuándo |
| --- | --- |
| Product Owner | El asesor, DCE. Claudio Ernesto Florián Arenas. Ordena el backlog y acepta el trabajo |
| Equipo de desarrollo | Aguilar Garnica Alfredo, Meneses Díaz Mariana Sofía y Salvador Alejos Soria |
| Scrum Master | Rota entre los alumnos en cada sprint |
| Planificación | Primer lunes del sprint. Se eligen las tareas y se acuerda la meta |
| Scrum diario | 15 minutos, tres veces por semana |
| Revisión | Último viernes del sprint, con el asesor |
| Retrospectiva | Después de la revisión |
| Refinamiento | A mitad del sprint, para el siguiente |

## Sprint 0 · 12 oct a 23 oct 2026

**Meta:** nombre del proyecto definido, viabilidad de usar Moodle sin registros extra comprobada, flujo del proceso definido, instrumentos conseguidos y validados, reglas de resultados a etiquetas y rutas aprobadas, repositorio creado y Moodle de pruebas dockerizado. Este sprint no produce código de la aplicación.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-1 | Definir el nombre del proyecto | Documentación | 16 oct 2026 | — | Protocolo |
| PRM-2 | Tabla de reglas entre el ILS y los formatos | Documentación | 17 oct 2026 | — | REQ-REC-002, MT 4.2 |
| PRM-3 | Conseguir y validar los instrumentos que determinan el perfil | Documentación | 16 oct 2026 | — | REQ-PER-002 a 005 |
| PRM-4 | Reglas que convierten los resultados en etiquetas y rutas | Documentación | 23 oct 2026 | PRM-2, PRM-3 | MT 4.2, 4.5 y 4.7 |
| PRM-5 | Estudio de viabilidad: usar Moodle sin registros extra | Moodle, Documentación | 20 oct 2026 | — | REQ-INT-001, REQ-INT-005, MT 2.3 y 5 |
| PRM-6 | Definir el flujo del proceso | Documentación | 23 oct 2026 | PRM-5 | ERS 2.1.2, MT 2.3 |
| PRM-7 | Crear el repositorio con las ramas main y develop, protección de ramas y .gitignore | Repositorio | 23 oct 2026 | — | Flujo de trabajo 1, 2 y 9 |
| PRM-8 | Dockerizar Moodle 5.1 con el respaldo del curso cargado | Servidor, Moodle | 23 oct 2026 | PRM-7 | MT 12 |

**Qué incluye cada tarea clave**

- **PRM-1:** elegir un nombre corto para el proyecto, con una frase que diga qué hace, para usarlo en el repositorio, en la herramienta que ven los estudiantes en Moodle, en las pantallas y en los documentos. Lo aprueba el asesor.
- **PRM-2:** una tabla que dice qué formatos se favorecen para cada polo de las cuatro dimensiones del ILS, con su justificación y su cita.
- **PRM-3:** el ILS de 44 ítems (verificar sus condiciones de uso y si hay versión en español), el diagnóstico de conocimientos previos por unidad hecho con el docente, el cuestionario de preferencias de formato con los seis formatos y el de disponibilidad semanal, validados por el asesor.
- **PRM-4:** una tabla de decisión con ejemplos que dice qué puntajes del diagnóstico son nivel bajo, medio o alto, cómo se combinan la preferencia declarada y el ILS para asignar etiquetas de formato, cómo influye la disponibilidad en los bloques semanales y qué pasa en casos límite (empates, cortes y perfil incompleto). La aprueba el asesor.
- **PRM-5:** revisar cómo está organizada la base de datos de Moodle y cómo se conectan sus datos, y comprobar si la aplicación puede identificar al estudiante y funcionar dentro de la plataforma sin que haga ningún registro adicional. Termina con un informe que aprueba el asesor.
- **PRM-6:** el flujo completo del proceso para el estudiante, el docente y el administrador, dibujado en un diagrama y construido sobre las conclusiones de PRM-5.
- **PRM-7:** crear el repositorio en GitHub con las ramas main y develop, configurar la protección de ramas (sin push directo, PR obligatorio) y añadir el archivo .gitignore adecuado para PHP y Moodle.
- **PRM-8:** levantar un contenedor Docker con Moodle 5.1 y PostgreSQL, cargar el respaldo del curso de prueba y verificar que Moodle arranca y el curso es accesible.

## Sprint 1 · 26 oct a 6 nov 2026

**Meta:** estructura del repositorio lista, documentación inicial subida, Moodle 5.1 de pruebas instalado y estructura base del plugin local (`local_trayecta`).

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-9 | Estructura de carpetas del repositorio | Repositorio | 29 oct 2026 | PRM-7 | MT 12 |
| PRM-10 | Subir la documentación a docs/ | Documentación | 30 oct 2026 | PRM-9 | Flujo de trabajo 6 |
| PRM-11 | PV-01. Instalar Moodle 5.1 con PostgreSQL en el servidor de pruebas | Servidor, Moodle | 30 oct 2026 | Servidor disponible | REQ-OPER-002, Plan PV-01 |
| PRM-12 | Curso de prueba, usuarios y script de llamadas | Moodle, Pruebas | 3 nov 2026 | PRM-11 | Plan 4.2 |
| PRM-13 | Estructura base del plugin local (`local_trayecta`) y version.php | Moodle, Backend | 5 nov 2026 | PRM-12 | REQ-INT-005, MT 2 |
| PRM-14 | Integración con sesiones y roles nativos de Moodle | Moodle, Backend | 6 nov 2026 | PRM-12 | REQ-INT-001, MT 2.3 |
| PRM-15 | Texto del consentimiento informado y del aviso de privacidad | Documentación | 6 nov 2026 | — | REQ-PER-001 |

## Sprint 2 · 9 nov a 20 nov 2026

**Meta:** saber si el acceso por etiquetas es viable y tener los bocetos de las pantallas y el logo.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-16 | PV-06. Grupos por servicios web | Moodle, Pruebas | 11 nov 2026 | PRM-13 | REQ-INT-004, Plan PV-06 |
| PRM-17 | PV-07. Restricciones de acceso por grupo | Moodle, Pruebas | 13 nov 2026 | PRM-16 | REQ-INT-004, Plan PV-07 |
| PRM-18 | PV-08. Campo de perfil como respaldo | Moodle, Pruebas | 16 nov 2026 | PRM-13 | REQ-INT-004, Plan PV-08 |
| PRM-19 | PV-09. Tareas y exámenes sin restricción | Moodle, Pruebas | 18 nov 2026 | PRM-17 | REQ-INT-008, Plan PV-09 |
| PRM-20 | Logo e identidad visual básica (colores y tipografía) | Frontend | 18 nov 2026 | PRM-1 | REQ-USA-003 |
| PRM-21 | PV-10. Desbloqueo y recursos obligatorios | Moodle, Pruebas | 19 nov 2026 | PRM-17 | REQ-REC-010 y 011, Plan PV-10 |
| PRM-22 | PV-11. Ocultar un recurso nuevo | Moodle, Pruebas | 19 nov 2026 | PRM-13 | REQ-INT-007, Plan PV-11 |
| PRM-23 | PV-12. Dónde indicar formato, unidad y nivel | Moodle, Pruebas | 20 nov 2026 | PRM-13 | REQ-INT-010, Plan PV-12 |
| PRM-24 | PV-04. Accesos y tiempo en recurso | Moodle, Pruebas | 20 nov 2026 | PRM-13 | REQ-INT-003, Plan PV-04 |
| PRM-25 | Diseño de las pantallas (bocetos) del estudiante, el docente y el administrador | Frontend | 20 nov 2026 | PRM-6, PRM-20 | REQ-USA-003, ERS 2.1.2 |

## Sprint 3 · 23 nov a 4 dic 2026

**Meta:** cerrar la viabilidad con una decisión y tener la base de la aplicación y la matriz de contenidos.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-26 | PV-05. Recursos nuevos, altas y bajas | Backend, Pruebas | 25 nov 2026 | PRM-13 | REQ-INT-002 y 009, Plan PV-05 |
| PRM-27 | PV-13. Falla de Moodle | Backend, Pruebas | 27 nov 2026 | PRM-26 | REQ-INT-006, Plan PV-13 |
| PRM-28 | PV-14. Carga de la sincronización con 80 estudiantes | Backend, Pruebas | 27 nov 2026 | PRM-26 | REQ-RND-004, Plan PV-14 |
| PRM-29 | Esqueleto y navegación del plugin local_trayecta en Moodle | Backend | 27 nov 2026 | PRM-9 | MT 2 y 6 |
| PRM-30 | Punto de decisión: registrar los resultados, aplicar las decisiones del plan y actualizar el ERS y el manual | Documentación | 2 dic 2026 | Pruebas PV-01 a PV-14 | Plan 6 y 7 |
| PRM-31 | Matriz de contenidos del curso, con al menos dos formatos por unidad | Documentación | 4 dic 2026 | — | REQ-REC-001 y 009 |

## Sprint 4 · 7 dic a 18 dic 2026

**Meta:** base de datos, roles, conexión con Moodle y primera sincronización. Empieza cuando se toma la decisión de PRM-30.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-32 | Esquema XMLDB (`install.xml`) y tablas `mdl_trayecta_*` | BD | 9 dic 2026 | PRM-29 | MT 3, ERS 3.5 |
| PRM-33 | Roles y control de acceso | Backend | 11 dic 2026 | PRM-32 | REQ-ADM-001, REQ-SEG-002 |
| PRM-34 | Gestión de cohortes: asignación a Grupo Experimental y Control | Backend | 11 dic 2026 | PRM-14, PRM-32 | REQ-EVA-002, MT 2.3 |
| PRM-35 | Manejo de excepciones y bitácora de fallas del plugin | Backend | 11 dic 2026 | PRM-13, PRM-29 | REQ-INT-006 |
| PRM-36 | Bitácora de accesos y cambios | Backend, BD | 14 dic 2026 | PRM-32 | REQ-SEG-004 |
| PRM-37 | Parámetros configurables y su pantalla de administración | Backend, Frontend | 16 dic 2026 | PRM-33 | REQ-ADM-002 |
| PRM-38 | Tarea programada de sincronización (`sync_task`) en el cron de Moodle | Backend, BD | 16 dic 2026 | PRM-26, PRM-35 | REQ-INT-002, REQ-RND-004 |
| PRM-39 | Consentimiento obligatorio y su registro | Frontend, Backend, BD | 18 dic 2026 | PRM-15, PRM-34 | REQ-PER-001 |
| PRM-40 | README del repositorio | Documentación | 18 dic 2026 | PRM-29 | MT 6.3 y 7 |

## Sprint 5 · 4 ene a 15 ene 2027

**Meta:** sincronización completa, etiquetas funcionando e instrumentos de perfilamiento.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-41 | Clasificación de recursos con formato, unidad y nivel | Backend, BD | 6 ene 2027 | PRM-23, PRM-38 | REQ-INT-010 |
| PRM-42 | Altas y bajas de estudiantes | Backend | 8 ene 2027 | PRM-38 | REQ-INT-009 |
| PRM-43 | Datos de interacción | Backend, BD | 8 ene 2027 | PRM-24, PRM-38 | REQ-INT-003 |
| PRM-44 | Ocultar recursos nuevos hasta clasificarlos | Backend, Moodle | 8 ene 2027 | PRM-22, PRM-41 | REQ-INT-007 |
| PRM-45 | ILS de 44 ítems | Frontend, Backend | 11 ene 2027 | PRM-3, PRM-39 | REQ-PER-002 |
| PRM-46 | Grupos como etiquetas y restricciones de acceso | Backend, Moodle | 13 ene 2027 | PRM-17, PRM-19, PRM-41 | REQ-INT-004 y 008 |
| PRM-47 | Herramienta 4: Diagnóstico modular por unidad en Moodle | Frontend, Backend, BD | 13 ene 2027 | PRM-3, PRM-39 | REQ-PER-005, REQ-PER-011 |
| PRM-48 | Herramientas 2 y 3: Formatos/disponibilidad y módulo psicométrico | Frontend, Backend | 15 ene 2027 | PRM-3, PRM-39 | REQ-PER-003, REQ-PER-004 |

## Sprint 6 · 18 ene a 29 ene 2027

**Meta:** perfil completo y primera versión del motor con reglas y orden de la ruta.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-49 | Construcción del perfil y perfilamiento obligatorio | Backend, BD | 20 ene 2027 | PRM-45, PRM-47, PRM-48 | REQ-PER-006 y 007 |
| PRM-50 | Catálogo de objetos de aprendizaje | Backend, BD, Frontend | 20 ene 2027 | PRM-41 | REQ-ADM-003, REQ-REC-001 |
| PRM-51 | Manejo de fallas de Moodle y aviso al administrador | Backend | 22 ene 2027 | PRM-27, PRM-35, PRM-36 | REQ-INT-006 |
| PRM-52 | Actualización del perfil con la interacción | Backend | 22 ene 2027 | PRM-43, PRM-49 | REQ-PER-008 |
| PRM-53 | HTTPS y secretos fuera del código | Servidor | 22 ene 2027 | PRM-11 | REQ-SEG-001 |
| PRM-54 | Reglas y puntaje de formato | Backend | 26 ene 2027 | PRM-2, PRM-4, PRM-49, PRM-50 | REQ-REC-002 y 007 |
| PRM-55 | Dos formatos por unidad con umbral | Backend | 29 ene 2027 | PRM-54 | REQ-REC-009 |
| PRM-56 | Orden de la ruta y bloques semanales | Backend | 29 ene 2027 | PRM-54 | REQ-REC-005 |

## Sprint 7 · 1 feb a 12 feb 2027

**Meta:** rutas con acceso restringido en Moodle, desbloqueos, filtrado colaborativo y seguimiento.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-57 | Recursos obligatorios y desbloqueos del docente | Backend, Frontend | 3 feb 2027 | PRM-21, PRM-46, PRM-56 | REQ-REC-010 y 011 |
| PRM-58 | Asignar las etiquetas de acceso al terminar el perfilamiento | Backend, Moodle | 5 feb 2027 | PRM-46, PRM-56, PRM-57 | REQ-INT-004 |
| PRM-59 | Filtrado colaborativo y combinación híbrida | Backend | 5 feb 2027 | PRM-43, PRM-54 | REQ-REC-003 y 004 |
| PRM-60 | Motivo de cada recomendación y ajuste con nueva evidencia | Backend, Frontend | 10 feb 2027 | PRM-56, PRM-59 | REQ-REC-006 y 008 |
| PRM-61 | Registro de la interacción con las rutas | Backend, BD | 10 feb 2027 | PRM-58 | REQ-EVA-001 |
| PRM-62 | Vista del docente con la información completa | Frontend, Backend | 10 feb 2027 | PRM-57 | REQ-EVA-005 |
| PRM-63 | Escala SUS (grupo experimental) y satisfacción | Frontend, Backend, BD | 12 feb 2027 | PRM-58 | REQ-EVA-003 |
| PRM-64 | Respaldos y prueba de restauración | Servidor, BD | 12 feb 2027 | PRM-32 | REQ-OPER-001 |

## Sprint 8 · 15 feb a 26 feb 2027

**Meta:** sistema desplegado en el servidor institucional, probado y listo para aplicarse.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-65 | Panel docente: perfiles, avance y comparativa experimental/control | Frontend, Backend | 19 feb 2027 | PRM-49, PRM-61 | REQ-EVA-004 |
| PRM-66 | Exportación a CSV | Backend | 19 feb 2027 | PRM-61, PRM-63 | REQ-EVA-004 |
| PRM-67 | Despliegue en el servidor institucional | Servidor | 22 feb 2027 | PRM-51, PRM-53 | REQ-OPER-002, MT 6.3 |
| PRM-68 | Pruebas de seguridad con base en OWASP Top 10 | Pruebas | 24 feb 2027 | PRM-33, PRM-53 | REQ-SEG |
| PRM-69 | Prueba de carga con 80 usuarios y valores finales de rendimiento | Pruebas | 24 feb 2027 | PRM-58 | REQ-RND |
| PRM-70 | Revisión de las pruebas unitarias y de integración | Pruebas | 26 feb 2027 | Sprints anteriores | MT 10 |
| PRM-71 | Prueba piloto con 10 voluntarios | Pruebas | 26 feb 2027 | PRM-58, PRM-63 | REQ-USA-002 |
| PRM-72 | Manual técnico completo con diagramas | Documentación | 26 feb 2027 | PRM-67 | MT 2.3 |

## Sprint 9 · 1 mar a 12 mar 2027

**Meta:** sistema verificado contra los criterios de aceptación del ERS y aceptado por el asesor.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-73 | Pruebas funcionales del estudiante | Pruebas | 3 mar 2027 | PRM-58, PRM-63 | REQ-PER, REQ-REC, REQ-INT-004 |
| PRM-74 | Pruebas funcionales del docente | Pruebas | 3 mar 2027 | PRM-62, PRM-65 | REQ-EVA-005 y 006, REQ-REC-010 y 011 |
| PRM-75 | Pruebas funcionales del administrador | Pruebas | 4 mar 2027 | PRM-66 | REQ-ADM, REQ-EVA-004 |
| PRM-76 | Integración de extremo a extremo con Moodle | Pruebas, Moodle | 5 mar 2027 | PRM-51, PRM-58 | REQ-INT-001 a 010 |
| PRM-77 | Pruebas del motor con perfiles de prueba | Pruebas | 5 mar 2027 | PRM-60 | REQ-REC-001 a 011 |
| PRM-78 | Pruebas de privacidad y consentimiento | Pruebas | 8 mar 2027 | PRM-39, PRM-62, PRM-66 | REQ-PER-001, REQ-SEG-002 y 003 |
| PRM-79 | Pruebas de usabilidad previas a la piloto | Pruebas | 8 mar 2027 | PRM-63 | REQ-USA-003 y 004 |
| PRM-80 | Prueba de regresión | Pruebas | 10 mar 2027 | PRM-70 | Todos los requisitos |
| PRM-81 | Prueba de aceptación con el asesor | Pruebas | 12 mar 2027 | PRM-73 a PRM-80 | Todos los requisitos |

## Fuera de los sprints

Estas tareas dependen del calendario del curso o de convocatorias, así que no tienen fecha fija.

| Clave | Tarea | Área | Fecha límite | Depende de | Referencia |
| --- | --- | --- | --- | --- | --- |
| PRM-82 | Aplicación cuasiexperimental (cohorte experimental vs control) y SUS | Pruebas | Según el calendario del curso | PRM-67, PRM-71 | REQ-EVA-002, REQ-USA-001 |
| PRM-83 | Contraste estadístico inferencial de impacto académico e informe | Documentación | Al terminar PRM-82 | PRM-82 | Protocolo, REQ-EVA-002 |
| PRM-84 | Memoria en extenso para un congreso nacional | Documentación | Según la convocatoria | PRM-82 | Protocolo |
| PRM-85 | Presentación de avances en el coloquio institucional | Documentación | Según la convocatoria | PRM-30 | Protocolo |

## Puntos de decisión

| Cuándo | Qué se decide |
| --- | --- |
| Al terminar PRM-5 (20 oct) | Si la aplicación puede identificar al estudiante y funcionar dentro de Moodle sin registros extra, y si hace falta leer la base de datos de Moodle (lo decide el asesor) |
| Al terminar PRM-4 y PRM-6 (23 oct) | Que el asesor apruebe las reglas que convierten los resultados en etiquetas y rutas, antes de programar el motor (PRM-54), y el flujo del proceso |
| Al terminar PRM-30 (2 dic) | Si el acceso por etiquetas es viable por servicios web, o hay que ajustar el diseño con el asesor |
| Al terminar PRM-58 (5 feb) | Que el flujo completo funcione (perfilamiento, ruta y acceso en Moodle) antes de la piloto |
| Antes de PRM-66 (19 feb) | Si la exportación a CSV sale anonimizada o con los datos completos, dado que los datos se conservan y el investigador los anonimiza al citar |
| Al terminar PRM-71 (26 feb) | Los valores finales de pesos, umbrales y tope de inactividad, antes de aplicar el sistema a los grupos completos |
| Al terminar PRM-81 (12 mar) | Que el sistema cumple los criterios del ERS y se puede aplicar a los grupos completos |

## Riesgos del plan

- **Carga por sprint:** son entre 7 y 10 tareas por sprint para dos alumnos, salvo el sprint 0, y algunas son grandes. Si se termina menos de lo planeado, lo que sobra pasa al siguiente sprint y el plan se alarga. El protocolo contemplaba 7 sprints y este plan tiene 10, contando el sprint 0.
- **Resultado del estudio de viabilidad y de las pruebas con Moodle:** si el estudio del sprint 0 (PRM-5) o las pruebas de los sprints 1 a 3 muestran que no se puede trabajar sin registros extra, cambian el flujo, las tareas y las fechas.
- **Calendario del curso:** la aplicación a grupos completos necesita que el curso esté en marcha. Hay que confirmar cuándo se imparte Fundamentos de Ingeniería de Software, porque el protocolo y la carta compromiso no coinciden. El plan llega al 12 de marzo de 2027 sin contar la recolección de datos.
- **Permisos y participación del docente:** el sistema necesita que el docente participe y que el ITM autorice el servidor y el uso de datos. Sin ese acuerdo el plan no se puede ejecutar.
- **Acceso a la base de datos de Moodle:** el estudio del sprint 0 necesita ver su estructura. Si no se da acceso, se trabaja con la documentación oficial del esquema.
- **Servidor de pruebas:** el sprint 1 supone que está disponible desde el 26 de octubre.
- **Receso:** se supone que no se trabaja del 21 de diciembre al 1 de enero.
- **Carga académica:** las semanas de exámenes y entregas de otras materias reducen la capacidad. Conviene revisarla en cada planificación.
- **Sin margen:** no hay un sprint de reserva, así que un retraso mueve las fechas siguientes.