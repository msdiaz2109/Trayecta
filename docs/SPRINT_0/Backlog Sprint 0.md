# Backlog: Sprint 0

El sprint 0 va del 12 al 23 de octubre de 2026 y deja listos el nombre del proyecto, la viabilidad de integrarnos con Moodle sin registros extra, el flujo del proceso, los instrumentos que determinan el perfil y las reglas que convierten los resultados en etiquetas y rutas, antes de empezar a construir.

## Resumen del sprint

| Dato | Detalle |
| --- | --- |
| Fechas | 12 oct a 23 oct 2026 |
| Meta | Nombre del proyecto definido, viabilidad y flujo del proceso definidos, instrumentos conseguidos y validados, reglas de resultados a etiquetas y rutas aprobadas, repositorio creado y Moodle dockerizado. No produce código de la aplicación |
| Product Owner | El asesor, DCE. Claudio Ernesto Florián Arenas |
| Equipo | Aguilar Garnica Alfredo, Meneses Díaz Mariana Sofía y Salvador Alejos Soria |
| Scrum Master del sprint | Por definir en la planificación (rota entre los alumnos) |
| Tareas | 8 |
| Esfuerzo propuesto | 55 horas en total, a confirmar en la planificación |
| Horas disponibles del equipo | Por definir en la planificación |

## Tareas del sprint

| Clave | Tarea | Responsable | Fecha límite | Esfuerzo propuesto |
| --- | --- | --- | --- | --- |
| PRM-1 | Definir el nombre del proyecto | Mariana | 16 oct 2026 | 3 h |
| PRM-2 | Tabla de reglas entre el ILS y los formatos | Freddy | 17 oct 2026 | 6 h |
| PRM-3 | Conseguir y validar los instrumentos que determinan el perfil | Mariana | 16 oct 2026 | 12 h |
| PRM-4 | Reglas que convierten los resultados en etiquetas y rutas | Mariana | 23 oct 2026 | 10 h |
| PRM-5 | Estudio de viabilidad: usar Moodle sin registros extra | Freddy | 20 oct 2026 | 8 h |
| PRM-6 | Definir el flujo del proceso | Freddy | 23 oct 2026 | 6 h |
| PRM-7 | Crear el repositorio con las ramas main y develop, protección de ramas y .gitignore | Freddy | 23 oct 2026 | 4 h |
| PRM-8 | Dockerizar Moodle 5.1 con el respaldo del curso cargado | Freddy | 23 oct 2026 | 6 h |

## Detalle de cada tarea

Cada tarea tiene sus detalles clave, con el responsable, y su descripción, que dice qué es, cómo se hace y el criterio de aceptación.

### PRM-1. Definir el nombre del proyecto

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 16 oct 2026 |
| Depende de | Ninguna |
| Esfuerzo propuesto | 3 h |
| Área | Documentación |
| Referencia | Protocolo |

**Descripción**

**Qué:** elegir un nombre corto y propio para el proyecto, que reemplace al título largo en el día a día. Se usará en el nombre del repositorio, en la herramienta externa que ven los estudiantes en Moodle, en las pantallas de la aplicación, en los documentos y en las presentaciones.

**Cómo:**

1. Proponer entre tres y cinco nombres cortos, fáciles de pronunciar y que no se confundan con otros proyectos.
2. Revisar que no exista ya un producto conocido con ese nombre y que sirva como nombre del repositorio y de la aplicación.
3. Elegir uno con el asesor y escribir una frase que diga qué hace el proyecto.
4. Anotar el nombre y la frase en el ERS y usarlos al crear el repositorio.

**Criterio de aceptación:** el nombre está elegido y aprobado por el asesor, tiene una frase que lo describe y queda escrito en el backlog y en el ERS. (Protocolo)

### PRM-2. Tabla de reglas entre el ILS y los formatos

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | Freddy |
| Fecha límite | 17 oct 2026 |
| Depende de | Ninguna |
| Esfuerzo propuesto | 6 h |
| Área | Documentación |
| Referencia | REQ-REC-002, manual técnico 4.2 |

**Descripción**

**Qué:** una tabla que dice, para cada una de las cuatro dimensiones del ILS (activo o reflexivo, sensorial o intuitivo, visual o verbal, secuencial o global), qué formatos de recurso se favorecen: video, podcast, texto, simulación, ejercicio e infografía.

**Cómo:**

1. Listar las cuatro dimensiones con sus dos polos cada una, a partir de Felder y Silverman (1988).
2. Proponer para cada polo uno o más formatos, con una justificación breve y su cita.
3. Tener presente que el estilo es una dimensión más del perfil y no el único criterio (Pashler et al., 2008).
4. Revisarla con el asesor y ajustarla.

**Criterio de aceptación:** la tabla cubre las cuatro dimensiones con sus dos polos, cada polo tiene al menos un formato favorecido con su justificación y su cita, y el asesor la aprobó. (REQ-REC-002)

### PRM-3. Conseguir y validar los instrumentos que determinan el perfil

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | Mariana |
| Fecha límite | 16 oct 2026 |
| Depende de | Ninguna |
| Esfuerzo propuesto | 12 h |
| Área | Documentación |
| Referencia | REQ-PER-002 a REQ-PER-005 |

