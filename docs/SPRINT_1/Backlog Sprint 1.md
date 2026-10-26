# Backlog: Sprint 1

El sprint 1 va del 26 de octubre al 6 de noviembre de 2026 y deja lista la estructura del repositorio, la documentación inicial subida, Moodle 5.1 de pruebas instalado y la estructura base del plugin local (`local_trayecta`).

## Resumen del sprint

| Dato | Detalle |
| --- | --- |
| Fechas | 26 oct a 6 nov 2026 |
| Meta | Estructura del repositorio lista, documentación inicial subida, Moodle 5.1 de pruebas instalado y estructura base del plugin local (`local_trayecta`) |
| Product Owner | El asesor, DCE. Claudio Ernesto Florián Arenas |
| Equipo | Aguilar Garnica Alfredo, Meneses Díaz Mariana Sofía y Salvador Alejos Soria |
| Scrum Master del sprint | Por definir en la planificación (rota entre los alumnos) |
| Tareas | 7 |
| Esfuerzo propuesto | Por estimar en la planificación |
| Horas disponibles del equipo | Por definir en la planificación |

## Tareas del sprint

| Clave | Tarea | Responsable | Fecha límite | Esfuerzo propuesto |
| --- | --- | --- | --- | --- |
| PRM-9 | Estructura de carpetas del repositorio | ____________ | 29 oct 2026 | __ h |
| PRM-10 | Subir la documentación a docs/ | ____________ | 30 oct 2026 | __ h |
| PRM-11 | PV-01. Instalar Moodle 5.1 con PostgreSQL en el servidor de pruebas | ____________ | 30 oct 2026 | __ h |
| PRM-12 | Curso de prueba, usuarios y script de llamadas | ____________ | 3 nov 2026 | __ h |
| PRM-13 | Estructura base del plugin local (`local_trayecta`) y version.php | ____________ | 5 nov 2026 | __ h |
| PRM-14 | Integración con sesiones y roles nativos de Moodle | ____________ | 6 nov 2026 | __ h |
| PRM-15 | Texto del consentimiento informado y del aviso de privacidad | ____________ | 6 nov 2026 | __ h |

## Detalle de cada tarea

Cada tarea tiene sus detalles clave, con el responsable, y su descripción, que dice qué es, cómo se hace y el criterio de aceptación.

### PRM-9. Estructura de carpetas del repositorio

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 29 oct 2026 |
| Depende de | PRM-7 |
| Esfuerzo propuesto | __ h |
| Área | Repositorio |
| Referencia | MT 12 |

**Descripción**

**Qué:** definir y crear la estructura de carpetas del repositorio para que todo el código, la documentación y los archivos de configuración tengan un lugar claro desde el inicio.

**Cómo:**

1. Revisar el manual técnico (MT 12) para la estructura recomendada de un plugin de Moodle.
2. Crear las carpetas principales: `src/` (código del plugin), `docs/` (documentación), `docker/` (archivos de Docker), `tests/` (pruebas).
3. Incluir archivos base como `.editorconfig`, `CHANGELOG.md` y actualizar el `README.md`.
4. Subir la estructura a `develop` mediante PR.

**Criterio de aceptación:** la estructura de carpetas está en `develop`, sigue las convenciones del MT y el equipo sabe dónde va cada tipo de archivo. (MT 12)

### PRM-10. Subir la documentación a docs/

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 30 oct 2026 |
| Depende de | PRM-9 |
| Esfuerzo propuesto | __ h |
| Área | Documentación |
| Referencia | Flujo de trabajo 6 |

**Descripción**

**Qué:** subir al repositorio toda la documentación generada hasta este punto (ERS, manual técnico, plan de pruebas, backlog, flujo de trabajo y los entregables del sprint 0).

**Cómo:**

1. Copiar los archivos de documentación a la carpeta `docs/` del repositorio.
2. Organizar en subcarpetas por sprint si es necesario (`docs/SPRINT_0/`, `docs/SPRINT_1/`).
3. Verificar que los enlaces internos entre documentos funcionen.
4. Subir mediante PR a `develop`.

**Criterio de aceptación:** toda la documentación vigente está en `docs/` del repositorio y es accesible desde GitHub. (Flujo de trabajo 6)

### PRM-11. PV-01. Instalar Moodle 5.1 con PostgreSQL en el servidor de pruebas

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 30 oct 2026 |
| Depende de | Servidor disponible |
| Esfuerzo propuesto | __ h |
| Área | Servidor, Moodle |
| Referencia | REQ-OPER-002, Plan PV-01 |

**Descripción**

**Qué:** instalar Moodle 5.1 con PostgreSQL 16 en el servidor de pruebas (o confirmar que el entorno Docker de PRM-8 es suficiente para las pruebas de viabilidad) y verificar que funciona correctamente.

**Cómo:**

1. Instalar o verificar Moodle 5.1 con PostgreSQL 16 en el servidor asignado.
2. Habilitar los servicios web REST y el protocolo de herramienta externa (LTI).
3. Crear al menos un usuario administrador y un usuario de prueba.
4. Verificar que Moodle responde correctamente y los servicios web están operativos.
5. Documentar la configuración y los accesos.

**Criterio de aceptación:** Moodle 5.1 con PostgreSQL 16 está instalado, los servicios web REST están habilitados y responden, y hay al menos un usuario administrador operativo. (REQ-OPER-002, Plan PV-01)

