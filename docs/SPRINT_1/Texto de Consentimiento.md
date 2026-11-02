# PRM-15 · Texto del consentimiento informado y del aviso de privacidad

> **Proyecto:** Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle**Tarea Jira:** PRM-15**Requisitos relacionados:** REQ-PER-001, REQ-EVA-005, REQ-SEG-001, REQ-SEG-002, REQ-SEG-003, REQ-SEG-004**Responsable:** Mariana Sofía Meneses Díaz**Estado:** Borrador para revisión del asesor

---

## 1. Propósito de este documento

Este documento define los textos oficiales del **Consentimiento Informado** y del **Aviso de Privacidad** que el plugin `local_trayecta` presenta a los estudiantes inscritos en la materia de *Fundamentos de Ingeniería de Software* dentro de la plataforma Moodle 5.1 del Instituto Tecnológico de Morelia (ITM / TecNM).

Su redacción atiende:

1. Los lineamientos del [Protocolo de Investigación](file:///c:/Users/Mariana/Desktop/Trayecta/docs/Protocolo%20de%20Investigaci%C3%B3n.md) registrado en el Banco de Proyectos del Departamento de Sistemas y Computación del ITM y los principios éticos de investigación educativa y analítica del aprendizaje (Slade & Prinsloo, 2013).
2. La normativa mexicana aplicable a instituciones públicas de educación superior: **Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados (LGPDPPSO)** (ERS §3.7).
3. Los requisitos funcionales y de seguridad de la [Especificación de Requisitos de Software (ERS)](file:///c:/Users/Mariana/Desktop/Trayecta/docs/ERS.md):
   - **REQ-PER-001:** Aceptación obligatoria del consentimiento antes de presentar cualquier instrumento o acceder a recursos de estudio; registro inmutable con fecha y hora; sin opción de revocación desde la interfaz de la aplicación durante el curso.
   - **REQ-EVA-005:** Notificación explícita al estudiante de que el docente titular tiene acceso a su información completa (identificación, perfil, ruta, interacción y resultados) para fines pedagógicos y de desbloqueo de recursos (REQ-REC-010).
   - **REQ-SEG-001 a REQ-SEG-004 y ERS §2.5:** Tráfico cifrado con HTTPS, control de acceso por rol, conservación en la base de datos institucional de Moodle, bitácora de accesos y anonimización obligatoria en cualquier exportación o publicación de resultados.

---

## 2. Marco ético y normativo revisado

| Marco de referencia                                                  | Aplicación en Trayecta (`local_trayecta`)                                                                                                                                                                                                                                                                                                                                                                                                            |
| -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Protocolo de Investigación y lineamientos éticos del ITM**         | El estudio aplica un diseño cuasiexperimental con una población estimada de 25 a 30 estudiantes de Ingeniería en Sistemas Computacionales divididos en dos cohortes de 15 (Grupo Experimental y Grupo de Control). Se garantiza la equidad académica: las actividades calificadas y los exámenes oficiales del curso no tienen restricciones de acceso para ningún estudiante (REQ-INT-008).                                                         |
| **LGPDPPSO (Normativa mexicana para sujetos obligados — TecNM/ITM)** | Establece el deber de informar mediante el Aviso de Privacidad la identidad del responsable, los datos personales sometidos a tratamiento (incluidos los datos psicométricos de la Herramienta 3), las finalidades, las medidas de seguridad y los mecanismos para ejercer los derechos ARCO (Acceso, Rectificación, Cancelación y Oposición).                                                                                                       |
| **Ética en Analítica del Aprendizaje (Slade & Prinsloo, 2013)**      | Transparencia sobre qué datos de navegación e interacción se leen del registro nativo de Moodle (`mdl_logstore_standard_log`), cómo influyen en la adaptación de la ruta y quién puede consultarlos dentro de la institución.                                                                                                                                                                                                                        |
| **Reglas de operación del sistema (REQ-PER-001 y ERS §2.5)**         | Sin la aceptación del consentimiento no se almacena ninguna respuesta ni se habilitan los instrumentos ni los recursos del curso. Una vez aceptado, el consentimiento queda registrado con marca de tiempo en `mdl_trayecta_consentimiento` y no puede revocarse desde la interfaz del plugin durante el curso activo. Los datos se conservan en la base de datos de Moodle y se anonimizan al exportarse para análisis o publicación (REQ-SEG-003). |

---

## 3. Texto del Consentimiento Informado

> *El siguiente texto está redactado en lenguaje claro para presentarse al estudiante en su primer acceso al plugin local\_trayecta dentro de Moodle, antes de responder cualquier instrumento de perfilamiento (REQ-PER-001).*

### Carta de Consentimiento Informado para Participantes

**Título del proyecto:** Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle (*Trayecta*)**Institución:** Tecnológico Nacional de México (TecNM) / Instituto Tecnológico de Morelia (ITM) — Departamento de Sistemas y Computación**Materia de aplicación:** Fundamentos de Ingeniería de Software (Ingeniería en Sistemas Computacionales, periodo agosto–diciembre 2027)**Investigador responsable / Asesor:** DCE. Claudio Ernesto Florián Arenas**Equipo de investigación:** Alfredo Aguilar Garnica, Mariana Sofía Meneses Díaz y Salvador Alejos Soria

#### 1. Propósito del estudio

Se te invita a participar en un proyecto de investigación tecnológica cuyo objetivo es desarrollar y evaluar **Trayecta** (`local_trayecta`), un plugin integrado en la plataforma institucional Moodle 5.1 que construye un perfil multidimensional de cada estudiante para recomendar rutas personalizadas de objetos de aprendizaje (videos, podcasts, lecturas en texto/PDF, simulaciones, ejercicios e infografías) y analizar su impacto en el desempeño académico y en la experiencia de uso.

Como parte de la metodología de evaluación (diseño cuasiexperimental), el grupo inscrito en la materia (entre 25 y 30 estudiantes) se divide en dos cohortes de aproximadamente 15 estudiantes cada una:

- **Grupo Experimental:** realiza el perfilamiento y recibe rutas de estudio recomendadas y adaptadas a su perfil por unidad temática.
- **Grupo de Control:** utiliza la plataforma Moodle en su modalidad estándar, visualizando todos los recursos de estudio de manera uniforme sin restricciones de etiquetas.

En ambos grupos, **todas las actividades calificadas, tareas y exámenes oficiales de la materia son exactamente los mismos y se presentan sin ninguna restricción de acceso** (REQ-INT-008).

#### 2. Datos que se recopilarán

Al participar y utilizar el sistema dentro de Moodle, el plugin `local_trayecta` recopilará e integrará únicamente información académica y de aprendizaje proveniente de tu cuenta institucional y de los cuestionarios del curso:

1. **Datos de identificación de tu sesión de Moodle (REQ-INT-001):** nombre completo, número de control, correo institucional, identificador de usuario en Moodle, rol e inscripción en el curso (sin solicitar contraseñas adicionales).
2. **Herramienta 1 — Estilos de aprendizaje (REQ-PER-002):** tus respuestas a los 44 reactivos del *Index of Learning Styles* (ILS) de Felder-Silverman al inicio del curso (dimensiones activo/reflexivo, sensorial/intuitivo, visual/verbal y secuencial/global).
3. **Herramienta 2 — Trayectoria: preferencias de formato y disponibilidad de tiempo (REQ-PER-003):** tu valoración (escala de 1 a 5) sobre seis formatos didácticos, las horas semanales que estimas dedicar al estudio de la materia y tus franjas horarias habituales, recopiladas al inicio del curso.
4. **Herramienta 3 — Módulo psicométrico obligatorio (REQ-PER-004):** tus respuestas y puntajes en el instrumento psicométrico estandarizado indicado por el docente titular al inicio del curso para identificar rasgos cognitivos y conductuales asociados al estudio.
5. **Herramienta 4 — Diagnóstico de conocimientos previos por unidad temática (REQ-PER-005):** el puntaje y nivel asignado (`bajo`, `medio` o `alto`) en el examen diagnóstico breve que presentarás dentro de Moodle al comenzar cada nueva unidad temática de la materia.
6. **Datos de interacción y desempeño en Moodle (REQ-INT-003, REQ-EVA-001):** registros de actividad en el curso (recursos consultados, frecuencia de acceso, tiempo estimado de permanencia, secuencia de navegación) y calificaciones parciales y finales obtenidas en las actividades y evaluaciones del curso.
7. **Evaluación de usabilidad y satisfacción (REQ-EVA-002, REQ-EVA-003):** al finalizar el curso, tus respuestas a la escala de usabilidad *System Usability Scale* (SUS, 10 reactivos) y a un cuestionario breve de opinión sobre la herramienta.

#### 3. Uso de los datos y acceso del docente titular

La información recopilada se utilizará exclusivamente para tres fines:

- **Personalización del aprendizaje:** construir tu perfil multidimensional, asignarte automáticamente las etiquetas de acceso (grupos de Moodle) correspondientes a tu nivel y formatos recomendados, y ajustar tu ruta de estudio conforme avances en las unidades temáticas.
- **Seguimiento pedagógico por el docente titular (REQ-EVA-005):** te informamos expresamente que **el docente titular de tu grupo tiene acceso completo a tu información dentro del plugin**, incluyendo tu identificación, tu perfil multidimensional, la ruta de aprendizaje asignada, tus registros de interacción y tus resultados en los diagnósticos y evaluaciones. Este acceso permite al profesor dar seguimiento académico a tu progreso y desbloquearte recursos adicionales de estudio cuando lo solicites o sea pedagógicamente conveniente (REQ-REC-010).
- **Investigación académica anonimizada (REQ-EVA-004, REQ-SEG-003):** al concluir el semestre, los datos estadísticos de desempeño e interacción se exportarán de manera **estrictamente anonimizada** (sin tu nombre, número de control ni correo electrónico) para evaluar el funcionamiento del sistema y elaborar el informe de investigación, artículos científicos y memorias de congreso. Ninguna publicación o reporte académico incluirá datos que permitan identificarte personalmente.

#### 4. Condiciones de participación, obligatoriedad en la plataforma y retiro

- **Requisito para usar el sistema (REQ-PER-001):** la aceptación de este consentimiento informado es **obligatoria** para continuar dentro del plugin `local_trayecta`. Antes de presentar cualquiera de los instrumentos de perfilamiento o acceder a los recursos de estudio gestionados por el plugin, debes aceptar este documento. Si no se acepta, el sistema no guardará ninguna respuesta ni habilitará el acceso a los instrumentos ni a los recursos de la ruta.
- **Vigencia durante el curso (REQ-PER-001):** una vez aceptado el consentimiento en la plataforma, tu aceptación quedará registrada con fecha y hora exactas, y **la aplicación no ofrece una opción técnica para revocar o retirar el consentimiento desde la interfaz durante el transcurso del curso**, a fin de mantener la continuidad operativa de tu ruta de aprendizaje y de las asignaciones del grupo en Moodle.
- **Derechos del estudiante y retiro del estudio estadístico:** tu participación en la investigación no implica ningún costo ni riesgo físico o académico. En caso de tener dudas, inconformidad o requerir que tus registros sean excluidos del procesamiento estadístico final de la investigación (o ejercer tus derechos de protección de datos personales), podrás solicitarlo por escrito en cualquier momento directamente ante el investigador responsable/asesor del proyecto sin que ello afecte tus calificaciones ni tu derecho a presentar las evaluaciones oficiales de la materia.

#### 5. Datos de contacto del investigador responsable

Si tienes cualquier pregunta sobre el proyecto, el funcionamiento de *Trayecta* o el tratamiento de tu información, puedes comunicarte con:

- **Investigador responsable y asesor:** DCE. Claudio Ernesto Florián Arenas
- **Equipo de desarrollo e investigación:** Alfredo Aguilar Garnica (`23121049`), Mariana Sofía Meneses Díaz (`23121132`) y Salvador Alejos Soria
- **Adscripción:** Departamento de Sistemas y Computación, Instituto Tecnológico de Morelia (TecNM)
- **Domicilio institucional:** Av. Tecnológico #1500, Col. Lomas de Santiaguito, C.P. 58120, Morelia, Michoacán, México

#### Declaración de aceptación electrónica (en Moodle)

> `[ ]` **He leído y comprendido el Consentimiento Informado y el Aviso de Privacidad del proyecto Trayecta. Entiendo qué datos se recopilarán en Moodle, que el docente titular de la materia tendrá acceso a mi perfil, ruta y avance con fines pedagógicos, que mis datos serán anonimizados en cualquier publicación académica, y que una vez aceptado este consentimiento no podrá revocarse desde la plataforma durante el curso.\[ Aceptar y continuar al perfilamiento ]**

---

## 4. Texto del Aviso de Privacidad

> *Redactado conforme a los elementos exigidos por la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados (LGPDPPSO) y a los requisitos de seguridad REQ-SEG-001 a REQ-SEG-004 y ERS §2.5.*

### 4.1 Aviso de Privacidad Simplificado (visible en la pantalla inicial del plugin)

**Responsable:** El **Instituto Tecnológico de Morelia (TecNM)**, a través del Departamento de Sistemas y Computación y el grupo de investigación del proyecto *Trayecta* (bajo la coordinación del asesor **DCE. Claudio Ernesto Florián Arenas**), es el responsable del tratamiento de los datos personales que se recaben a través del plugin `local_trayecta` integrado en Moodle 5.1.

**Finalidades del tratamiento:** Sus datos personales, académicos, psicométricos y de interacción en la plataforma serán utilizados única y exclusivamente para: (1) construir su perfil multidimensional de aprendizaje; (2) generar y adaptar rutas personalizadas de recursos didácticos dentro de Moodle; (3) permitir el seguimiento pedagógico por parte del docente titular de la materia; y (4) realizar el análisis estadístico **anonimizado** de impacto académico y usabilidad del proyecto de investigación tecnológica. No se realizarán tratamientos con fines comerciales ni transferencias de datos identificables a terceros ajenos a la institución.

**Consulta del aviso integral:** Puede consultar el Aviso de Privacidad Integral desplegando la sección completa en esta misma pantalla antes de otorgar su consentimiento.

---

### 4.2 Aviso de Privacidad Integral

#### I. Identidad y domicilio del responsable

El **Tecnológico Nacional de México (TecNM) / Instituto Tecnológico de Morelia (ITM)**, a través del **Departamento de Sistemas y Computación** y el equipo responsable del proyecto de investigación tecnológica *«Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle (Trayecta)»*, coordinado por el asesor interno **DCE. Claudio Ernesto Florián Arenas**, con domicilio en Av. Tecnológico #1500, Colonia Lomas de Santiaguito, C.P. 58120, Morelia, Michoacán, México, es el responsable del uso, tratamiento y protección de los datos personales recabados en el plugin `local_trayecta`.

#### II. Datos personales sometidos a tratamiento

Para llevar a cabo las finalidades descritas en el presente aviso, se tratarán las siguientes categorías de datos personales:

1. **Datos identificativos y académicos (obtenidos de la sesión activa de Moodle):** nombre completo, número de control (matrícula), correo electrónico institucional, identificador interno de usuario (`userid`), grupo, cohorte asignada (`experimental` o `control`) y rol en el curso. El plugin no solicita ni almacena contraseñas.
2. **Datos de preferencias y hábitos de estudio:** puntuaciones de las cuatro dimensiones del cuestionario de estilos de aprendizaje ILS de Felder-Silverman (Herramienta 1) y respuestas al cuestionario *Trayectoria* sobre preferencias de formato didáctico, horas disponibles por semana y franjas horarias de estudio (Herramienta 2).
3. **Datos psicométricos (datos sensibles con fines estrictamente psicopedagógicos):** respuestas, puntuaciones de escalas e índices obtenidos en el módulo psicométrico obligatorio (Herramienta 3) determinado por el docente titular y el asesor del curso.
4. **Datos de desempeño académico y navegación en el LMS:** puntajes y niveles (`bajo`, `medio`, `alto`) de los diagnósticos modulares por unidad temática (Herramienta 4), historial de rutas recomendadas, desbloqueos docentes, registros de actividad en Moodle (accesos a recursos, marcas de tiempo, duración estimada de consulta, secuencia de navegación), calificaciones del curso y respuestas a la escala de usabilidad SUS y cuestionario de satisfacción.

#### III. Finalidades del tratamiento

Los datos personales recabados se utilizarán exclusivamente para las siguientes **finalidades primarias** (necesarias para la operación académica y de investigación del sistema):

- Identificar al estudiante inscrito en el curso mediante su sesión activa de Moodle sin registros adicionales (`REQ-INT-001`).
- Construir y actualizar el perfil multidimensional del estudiante y asignarle las etiquetas de acceso (grupos de Moodle) que determinan su ruta de aprendizaje personalizada en cada unidad temática (`REQ-PER-006`, `REQ-PER-008`, `REQ-INT-004`).
- Poner a disposición del **docente titular de la materia** la información completa del estudiante en su grupo (identificación, perfil, ruta, interacción y resultados) para el seguimiento académico, visualización de paneles grupales y desbloqueo justificado de recursos (`REQ-EVA-005`, `REQ-EVA-006`, `REQ-REC-010`).
- Ejecutar el análisis comparativo cuasiexperimental y de usabilidad del proyecto de titulación, exportando conjuntos de datos **previamente anonimizados** para la redacción de reportes técnicos, tesis, artículos científicos arbitrados y memorias de congreso (`REQ-EVA-002` a `REQ-EVA-004`, `REQ-SEG-003`).

**No existen finalidades secundarias** (publicitarias, mercadotécnicas ni de prospección comercial). Tampoco se realizan transferencias de datos personales identificables a personas físicas o morales externas al TecNM/ITM.

#### IV. Almacenamiento, conservación y retención de los datos

- **Almacenamiento local e institucional (REQ-INT-005, ERS §2.1.9):** Todos los datos se almacenan exclusivamente dentro de las tablas propias del plugin (`mdl_trayecta_*`) alojadas en la misma base de datos **PostgreSQL 16** del servidor institucional de **Moodle 5.1** del ITM. El sistema no utiliza servicios externos en la nube ni servidores de terceros fuera de la infraestructura controlada por el proyecto.
- **Política de conservación (ERS §2.5 y §3.5):** Los registros generados durante el curso se conservan íntegros en la base de datos de Moodle y forman parte de los respaldos periódicos de la plataforma (`REQ-OPER-001`), manteniendo el historial de perfiles, diagnósticos por unidad, rutas y marca de tiempo del consentimiento (`mdl_trayecta_consentimiento`). Es obligación estricta del equipo investigador anonimizar los datos cada vez que se exporten, citen o publiquen resultados académicos (`REQ-SEG-003`).

#### V. Medidas de seguridad implementadas

En cumplimiento de los requisitos `REQ-SEG-001` a `REQ-SEG-004` y tomando como referencia el estándar OWASP Top 10 (`ERS §3.7`), el plugin aplica las siguientes medidas de seguridad técnicas y administrativas:

1. **Cifrado en tránsito (REQ-SEG-001):** Toda comunicación entre el navegador del usuario y el servidor Moodle se realiza exclusivamente mediante el protocolo seguro **HTTPS (TLS)**; no se atienden solicitudes sin cifrar.
2. **Control de acceso estricto por rol (REQ-SEG-002, REQ-ADM-001):** La visualización de datos se restringe mediante el sistema de capacidades y roles nativos de Moodle (`estudiante`, `docente`, `administrador`). Un estudiante únicamente puede consultar su propio perfil y su propia ruta, y en ningún caso puede acceder a los datos de otro estudiante.
3. **Minimización y anonimización en exportaciones (REQ-SEG-003):** El módulo de exportación de datos para investigación (`REQ-EVA-004`) suprime o sustituye por seudónimos los campos identificables (nombre, matrícula, correo), garantizando que ningún dato personal aparezca en archivos CSV de análisis ni en publicaciones.
4. **Bitácora de auditoría (REQ-SEG-004, REQ-PER-001):** El sistema registra en una bitácora inmutable con identificador de usuario, fecha y hora cada aceptación del consentimiento informado, así como los accesos administrativos y los cambios en la configuración de parámetros del plugin.

#### VI. Ejercicio de los derechos ARCO (Acceso, Rectificación, Cancelación y Oposición)

Usted tiene derecho a conocer qué datos personales suyos se tienen en el sistema y para qué se utilizan (**Acceso**); a solicitar la corrección de su información en caso de que esté desactualizada, sea inexacta o incompleta (**Rectificación**); a solicitar que se elimine de los registros o bases de datos cuando considere que no está siendo utilizada conforme a los principios y deberes previstos en la normativa (**Cancelación**); así como a oponerse al uso de sus datos personales para fines específicos (**Oposición**).

- **Cómo ejercer sus derechos ARCO:** Para el ejercicio de cualquiera de los derechos ARCO, o para plantear dudas relacionadas con el tratamiento de sus datos dentro del proyecto *Trayecta*, el estudiante puede presentar una solicitud escrita (libre o en formato institucional) dirigida al investigador responsable y asesor del proyecto, **DCE. Claudio Ernesto Florián Arenas**, en el **Departamento de Sistemas y Computación del Instituto Tecnológico de Morelia**, o bien acudir ante la **Unidad de Transparencia del ITM / TecNM**, acreditando su identidad con su credencial institucional de estudiante vigente e indicando la descripción clara de los datos respecto de los que busca ejercer el derecho correspondiente.
- **Integración técnica en Moodle:** Adicionalmente, el plugin `local_trayecta` implementa el proveedor de privacidad nativo de Moodle (`classes/privacy/provider.php`), lo que permite al administrador del LMS atender solicitudes formales de exportación o supresión de datos asociadas a un usuario desde las herramientas de privacidad de Moodle (`MT §2.2`).

#### VII. Cambios al aviso de privacidad

Cualquier modificación sustancial al presente Aviso de Privacidad derivada de ajustes requeridos por el asesor o por el comité académico/ético del ITM será registrada con un nuevo número de versión en la configuración del plugin (`REQ-ADM-002`) y notificada a los estudiantes participantes a través del curso en Moodle.

**Fecha de última actualización:** 1 de noviembre de 2026 · **Versión del texto:** `1.0`

---

## 5. Especificación para implementación en el plugin (`local_trayecta`)

Para que este entregable quede listo para programarse en la tarea **PRM-39 (Consentimiento obligatorio y su registro)** y configurarse en **PRM-37 (Parámetros configurables)**, se definen los componentes técnicos asociados:

### 5.1 Registro en base de datos (`mdl_trayecta_consentimiento`)

Al hacer clic en el botón de aceptación con la casilla marcada, el plugin inserta un registro inmutable en la tabla `mdl_trayecta_consentimiento` (definida en `ERS §3.5` y `MT §3.0`):

| Campo           | Tipo XMLDB   | Descripción                                                       |
| --------------- | ------------ | ----------------------------------------------------------------- |
| `id`            | `INT(10)` PK | Identificador único autogenerado.                                 |
| `userid`        | `INT(10)` FK | Identificador del estudiante en Moodle (`mdl_user.id`).           |
| `courseid`      | `INT(10)` FK | Identificador del curso habilitado (`mdl_course.id`).             |
| `version_texto` | `CHAR(20)`   | Versión del texto aceptado (por defecto `'1.0'`).                 |
| `aceptado`      | `INT(1)`     | `1` (aceptado). No se insertan registros con `0` (`REQ-PER-001`). |
| `timecreated`   | `INT(10)`    | Marca de tiempo Unix exacta (`time()`) del momento de aceptación. |

### 5.2 Reglas de negocio en la interfaz (`REQ-PER-001` y `REQ-ADM-002`)

1. **Bloqueo previo:** Cualquier ruta del plugin (`local/trayecta/index.php`, `profiling.php`, etc.) verifica primero si existe un registro en `mdl_trayecta_consentimiento` para `(userid, courseid)`. Si no existe, redirige invariablemente a la vista de consentimiento.
2. **Validación del formulario:** El botón **«Aceptar y continuar al perfilamiento»** permanece deshabilitado o rechaza el envío en servidor (`required` en `mform`) hasta que el estudiante marque la casilla de verificación.
3. **Inmutabilidad durante el curso:** Una vez registrado el consentimiento, la vista muestra únicamente el comprobante de lectura con la fecha y hora de aceptación (`timecreated`) y el texto íntegro para consulta, sin botón de revocación (`REQ-PER-001`).
4. **Texto configurable por el administrador (REQ-ADM-002, ERS §2.1.8):** El texto del consentimiento y del aviso de privacidad se carga por defecto desde los archivos de idioma del plugin (`lang/es/local_trayecta.php`), pero puede personalizarse desde la pantalla de administración del plugin (`settings.php`) sin modificar el código fuente.

---

## 6. Verificación de criterios de aceptación (PRM-15)

- **Revisión de lineamientos del protocolo y ética del ITM:** Alineado con el [Protocolo de Investigación](file:///c:/Users/Mariana/Desktop/Trayecta/docs/Protocolo%20de%20Investigaci%C3%B3n.md) (población de 25–30 estudiantes, dos cohortes de 15, cuatro herramientas H1–H4, equidad en evaluaciones oficiales `REQ-INT-008`).
- **Consentimiento informado completo:** Incluye propósito del estudio, desglose de los datos recopilados (sesión de Moodle, H1 ILS, H2 Trayectoria, H3 Psicométrico, H4 Diagnóstico por unidad, logs de interacción y SUS), uso de los datos, notificación explícita del acceso del docente titular (`REQ-EVA-005`), reglas sobre obligatoriedad y no revocación en plataforma durante el curso (`REQ-PER-001`), derechos del participante y datos de contacto del investigador responsable.
- **Aviso de privacidad completo (simplificado e integral):** Incluye responsable (ITM / TecNM y asesor), categorías de datos tratados, finalidades primarias, almacenamiento local en PostgreSQL 16 de Moodle y política de conservación/anonimización (`ERS §2.5`, `REQ-SEG-003`), procedimiento para ejercer derechos ARCO y medidas de seguridad (`REQ-SEG-001` a `REQ-SEG-004`).
- **Listo para revisión del asesor e implementación en local\_trayecta:** Incluye la declaración de aceptación, estructura de la tabla `mdl_trayecta_consentimiento` y reglas de interfaz para `PRM-39`.