**Descripción**

**Qué:** formalizar las cuatro herramientas de perfilamiento del estudiante:
1. **Herramienta 1:** *ILS de Felder-Silverman* (44 reactivos dicotómicos).
2. **Herramienta 2:** *Cuestionario de preferencias de formato (1 a 5) y disponibilidad semanal de estudio (horas y franjas)*.
3. **Herramienta 3:** *Módulo psicométrico obligatorio* (evaluación psicométrica estandarizada indicada por el docente titular/asesor).
4. **Herramienta 4:** *Diagnóstico de conocimientos previos por unidad* (aplicado de forma modular en Moodle al inicio de cada unidad temática, con banco de reactivos provisto por el profesor).

**Cómo:**

1. Obtener el ILS (H1), verificar sus condiciones de uso y validar la versión en español para ingeniería.
2. Diseñar el cuestionario inicial de preferencias y disponibilidad (H2: formatos de 1 a 5 y horas/franjas).
3. Acordar con el docente/asesor la batería del módulo psicométrico obligatorio (H3) y sus escalas de ponderación.
4. Establecer con el docente el protocolo de entrega del banco oficial de reactivos para la Herramienta 4 previo a cada unidad temática.
5. Consolidar el documento PRM-3 con las fichas técnicas y claves de calificación.

**Criterio de aceptación:** las especificaciones de las cuatro herramientas quedan validadas y alineadas con la ERS v1.3. (REQ-PER-002 a REQ-PER-005)

### PRM-4. Reglas que convierten los resultados en etiquetas y rutas

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | Mariana |
| Fecha límite | 23 oct 2026 |
| Depende de | PRM-2, PRM-3 |
| Esfuerzo propuesto | 10 h |
| Área | Documentación |
| Referencia | REQ-REC-002, REQ-REC-005, REQ-REC-009, manual técnico 4.2, 4.5 y 4.7 |

**Descripción**

**Qué:** una tabla de decisión con ejemplos que define cómo los resultados de las herramientas de perfilamiento se traducen en etiquetas de acceso condicional (grupos de Moodle) y rutas de aprendizaje para el **Grupo Experimental** (el Grupo de Control cursa con acceso uniforme estándar).

**Cómo:**

1. Definir los cortes del diagnóstico por unidad (Herramienta 4) que corresponden a nivel `bajo`, `medio` o `alto` cada vez que se habilita una nueva unidad.
2. Definir la combinación entre preferencias de formato y dimensiones del ILS para asignar las etiquetas iniciales de formato.
3. Definir la regla de especialización de formato (de dos etiquetas iniciales a una al acumular evidencia de interacción).
4. Definir cómo la disponibilidad horaria (Herramienta 2) empaqueta la ruta en bloques semanales sin omitir objetos de estudio.
5. Explicitar que los exámenes y evaluaciones oficiales no se restringen para ningún estudiante.
6. Resolver ejemplos de asignación y revisar con el asesor.

**Criterio de aceptación:** la tabla de decisión con sus ejemplos resueltos está aprobada por el asesor y delimita la personalización exclusiva para el grupo experimental. (REQ-REC-002, REQ-REC-005, REQ-REC-009)

### PRM-5. Estudio de viabilidad: usar Moodle sin registros extra

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 20 oct 2026 |
| Depende de | Ninguna |
| Esfuerzo propuesto | 8 h |
| Área | Moodle, Documentación |
| Referencia | REQ-INT-001, REQ-INT-005, manual técnico 2.3 y 5 |

**Descripción**

**Qué:** averiguar si es posible hacer lo que queremos (perfilar al estudiante y darle su ruta) sin que el estudiante haga ningún registro adicional y dentro de la propia plataforma Moodle, antes de que tome un curso. Para eso se revisa cómo está organizada la base de datos de Moodle (qué tablas guardan usuarios, cursos, inscripciones, grupos, calificaciones y registros de actividad), cómo se conectan entre sí y cómo se puede conectar la aplicación con esos datos.

**Cómo:**

1. Pedir a quien administra Moodle la estructura de la base de datos de la instancia donde se va a probar (acceso de lectura al esquema o el esquema documentado) y revisar las tablas de usuarios, cursos, inscripciones, grupos, calificaciones y registros de actividad.
2. Documentar cómo se relacionan esas tablas y qué datos del estudiante ya están disponibles sin pedirle nada.
3. Revisar las formas de conectar la aplicación: entrada desde el curso (LTI), servicios web REST y, solo si hace falta, lectura directa de la base de datos. Para cada una, anotar qué datos entrega, qué permisos necesita y si el estudiante tendría que hacer algún registro adicional.
4. Confirmar con quien administra Moodle qué se puede habilitar (servicios web, herramienta externa) y con qué permisos.
5. Escribir un informe corto con lo que es posible, lo que no y la alternativa para lo que no.