### PRM-12. Curso de prueba, usuarios y script de llamadas

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 3 nov 2026 |
| Depende de | PRM-11 |
| Esfuerzo propuesto | __ h |
| Área | Moodle, Pruebas |
| Referencia | Plan 4.2 |

**Descripción**

**Qué:** crear el curso de prueba en Moodle con los usuarios necesarios y un script que permita hacer llamadas a los servicios web para verificar que funcionan.

**Cómo:**

1. Crear el curso de prueba con la estructura definida por el docente.
2. Crear usuarios de prueba con los roles de estudiante, docente y administrador.
3. Inscribir a los usuarios en el curso.
4. Escribir un script (bash o Python) que haga llamadas REST a los servicios web de Moodle y verifique las respuestas.
5. Ejecutar el script y documentar los resultados.

**Criterio de aceptación:** el curso existe con usuarios inscritos, el script hace al menos tres llamadas distintas a los servicios web y todas responden correctamente. (Plan 4.2)

### PRM-13. Estructura base del plugin local (`local_trayecta`) y version.php

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 5 nov 2026 |
| Depende de | PRM-12 |
| Esfuerzo propuesto | __ h |
| Área | Moodle, Backend |
| Referencia | REQ-INT-005, MT 2 |

**Descripción**

**Qué:** crear la estructura mínima del plugin `local_trayecta` para que Moodle lo reconozca como un plugin válido y se pueda instalar.

**Cómo:**

1. Crear la carpeta `local/trayecta/` dentro del directorio de Moodle.
2. Escribir `version.php` con el número de versión, el nombre del componente (`local_trayecta`) y la versión mínima de Moodle requerida.
3. Crear `lang/es/local_trayecta.php` con el nombre del plugin.
4. Verificar que Moodle detecta el plugin y lo instala sin errores.
5. Subir a `develop` mediante PR.

**Criterio de aceptación:** Moodle reconoce `local_trayecta` como plugin instalado, aparece en la lista de plugins y no genera errores. (REQ-INT-005, MT 2)

### PRM-14. Integración con sesiones y roles nativos de Moodle

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 6 nov 2026 |
| Depende de | PRM-12 |
| Esfuerzo propuesto | __ h |
| Área | Moodle, Backend |
| Referencia | REQ-INT-001, MT 2.3 |

**Descripción**

**Qué:** verificar y programar que el plugin puede identificar al usuario autenticado en Moodle, obtener su rol (estudiante, docente o administrador) y actuar en consecuencia, sin pedir ningún registro adicional.

**Cómo:**

1. Usar las APIs nativas de Moodle (`$USER`, `has_capability()`, `is_enrolled()`) para identificar al usuario y su rol.
2. Crear una página de prueba dentro del plugin que muestre el nombre del usuario, su rol en el curso y si está inscrito.
3. Probar con los tres roles (estudiante, docente, administrador) y verificar que el plugin los distingue correctamente.
4. Documentar las funciones de Moodle utilizadas.

**Criterio de aceptación:** el plugin identifica correctamente al usuario autenticado y su rol sin ningún registro adicional, y la página de prueba lo demuestra con los tres roles. (REQ-INT-001, MT 2.3)

### PRM-15. Texto del consentimiento informado y del aviso de privacidad

**Detalles clave**

| Dato | Detalle |
| --- | --- |
| Responsable | ____________ |
| Fecha límite | 6 nov 2026 |
| Depende de | Ninguna |
| Esfuerzo propuesto | __ h |
| Área | Documentación |
| Referencia | REQ-PER-001 |

**Descripción**

**Qué:** redactar el texto del consentimiento informado que el estudiante debe aceptar antes de usar el sistema, y el aviso de privacidad que explica qué datos se recopilan, cómo se usan y cómo se protegen.

**Cómo:**

1. Revisar los lineamientos del protocolo de investigación y el comité de ética del ITM.
2. Redactar el consentimiento informado con: propósito del estudio, datos recopilados, uso de los datos, carácter voluntario, derecho a retirarse y contacto del investigador.
3. Redactar el aviso de privacidad con: responsable, datos tratados, finalidad, almacenamiento, derechos ARCO y medidas de seguridad.
4. Revisarlo con el asesor y ajustarlo.

**Criterio de aceptación:** los textos del consentimiento informado y del aviso de privacidad están redactados, aprobados por el asesor y listos para implementar en el plugin. (REQ-PER-001)

## Impedimentos y riesgos

- **Servidor de pruebas:** PRM-11 necesita que el servidor esté disponible desde el 26 de octubre. Si no está listo, se trabaja con el entorno Docker de PRM-8 como alternativa temporal.
- **Dependencia del sprint 0:** PRM-9 depende de PRM-7 (repositorio creado). Si el sprint 0 no cerró PRM-7, se prioriza al inicio del sprint 1.
- **Acceso a los servicios web de Moodle:** PRM-12 necesita que los servicios web estén habilitados y que haya un token de acceso.
- **Revisión del asesor:** el consentimiento informado (PRM-15) necesita aprobación del asesor y posiblemente del comité de ética.

## Seguimiento diario

| Fecha | Qué se hizo | Qué sigue | Impedimentos |
| --- | --- | --- | --- |
|  |  |  |  |
|  |  |  |  |
|  |  |  |  |

## Cierre del sprint

Se llena el viernes 6 de noviembre de 2026, en la revisión y la retrospectiva.