**Criterio de aceptación:** hay un informe de una o dos páginas, aprobado por el asesor, que responde si el estudiante puede entrar y ser identificado sin registro extra, qué datos de Moodle están disponibles y por qué vía, y si la aplicación puede funcionar dentro de la plataforma. Si el estudio concluye que hace falta leer directamente la base de datos, lo decide el asesor, porque el ERS lo excluye hoy. (REQ-INT-001, REQ-INT-005)

### PRM-6. Definir el flujo del proceso

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 23 oct 2026 |
| Depende de | PRM-5 |
| Esfuerzo propuesto | 6 h |
| Área | Documentación |
| Referencia | ERS 2.1.2, manual técnico 2.3 |

**Descripción**

**Qué:** definir paso a paso el proceso completo que seguirán el estudiante, el docente y el administrador dentro de la plataforma, tomando en cuenta lo que concluyó el estudio de viabilidad: sin registros extra y todo dentro de Moodle.

**Cómo:**

1. Partir de las conclusiones de PRM-5 y de lo decidido en el ERS.
2. Describir el recorrido del estudiante: entra al curso en Moodle, abre la herramienta, acepta el consentimiento, contesta los instrumentos, recibe su perfil y su ruta, y ve en el curso solo los recursos que le tocan.
3. Describir el recorrido del docente (sube y clasifica recursos, marca obligatorios, desbloquea y consulta el panel) y el del administrador (configura y respalda).
4. Describir lo que pasa por detrás: la sincronización con Moodle, la asignación de etiquetas y qué pasa si algo falla.
5. Dibujar el flujo en un diagrama con los tres roles, marcando dónde interviene Moodle y dónde la aplicación.
6. Revisarlo con el asesor y ajustarlo.

**Criterio de aceptación:** hay un diagrama con su descripción del flujo completo, que no le pide al estudiante ningún registro fuera de Moodle, aprobado por el asesor, y que sirve de base para los bocetos de pantallas y las pruebas funcionales. (ERS 2.1.2)

### PRM-7. Crear el repositorio con las ramas main y develop, protección de ramas y .gitignore

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 23 oct 2026 |
| Depende de | Ninguna |
| Esfuerzo propuesto | 4 h |
| Área | Repositorio |
| Referencia | Flujo de trabajo 1, 2 y 9 |

**Descripción**

**Qué:** crear el repositorio oficial del proyecto en GitHub con la estructura de ramas y las reglas de protección definidas en el flujo de trabajo.

**Cómo:**

1. Crear el repositorio en la organización o cuenta acordada, con el nombre del proyecto (resultado de PRM-1).
2. Crear las ramas `main` (producción) y `develop` (integración).
3. Configurar las reglas de protección: sin push directo a `main` ni a `develop`, PR obligatorio con al menos una revisión aprobada.
4. Añadir el archivo `.gitignore` adecuado para PHP, Moodle y el entorno Docker.
5. Hacer el primer commit con el README mínimo y el `.gitignore`.

**Criterio de aceptación:** el repositorio existe, tiene las ramas `main` y `develop` protegidas, el `.gitignore` cubre los archivos de PHP/Moodle/Docker y el primer commit está en `main`. (Flujo de trabajo 1, 2 y 9)

### PRM-8. Dockerizar Moodle 5.1 con el respaldo del curso cargado

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 23 oct 2026 |
| Depende de | PRM-7 |
| Esfuerzo propuesto | 6 h |
| Área | Servidor, Moodle |
| Referencia | MT 12 |

**Descripción**

**Qué:** preparar un entorno local de Moodle 5.1 con Docker para que el equipo pueda desarrollar y probar sin depender de servidores externos.

**Cómo:**

1. Escribir el `docker-compose.yml` con los servicios de Moodle 5.1 y PostgreSQL 16.
2. Cargar el respaldo del curso de prueba proporcionado por el docente.
3. Verificar que Moodle arranca, el curso es accesible y los servicios web están habilitados.
4. Subir el `docker-compose.yml` al repositorio (rama `develop`).

**Criterio de aceptación:** cualquier miembro del equipo puede levantar Moodle 5.1 con `docker compose up` y acceder al curso de prueba. El archivo `docker-compose.yml` está en el repositorio. (MT 12)

## Impedimentos y riesgos

- **Depende de terceros:** los instrumentos (PRM-3) necesitan al docente de la materia para listar las unidades y elaborar el diagnóstico, y el estudio de viabilidad (PRM-5) necesita a quien administra Moodle. Si no hay respuesta a tiempo, hay que avisar al asesor ese mismo día.
- **Acceso a la base de datos de Moodle:** el estudio necesita ver la estructura de la base de datos. Si no se puede dar acceso, se trabaja con la documentación oficial del esquema y se anota como limitación.
- **Revisión del asesor:** las ocho tareas necesitan su aprobación. Conviene agendar con él desde la planificación.
- **Condiciones de uso del ILS:** si no se puede usar tal cual o no hay versión en español, el instrumento cambia y hay que decidirlo con el asesor.

## Seguimiento diario

| Fecha | Qué se hizo | Qué sigue | Impedimentos |
| --- | --- | --- | --- |
|  |  |  |  |
|  |  |  |  |
|  |  |  |  |

## Cierre del sprint

Se llena el viernes 23 de octubre de 2026, en la revisión y la retrospectiva.