# ERS CHIDILLO

## Especificación de Requisitos de Software (ERS)

**Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle**

Documento basado en la plantilla IEEE/ISO/IEC 29148-2018. Instituto Tecnológico de Morelia, Departamento de Sistemas y Computación.

Autores: Aguilar Garnica Alfredo y Meneses Díaz Mariana Sofía. Asesor: DCE. Claudio Ernesto Florián Arenas.

### Historial de revisiones


| Nombre                                                | Fecha      | Motivo del cambio | Versión |
| ----------------------------------------------------- | ---------- | ----------------- | -------- |
| Aguilar Garnica Alfredo, Meneses Díaz Mariana Sofía | 2026-10-06 | Borrador inicial  | 1.0      |
| Aguilar Garnica Alfredo, Meneses Díaz Mariana Sofía | 2026-10-20 | Cambio de alcance: el sistema vive solo dentro de Moodle (configuración nativa o plugin) y el perfil pasa a un cuestionario integral (psicométrico, Felder y trayectoria) | 1.1 |

> En la versión 1.1, los puntos marcados con **[Pendiente]** están por definir con el asesor. La lista completa está en la sección 2.8.

### 1. Introducción

#### 1.1 Propósito

Este documento especifica los requisitos del sistema, integrado dentro de Moodle, que construye un perfil multidimensional del estudiante y genera rutas de aprendizaje personalizadas. Su finalidad es servir de base común para el diseño, el desarrollo y la verificación del sistema, y se alinea con los cuatro objetivos específicos del protocolo de investigación. El sistema se desarrolla porque los estudiantes de la materia de Fundamentos de Ingeniería de Software accederán a los mismos recursos sin considerar sus características psicométricas, su estilo de aprendizaje ni su trayectoria académica.

#### 1.2 Alcance

El producto, llamado en este documento "la aplicación", funciona completamente dentro de Moodle 5.1, construido con la configuración nativa de Moodle o como un plugin de Moodle (la variante está pendiente, sección 2.8). No hay una aplicación externa. La aplicación:

Aplica un cuestionario integral de perfilamiento con tres partes:

Psicométrica.

Estilos de aprendizaje (Index of Learning Styles de Felder-Silverman).

Trayectoria académica.

Construye un perfil multidimensional por estudiante y lo actualiza con datos de interacción obtenidos de Moodle.

Genera rutas de objetos de aprendizaje mediante un motor de recomendación híbrido, basado inicialmente en reglas y filtrado colaborativo.

Mide la usabilidad con la escala SUS y ofrece al docente un panel con la distribución de perfiles por grupo.

La aplicación no modifica el núcleo de Moodle, no crea contenidos didácticos y no sustituye la evaluación del docente. El alcance llega hasta un prototipo funcional evaluado, dirigido a los estudiantes de la materia de Fundamentos de Ingeniería de Software de la carrera de ISC del ITM. El beneficio esperado es personalizar la experiencia de aprendizaje sin aumentar la carga del docente.

#### 1.3 Referencias

IEEE/ISO/IEC 29148:2018. Systems and software engineering: Life cycle processes: Requirements engineering.

Aguilar Garnica, A., & Meneses Díaz, M. S. (2026). **Protocolo de investigación tecnológica: Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle**. Instituto Tecnológico de Morelia.

Carta compromiso de asignación y seguimiento de proyecto de investigación (Titulación Integral por Proyecto de Investigación), ITM.

Brooke, J. (1996). SUS: A "quick and dirty" usability scale. En P. W. Jordan et al. (Eds.), **Usability Evaluation in Industry** (pp. 189–194). Taylor & Francis.

Burke, R. (2002). Hybrid recommender systems: Survey and experiments. **User Modeling and User-Adapted Interaction, 12**(4), 331–370.

Felder, R. M., & Silverman, L. K. (1988). Learning and teaching styles in engineering education. **Engineering Education, 78**(7), 674–681.

Felder, R. M., & Soloman, B. A. (s.f.). **Index of Learning Styles Questionnaire**. https://www.webtools.ncsu.edu/learningstyles/

Slade, S., & Prinsloo, P. (2013). Learning analytics: Ethical issues and dilemmas. **American Behavioral Scientist, 57**(10), 1510–1529.

Wiley, D. A. (2002). Connecting learning objects to instructional design theory. En D. A. Wiley (Ed.), **The Instructional Use of Learning Objects**. Agency for Instructional Technology.

#### 1.4 Términos


| Término                         | Definición                                                                                                                                                          |
| -------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Perfil multidimensional | Representación del estudiante construida con las tres partes del cuestionario integral: psicométrica, estilos de aprendizaje (Felder) y trayectoria académica. |
| Cuestionario integral | Instrumento único de perfilamiento que reúne las partes psicométrica, de estilos de aprendizaje (ILS) y de trayectoria académica. |
| Estilos de aprendizaje (FSLSM)   | Clasificación de preferencias cognitivas en cuatro dimensiones bipolares: activo/reflexivo, sensorial/intuitivo, visual/verbal y secuencial/global.                 |
| Objeto de aprendizaje            | Recurso didáctico (video, podcast, texto, simulación, ejercicio, infografía) descrito con metadatos educativos.                                                   |
| Ruta de aprendizaje              | Secuencia ordenada de objetos de aprendizaje asignada a un estudiante.                                                                                               |
| Motor de recomendación híbrido | Componente que combina reglas y filtrado colaborativo para relacionar el perfil con objetos y rutas.                                                                 |
| Filtrado colaborativo            | Técnica que recomienda a un estudiante lo que resultó útil a estudiantes con perfiles o comportamientos similares.                                                |
| Arranque en frío                | Situación en la que hay pocos datos iniciales para que el filtrado colaborativo recomiende con fiabilidad.                                                          |
| Plugin de Moodle | Componente que se instala en Moodle con su API de plugins y amplía sus funciones sin modificar su núcleo. |
| Censo                            | Trabajo con la totalidad de los grupos disponibles, sin muestreo probabilístico.                                                                                    |

#### 1.5 Abreviaturas


| Abreviatura | Significado                               |
| ----------- | ----------------------------------------- |
| API         | Application Programming Interface         |
| BD          | Base de datos                             |
| ERS         | Especificación de Requisitos de Software |
| FSLSM       | Felder-Silverman Learning Style Model     |
| ILS         | Index of Learning Styles                  |
| ISC         | Ingeniería en Sistemas Computacionales   |
| ITM         | Instituto Tecnológico de Morelia         |
| LMS         | Learning Management System                |
| OE          | Objetivo específico del protocolo        |
| SUS         | System Usability Scale                    |
| TecNM       | Tecnológico Nacional de México          |

### 2. Descripción general del producto

#### 2.1 Perspectiva del producto

La aplicación es un componente interno de Moodle, la plataforma LMS institucional del ITM, que la amplía sin modificar su núcleo. Se ejecuta dentro de la propia instancia de Moodle y usa su base de datos PostgreSQL 16. Toma de Moodle los contenidos, los usuarios inscritos, las calificaciones y los registros de actividad, y publica las rutas recomendadas para que el estudiante las siga en el mismo curso.

##### 2.1.1 Interfaces del sistema

Aplicación ↔ Moodle 5.1: la aplicación usa las funciones internas de Moodle (grupos, restricciones de acceso, cuestionarios y registros de actividad) y, si se elige plugin, su API de plugins.

Moodle ↔ PostgreSQL 16: base de datos única de Moodle. Si se elige plugin, sus tablas propias viven en esta misma base de datos.

##### 2.1.2 Interfaces de usuario

La interfaz es la de Moodle, en español y adaptable a pantallas de computadora y de teléfono. El estudiante trabaja dentro de su curso de Moodle: acepta el consentimiento informado, contesta el cuestionario integral, consulta su perfil y recibe su ruta de aprendizaje con el motivo de cada recomendación. El docente consulta un panel con la distribución de perfiles por grupo y el avance de las rutas. El administrador configura el catálogo de objetos de aprendizaje y los parámetros del motor.

##### 2.1.3 Interfaces de hardware

No se requiere hardware especial. El servidor es el equipo institucional que aloja a Moodle, y los usuarios acceden con cualquier dispositivo que tenga un navegador web actual.

##### 2.1.4 Interfaces de software


| Componente                         | Versión                                                         |
| ---------------------------------- | ---------------------------------------------------------------- |
| Sistema operativo                  | Ubuntu Server 24.04 LTS                                          |
| Servidor web                       | Apache 2.4                                                       |
| Moodle                             | 5.1 (con PHP 8.3)                                                |
| Base de datos | PostgreSQL 16 (la de Moodle) |
| Lenguaje de la aplicación | PHP 8.3 (el de Moodle) si se elige plugin; configuración nativa de Moodle en la otra variante **[Pendiente]** |
| Pruebas unitarias | Según la variante: PHPUnit si se elige plugin **[Pendiente]** |
| Visualización de resultados       | Python (matplotlib, seaborn) y Power BI, fuera de la aplicación |

##### 2.1.5 Interfaces de comunicación

No hay comunicación por red entre la aplicación y Moodle, porque la aplicación se ejecuta dentro de Moodle. Los usuarios acceden a Moodle por HTTPS desde el navegador.

##### 2.1.6 Restricciones de memoria

La población estimada es de 60 a 80 estudiantes en 2 o 3 grupos, por lo que no se prevén restricciones críticas de memoria. El almacenamiento crecerá sobre todo con los registros de interacción y debe confirmarse con la administración del servidor.

##### 2.1.7 Operaciones

El uso normal incluye el perfilamiento inicial, la generación de rutas, la sincronización periódica de datos de interacción y la consulta de paneles. Las tareas administrativas son mantener el catálogo de objetos, ajustar parámetros del motor y exportar datos. Los datos de la aplicación viven en la base de datos de Moodle y se incluyen en sus respaldos periódicos, con un procedimiento de restauración documentado en el manual técnico.

##### 2.1.8 Requisitos de adaptación del sitio

Para llevarla a otra instancia de Moodle 5.1 se instala el plugin o se replica la configuración nativa, y se configuran sin cambiar código: los cursos habilitados, el texto del consentimiento informado, el catálogo de objetos con sus metadatos y etiquetas de acceso, y los parámetros del motor de recomendación.

##### 2.1.9 Interfaz con servicios

La aplicación no se integra con ningún servicio fuera de Moodle. No depende de servicios en la nube ni de plataformas externas. Power BI se usa solo para analizar datos exportados.

#### 2.2 Funciones del producto

Funcionar dentro de Moodle, con su configuración nativa o como plugin.

Aplicar el cuestionario integral (psicométrico, Felder y trayectoria) y construir el perfil multidimensional.

Mantener un catálogo de objetos de aprendizaje con metadatos.

Generar y ajustar rutas de aprendizaje con un motor híbrido.

Registrar la interacción del estudiante y actualizar su perfil.

Aplicar la escala SUS y un cuestionario de satisfacción.

Mostrar paneles al docente y exportar datos para análisis.

Administrar roles, parámetros y seguridad.

#### 2.3 Características del usuario


| Usuario       | Descripción                                                                                                                                                                     |
| ------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Estudiante    | Alumno de ISC inscrito en Fundamentos de Ingeniería de Software, con experiencia básica en Moodle y sin conocimientos técnicos de la aplicación. Son entre 60 y 80 personas. |
| Docente       | Responsable de la materia. Publica los contenidos, consulta los paneles y no necesita conocimientos de programación.                                                            |
| Administrador | Personal técnico que instala, configura y respalda el sistema. Exportan datos anonimizados para el análisis.                                                                   |

#### 2.4 Limitaciones

La aplicación no modifica el núcleo de Moodle: solo usa su configuración nativa o su API de plugins.

Las versiones de software son fijas y las define el equipo del proyecto (sección 2.1.4).

Los estilos de aprendizaje son una dimensión más del perfil y no el único criterio de recomendación, porque no hay evidencia experimental suficiente de que adaptar la enseñanza al estilo mejore por sí solo los resultados (Pashler et al., 2008).

El tratamiento de datos de estudiantes exige consentimiento informado y protección de la privacidad (Slade & Prinsloo, 2013).

El filtrado colaborativo tiene el problema del arranque en frío (Schein et al., 2002).

El alcance llega hasta un prototipo funcional evaluado en un solo programa académico.

#### 2.5 Supuestos y dependencias

Moodle 5.1 está operativo y el equipo tiene permisos de administrador para configurarlo e instalar plugins.

Los cursos contienen objetos de aprendizaje en varios formatos y niveles por unidad, con al menos dos formatos distintos en cada una (REQ-REC-009), y el docente los publica con anticipación.

Los estudiantes están inscritos formalmente y tienen acceso activo a Moodle.

El servidor institucional ofrece las versiones indicadas y conexión estable.

**Decisiones de diseño.** Son seis decisiones del diseño. Cinco ya están decididas y una está pendiente. Para cada punto se indica qué se decidió y el criterio con el que se verifica en un entorno de pruebas de Moodle.

**Variante de implementación (pendiente).** La aplicación vive solo dentro de Moodle. Se elige entre construirla con la configuración nativa de Moodle (cuestionarios, grupos, restricciones de acceso, campos de perfil e informes) o como un plugin de Moodle con tablas y tareas programadas propias. El criterio es que la variante permita cumplir los requisitos de la sección 3, en especial asignar etiquetas, mantener ocultos los recursos nuevos y calcular el perfil y la ruta, sin modificar el núcleo de Moodle.

**Autenticación del estudiante (decidido).** El estudiante usa su sesión de Moodle: la aplicación vive dentro del curso y toma de Moodle su identidad, su curso y su rol (REQ-INT-001). No se manejan contraseñas propias, no se modifica el núcleo y el estudiante no inicia sesión dos veces.

**Forma de mostrar y restringir la ruta dentro de Moodle (decidido).** Se usan etiquetas de acceso. Después del perfilamiento, la aplicación asigna a cada estudiante etiquetas de nivel por unidad (por ejemplo, U2-bajo) y de formato (por ejemplo, video), y cada recurso de Moodle recibe automáticamente las etiquetas que exige, mediante las restricciones de acceso de Moodle. Quien sube el recurso indica su formato (por ejemplo, video, podcast o PDF), su unidad y su nivel, y la aplicación convierte esos datos en las etiquetas. Los tipos de archivo se agrupan en la lista de formatos del catálogo (REQ-REC-001): por ejemplo, un PDF cuenta como texto. La aplicación asigna las etiquetas en la siguiente sincronización, que se ejecuta en un intervalo corto (REQ-RND-004). Así el estudiante ve solo los recursos que cumplen su combinación (REQ-INT-004). Las actividades calificadas y los exámenes no se restringen por etiquetas (REQ-INT-008). Además, el docente puede marcar como obligatorio cualquier recurso con etiquetas (REQ-REC-011), y entonces lo ven todos los estudiantes con perfilamiento completo. Las etiquetas se implementan como grupos de Moodle, y el campo de perfil del usuario queda como respaldo si en las pruebas resulta más práctico. Como el número de etiquetas depende de las unidades y los formatos, y no de los perfiles que resulten, el diseño no necesita conocer de antemano cuántos perfiles habrá. El desbloqueo del docente (REQ-REC-010) consiste en dar al estudiante una etiqueta de desbloqueo propia de ese recurso, que el recurso acepta además de su combinación normal. Falta comprobar en el entorno de pruebas que las etiquetas y las restricciones se puedan aplicar desde dentro de Moodle sin modificar su núcleo; que la aplicación pueda mantener oculto un recurso nuevo hasta asignarle sus etiquetas (REQ-INT-007) o, si no es posible, que el docente lo suba oculto; y definir dónde indica quien sube el recurso su formato, unidad y nivel (en Moodle o en el catálogo de la aplicación). Esa indicación es obligatoria para publicar un recurso de estudio (REQ-INT-010), y falta comprobar si la aplicación puede impedir la subida sin ella o solo mantener el recurso oculto.

**Forma de obtener el tiempo en recurso (decidido).** El tiempo se estima con el intervalo entre accesos consecutivos del estudiante (REQ-INT-003), con un tope para descartar periodos de inactividad. El valor del tope se define con la prueba piloto y la estimación se documenta en el método como una aproximación. Las calificaciones parciales, que también se obtienen de Moodle, complementan esta señal.

**Valores objetivo de rendimiento (decidido).** Las metas de la sección 3.4 (respuesta de 3 y 10 segundos, 80 usuarios concurrentes) se mantienen como propuestas hasta medirlas. Se fijan con una prueba de carga que simule a los 80 estudiantes y con la prueba piloto de 10 voluntarios, antes de aplicar el sistema a los grupos completos. Se verifican como percentil 95: por ejemplo, el 95 % de las respuestas en 3 segundos o menos.

**Tiempo de retención de los datos (decidido).** Los datos de los estudiantes se mantienen tal cual en la base de datos, sin eliminarlos ni transformarlos. Es responsabilidad del investigador anonimizarlos cada vez que cite o publique resultados, de modo que ningún dato identificable aparezca en artículos, memorias, presentaciones o reportes (REQ-SEG-003). El aviso de privacidad y el consentimiento informado (REQ-PER-001) informan al estudiante de esta conservación.

#### 2.6 Distribución de requisitos


| Módulo                              | Prefijo                    | Objetivo específico |
| ------------------------------------ | -------------------------- | -------------------- |
| Integración con Moodle              | REQ-INT                    | OE1                  |
| Perfilamiento                        | REQ-PER                    | OE2                  |
| Motor de recomendación              | REQ-REC                    | OE3                  |
| Seguimiento y evaluación            | REQ-EVA                    | OE4                  |
| Administración y seguridad          | REQ-ADM, REQ-SEG           | OE1 a OE4            |
| Usabilidad, rendimiento y operación | REQ-USA, REQ-RND, REQ-OPER | OE4                  |

#### 2.7 Requisitos especificados

Los requisitos detallados, con identificador único y criterio de aceptación, están en la sección 3. Los valores numéricos de rendimiento y tiempo son metas propuestas que se confirman con el asesor y se ajustan tras la prueba piloto.

#### 2.8 Pendientes de la versión 1.1

El cambio de alcance de la versión 1.1 deja abiertos estos puntos, que se resuelven con el asesor:

1. Variante de implementación: configuración nativa de Moodle o plugin (sección 2.5). De ella dependen el lenguaje, el almacenamiento (sección 3.5) y la herramienta de pruebas unitarias (sección 3.6).
2. Instrumento, escalas y puntuación de la parte psicométrica (REQ-PER-010).
3. Datos que forman la trayectoria académica y de dónde se toman (REQ-PER-011).
4. De dónde salen el formato preferido del estudiante y su nivel por unidad, que antes daban REQ-PER-003 y REQ-PER-004 y que necesitan las etiquetas de acceso (REQ-INT-004).
5. Si la ruta conserva los bloques semanales sin el dato de disponibilidad (REQ-PER-005, retirado; REQ-REC-005).
6. Actualizar en el protocolo el nombre de OE1 ("Arquitectura cliente-API-LMS") y de OE2 para que coincidan con este documento.

### 3. Requisitos específicos

#### 3.1 Interfaces externas


| Interfaz                    | Entradas                                                                            | Salidas                                                                                     | Formato                                                                  |
| --------------------------- | ----------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------ |
| Moodle (funciones internas) | Identificadores de curso y de usuario | Usuarios inscritos, contenidos del curso, calificaciones parciales y registros de actividad | Datos internos de Moodle |
| Aplicación hacia Moodle | Ruta recomendada por estudiante | Etiquetas de acceso (grupos) del estudiante y restricciones de acceso de los recursos | Configuración de Moodle |
| Estudiante (navegador) | Consentimiento, respuestas del cuestionario integral, SUS y cuestionario de satisfacción | Perfil, ruta de aprendizaje y motivos de la recomendación | Formularios de Moodle |
| Docente (navegador)         | Filtros por grupo y solicitud de exportación                                       | Paneles de distribución de perfiles y avance. Datos para análisis                         | Páginas web con gráficos y exportación en csv de los datos del alumno |

#### 3.2 Funciones

##### Identificación y trazabilidad de requisitos

Cada requisito lleva un identificador con el formato REQ-MÓDULO-NNN (por ejemplo, REQ-PER-002) y se liga a un objetivo específico (OE1 a OE4) según la sección 2.6. Los criterios de aceptación son medibles y se verifican con los métodos de la sección 4.

##### Integración con Moodle (OE1)


| ID          | Requisito                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    | Criterio de aceptación                                                                                                                                                                                                                                                                                         |
| ----------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| REQ-INT-001 | La aplicación identifica a cada estudiante con su sesión de Moodle. | Solo un estudiante inscrito accede a su información, y un usuario no inscrito es rechazado. |
| REQ-INT-002 | La aplicación obtiene de Moodle los contenidos de los cursos habilitados.                                                                                                                                                                                                                                                                                                                                                                                                                   | Los objetos del curso aparecen en el catálogo de la aplicación tras una sincronización, y los recursos nuevos reciben automáticamente sus etiquetas de acceso. La sincronización se ejecuta en un intervalo corto (REQ-RND-004), de modo que un recurso nuevo queda restringido en pocos minutos.          |
| REQ-INT-003 | La aplicación obtiene de los registros de Moodle los datos de interacción de cada estudiante con los recursos del curso: accesos (cuándo y cuántas veces entra a cada recurso), tiempo en recurso (cuánto permanece en él), secuencia de navegación (el orden en que recorre los recursos) y calificaciones parciales (resultados de actividades y evaluaciones). Estos datos alimentan la actualización del perfil (REQ-PER-008) y el ajuste de la ruta (REQ-REC-006). | Tras una sincronización, los cuatro tipos de dato quedan almacenados por estudiante y por recurso, con su fecha, y no se duplican registros si la sincronización se repite. Un estudiante sin actividad aparece sin datos y no genera error.                                                                  |
| REQ-INT-004 | La aplicación publica en Moodle la ruta asignada a cada estudiante y restringe su acceso a ella: el estudiante solo ve los recursos que quedan después del perfilamiento. Para ello le asigna etiquetas de acceso (nivel por unidad y formato), y cada recurso de Moodle recibe automáticamente las etiquetas que exige, a partir del formato, la unidad y el nivel que indicó quien lo subió.                                                                                          | El estudiante ve en Moodle solo los recursos de su ruta, los demás no están disponibles para él, y un cambio de ruta actualiza lo que ve.                                                                                                                                                                    |
| REQ-INT-005 | La aplicación funciona solo dentro de Moodle, con su configuración nativa o como plugin, sin modificar su núcleo. | No hay cambios al código del núcleo de Moodle ni componentes fuera de Moodle. La instalación se hace con la configuración nativa o con la instalación estándar de un plugin. |
| REQ-INT-006 | La aplicación maneja las fallas del proceso periódico que asigna etiquetas y lee la interacción. Si el proceso falla, el estudiante conserva las etiquetas que ya tenía, porque quedan guardadas en Moodle como grupos; los recursos nuevos siguen ocultos hasta recibir sus etiquetas (REQ-INT-007) y los estudiantes nuevos no ven recursos hasta completar el perfilamiento. La aplicación avisa al administrador tras varios intentos fallidos. | Si el proceso falla, la aplicación reintenta y registra el error sin perder datos. Durante la falla, ningún estudiante pierde el acceso que ya tenía ni ve recursos nuevos sin etiquetas. Tras un número de reintentos fallidos configurable, el administrador recibe un aviso. |
| REQ-INT-007 | Los recursos nuevos permanecen ocultos para los estudiantes hasta recibir sus etiquetas de acceso. Si la aplicación no puede ocultarlos automáticamente, el docente los sube ocultos y la aplicación los muestra al asignarles las etiquetas.                                                                                                                                                                                                                                            | Un recurso nuevo no es visible para ningún estudiante antes de la sincronización. Después de ella, solo lo ven quienes cumplen su combinación de etiquetas.                                                                                                                                                 |
| REQ-INT-008 | Las actividades calificadas y los exámenes no se restringen por etiquetas de acceso. Solo se restringen los recursos de estudio.                                                                                                                                                                                                                                                                                                                                                            | Ninguna actividad calificada ni examen tiene restricciones por etiquetas, y todos los estudiantes inscritos los ven y los presentan en las mismas condiciones.                                                                                                                                                  |
| REQ-INT-009 | La aplicación detecta las altas y las bajas de estudiantes en cada sincronización. Un estudiante que se inscribe después de iniciado el curso hace el perfilamiento en su primer acceso. Un estudiante que se da de baja deja de ver los recursos de su ruta, queda marcado como baja y sus datos se conservan.                                                                                                                                                                           | Un estudiante nuevo aparece con el perfilamiento pendiente y no ve recursos de estudio hasta completarlo. Un estudiante dado de baja en Moodle queda marcado como baja, se le quitan las etiquetas, sus datos siguen en la base de datos y ya no cuenta en los paneles de grupos activos.                       |
| REQ-INT-010 | Es obligatorio indicar el formato, la unidad y el nivel de un recurso de estudio para publicarlo. Un recurso sin esos datos no se publica: permanece oculto para los estudiantes, la aplicación lo marca como pendiente de clasificar y avisa al docente. Esto no aplica a las actividades calificadas ni a los exámenes (REQ-INT-008).                                                                                                                                                    | Un recurso de estudio sin formato, unidad o nivel permanece oculto, aparece como pendiente en el catálogo y no recibe etiquetas. Al completar esos datos recibe sus etiquetas en la siguiente sincronización.                                                                                                 |

##### Perfilamiento (OE2)


| ID          | Requisito                                                                                                                                                                                                                                                      | Criterio de aceptación                                                                                                                                                                                                            |
| ----------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| REQ-PER-001 | El consentimiento informado es obligatorio para continuar: antes de cualquier instrumento, el estudiante debe aceptarlo, y sin su aceptación no avanza. Una vez aceptado, el consentimiento no se puede retirar durante el curso.                             | Sin consentimiento no se guarda ninguna respuesta ni se da acceso a los recursos de estudio, y la aceptación queda registrada con su fecha. La aplicación no ofrece una opción para retirar el consentimiento durante el curso. |
| REQ-PER-002 | Como parte de estilos de aprendizaje del cuestionario integral, la aplicación aplica el ILS de 44 ítems con escala dicotómica y calcula las cuatro dimensiones bipolares.                                                                                                                                                   | En casos de prueba, los puntajes coinciden con la clave de calificación del ILS.                                                                                                                                                  |
| REQ-PER-003 | **Retirado en v1.1.** El diagnóstico de conocimientos previos deja de ser un instrumento propio. El origen del nivel por unidad queda pendiente (sección 2.8). | — |
| REQ-PER-004 | **Retirado en v1.1.** La preferencia de formato con escala Likert deja de ser un instrumento propio. La lista de formatos pasa a REQ-REC-001. | — |
| REQ-PER-005 | **Retirado en v1.1.** La disponibilidad de tiempo deja de recogerse. Su papel en la ruta queda pendiente (REQ-REC-005, sección 2.8). | — |
| REQ-PER-006 | La aplicación construye el perfil multidimensional con las tres partes del cuestionario integral. | Cada estudiante que termina el cuestionario tiene un perfil vigente consultable. |
| REQ-PER-007 | El perfilamiento inicial es obligatorio: el estudiante no avanza ni recibe ruta hasta completarlo.                                                                                                                                                             | Mientras el perfilamiento no esté completo, el estudiante no ve ningún recurso de estudio. Un perfilamiento incompleto no genera ruta, y ese caso queda marcado como excluido.                                                   |
| REQ-PER-008 | El perfil se actualiza con los datos de interacción. | Tras una sincronización, el perfil refleja la nueva evidencia y conserva su historial. |
| REQ-PER-009 | La aplicación aplica el perfilamiento como un solo cuestionario integral con tres partes: psicométrica (REQ-PER-010), estilos de aprendizaje con el ILS (REQ-PER-002) y trayectoria académica (REQ-PER-011). | El estudiante contesta las tres partes en un solo flujo, sus respuestas quedan registradas por parte e ítem, y el perfilamiento solo se marca completo cuando las tres partes están contestadas. |
| REQ-PER-010 | La aplicación aplica la parte psicométrica del cuestionario integral. **[Pendiente]** Instrumento, escalas y forma de puntuación. | Se obtiene el puntaje de cada escala por estudiante. **[Pendiente]** Criterio de verificación según el instrumento elegido. |
| REQ-PER-011 | La aplicación recoge la trayectoria académica del estudiante. **[Pendiente]** Datos que la forman y si se toman del cuestionario, de Moodle o de ambos. | Los datos de trayectoria quedan almacenados por estudiante. **[Pendiente]** Criterio según los datos definidos. |

##### Motor de recomendación (OE3)


| ID          | Requisito                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               | Criterio de aceptación                                                                                                                                                                                                                                                                 |
| ----------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| REQ-REC-001 | El catálogo describe cada objeto con formato, unidad de competencia, nivel y duración estimada, siguiendo la lógica de metadatos de IEEE LOM. El formato, la unidad de competencia y el nivel los indica quien sube el recurso. El formato se toma de la lista video, podcast, texto, simulación, ejercicio e infografía, y un PDF o un documento cuenta como texto (antes en REQ-PER-004).                                                                                                                                                                                                                                                                                                                                      | No se recomienda un objeto sin sus metadatos completos.                                                                                                                                                                                                                                 |
| REQ-REC-002 | El motor aplica reglas que relacionan el perfil con los objetos.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Con perfiles de prueba, el motor devuelve los objetos que prevén las reglas.                                                                                                                                                                                                           |
| REQ-REC-003 | El motor incorpora filtrado colaborativo y lo combina con las reglas (enfoque híbrido). Las reglas relacionan el perfil del estudiante con los objetos de aprendizaje, y el filtrado colaborativo recomienda lo que resultó útil a estudiantes con perfiles o comportamientos similares. El motor reúne ambos resultados en una sola recomendación, con un peso para cada componente (Burke, 2002).                                                                                                                                                                | Con datos suficientes (por encima del umbral de REQ-REC-004), la recomendación usa ambos componentes y los combina con pesos configurables por el administrador.                                                                                                                       |
| REQ-REC-004 | Ante pocos datos iniciales, el motor usa solo reglas. Esto atiende el problema del arranque en frío (Schein et al., 2002): al inicio del curso hay pocos estudiantes con perfil completo y casi no hay datos de interacción, por lo que el filtrado colaborativo no tendría en qué basarse. El umbral se mide con dos valores, el número mínimo de estudiantes con perfil completo y el número mínimo de registros de interacción, y el administrador puede cambiarlo. Al superarlo, el motor empieza a combinar reglas y filtrado colaborativo (REQ-REC-003). | Con datos por debajo del umbral configurable, el filtrado colaborativo no se aplica y la ruta se genera solo con reglas. Al superar el umbral, la siguiente generación de rutas incorpora el filtrado colaborativo sin intervención manual. Cada ruta registra qué componentes usó. |
| REQ-REC-005 | El motor genera una ruta ordenada por estudiante. El orden sigue tres reglas: primero los recursos obligatorios (REQ-REC-011); después el orden del curso, unidad por unidad; y dentro de cada unidad, primero lo que corresponde al nivel del estudiante y, entre esos, el formato que mejor puntúa para él según su perfil. **[Pendiente]** La división en bloques semanales dependía de la disponibilidad declarada (REQ-PER-005, retirado); falta decidir si se conserva y con qué dato. | Con perfiles de prueba, el orden respeta las tres reglas y ningún recurso de la ruta se excluye. |
| REQ-REC-006 | La ruta se ajusta cuando llegan nuevos datos de interacción.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           | Tras una sincronización, la ruta puede cambiar y se conserva la anterior.                                                                                                                                                                                                              |
| REQ-REC-007 | El estilo de aprendizaje es una dimensión más del perfil, junto con las partes psicométrica y de trayectoria, con ponderación configurable, y no el único criterio. | El administrador cambia la ponderación sin tocar el código. |
| REQ-REC-008 | Cada recomendación muestra su motivo al estudiante.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    | Todo objeto de la ruta trae una explicación breve.                                                                                                                                                                                                                                     |
| REQ-REC-009 | Mientras haya pocos datos de comportamiento, cada unidad de la ruta incluye al menos dos formatos distintos. Al acumularse evidencia sobre el formato que le funciona al estudiante, la ruta reduce cada unidad a un solo formato. El número de datos que marca ese cambio es un umbral configurable por el administrador. Se aplica asignando al estudiante dos etiquetas de formato al inicio y dejándole solo una al acumularse la evidencia.                                                                                                                      | Con datos por debajo del umbral, cada unidad de la ruta tiene al menos dos formatos. Al superarlo, la siguiente ruta incluye un solo formato por unidad y el cambio queda registrado en la ruta.                                                                                        |
| REQ-REC-010 | El docente puede abrirle a un estudiante un recurso que quedó fuera de su ruta. El desbloqueo se aplica dando al estudiante una etiqueta de desbloqueo propia de ese recurso. El recurso desbloqueado sigue disponible aunque la ruta se recalcule, y el desbloqueo no modifica el perfil del estudiante.                                                                                                                                                                                                                                                              | El docente desbloquea un recurso para un estudiante y este lo ve en Moodle en su siguiente acceso. El desbloqueo queda registrado con docente, estudiante, recurso y fecha, y no se pierde al recalcular la ruta.                                                                       |
| REQ-REC-011 | El docente puede marcar como obligatorio cualquier recurso que lleve etiquetas. Un recurso obligatorio lo ven todos los estudiantes que completaron el perfilamiento, sin importar sus etiquetas, para que ninguno se lo pierda.                                                                                                                                                                                                                                                                                                                                        | Al marcar un recurso como obligatorio, todos los estudiantes con perfilamiento completo lo ven en Moodle tras la siguiente sincronización, y al quitar la marca vuelve a depender de sus etiquetas. La ruta de cada estudiante lo muestra como obligatorio.                            |

##### Seguimiento y evaluación (OE4)


| ID          | Requisito                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 | Criterio de aceptación                                                                                                                                                                                                                                                                                                                                                              |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| REQ-EVA-001 | La aplicación registra la interacción del estudiante con las rutas.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     | Se guardan accesos y avance por estudiante y por ruta.                                                                                                                                                                                                                                                                                                                               |
| REQ-EVA-002 | La aplicación aplica la escala SUS de 10 ítems y un cuestionario de satisfacción con preguntas abiertas.                                                                                                                                                                                                                                                                                                                                                                                                                                               | Se calcula el puntaje SUS por estudiante y se guardan las respuestas abiertas.                                                                                                                                                                                                                                                                                                       |
| REQ-EVA-003 | La aplicación aplica la escala SUS de 10 ítems y un cuestionario de satisfacción con preguntas abiertas, una vez que el estudiante ha usado su ruta de aprendizaje. La escala SUS (Brooke, 1996) mide la usabilidad percibida con 10 afirmaciones que el estudiante califica de 1 a 5, y su resultado es el puntaje que se compara con la meta de REQ-USA-001. El cuestionario de satisfacción recoge, con preguntas abiertas, la opinión del estudiante sobre la experiencia de personalización, y es el componente cualitativo de la evaluación. | Se calcula el puntaje SUS de cada estudiante en una escala de 0 a 100 con la fórmula de Brooke (1996), y en casos de prueba el resultado coincide con el cálculo manual. El puntaje no se calcula si faltan respuestas de los 10 ítems. Las respuestas abiertas se guardan asociadas al estudiante por su seudónimo y se incluyen en la exportación anonimizada de REQ-EVA-004. |
| REQ-EVA-004 | El investigador con perfil de administrador exporta datos                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 | La exportación se realiza en formato CSV.                                                                                                                                                                                                                                                                                                                                           |
| REQ-EVA-005 | El docente consulta la información completa de los estudiantes de sus grupos: identificación, perfil, ruta, interacción y resultados. El consentimiento informado indica al estudiante que el docente tiene acceso a esta información.                                                                                                                                                                                                                                                                                                                | El docente ve esos datos para cada estudiante de sus grupos sin restricciones, y puede identificar a quién desbloquearle un recurso (REQ-REC-010). El texto del consentimiento menciona este acceso.                                                                                                                                                                                |
| REQ-EVA-006 | El docente consulta un panel con la distribución de perfiles por grupo (gráfico de radar por dimensión Felder-Silverman) y el avance de las rutas de sus estudiantes.                                                                                                                                                                                                                                                                                                                                                                                  | El panel muestra cada grupo con sus cuatro dimensiones del ILS y el avance de las rutas de los estudiantes de ese grupo.                                                                                                                                                                                                                                                             |

##### Administración (OE1 a OE4)


| ID          | Requisito                                                                                                   | Criterio de aceptación                                                                                                                                                                                        |
| ----------- | ----------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| REQ-ADM-001 | La aplicación maneja los roles estudiante, docente y administrador.                                        | Cada rol accede solo a sus funciones.                                                                                                                                                                          |
| REQ-ADM-002 | El administrador configura los cursos habilitados, los umbrales y las ponderaciones. | Los cambios se aplican sin modificar código. |
| REQ-ADM-003 | El administrador gestiona el catálogo de objetos de aprendizaje.                                           | Puede dar de alta, editar y desactivar objetos con sus metadatos, y las etiquetas de acceso de cada objeto se asignan automáticamente a partir del formato, la unidad y el nivel que indicó quien lo subió. |

#### 3.3 Requisitos de usabilidad


| ID          | Requisito                                                                      | Criterio de aceptación                                                                           |
| ----------- | ------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------- |
| REQ-USA-001 | La usabilidad percibida alcanza el nivel esperado.                             | Puntaje SUS igual o superior a 68.                                                                |
| REQ-USA-002 | El perfilamiento inicial se completa en un tiempo razonable.                   | Duración total propuesta de 30 minutos o menos, validada en la prueba piloto con 10 voluntarios. |
| REQ-USA-003 | La interfaz está en español, es clara y se adapta a computadora y teléfono. | Las funciones del estudiante se usan sin errores de visualización en ambos tipos de pantalla.    |
| REQ-USA-004 | La interfaz sigue buenas prácticas de accesibilidad.                          | Se toma WCAG 2.1 nivel AA como referencia (propuesto).                                            |

#### 3.4 Requisitos de rendimiento

Los valores son metas propuestas y se ajustan con el asesor y la prueba piloto.


| ID          | Requisito                                                | Criterio de aceptación                                                                                                                   |
| ----------- | -------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| REQ-RND-001 | Las páginas responden con rapidez en carga normal.      | Respuesta de 3 segundos o menos.                                                                                                          |
| REQ-RND-002 | La generación de una ruta es ágil.                     | Ruta generada en 10 segundos o menos.                                                                                                     |
| REQ-RND-003 | La aplicación atiende a todos los estudiantes a la vez. | Soporta 80 usuarios concurrentes sin errores.                                                                                             |
| REQ-RND-004 | La sincronización con Moodle no degrada la plataforma.  | La sincronización se ejecuta en un intervalo corto y configurable (propuesto: cada 5 minutos) y Moodle no pierde capacidad de respuesta. |

#### 3.5 Requisitos lógicos de bases de datos

La aplicación guarda sus datos en la base de datos PostgreSQL 16 de Moodle: en tablas propias si se elige plugin, o en las estructuras nativas de Moodle (grupos, campos de perfil, cuestionarios) en la otra variante **[Pendiente]**.


| Entidad                  | Contenido principal                                                                                                                           |
| ------------------------ | --------------------------------------------------------------------------------------------------------------------------------------------- |
| Estudiante | Usuario de Moodle y seudónimo. Sus etiquetas de acceso (nivel por unidad y formato) se derivan de su perfil. |
| Consentimiento           | Estudiante, texto aceptado y fecha.                                                                                                           |
| Respuesta del cuestionario | Estudiante, parte del cuestionario (psicométrica, Felder o trayectoria), ítem y respuesta. |
| Perfil | Estudiante, resultados de las tres partes del cuestionario, versión y vigencia. |
| Objeto de aprendizaje    | Formato, unidad de competencia, nivel, duración y estado.                                                                                    |
| Ruta y elemento de ruta  | Estudiante, objetos ordenados, versión y motivo.                                                                                             |
| Interacción             | Estudiante, recurso, acceso, tiempo, secuencia y calificación parcial.                                                                       |
| Evaluación              | Puntaje SUS y respuestas abiertas.                                                                                                            |
| Parámetros | Cursos habilitados, umbrales y ponderaciones. |
| Usuario y rol | Roles y permisos de Moodle de docentes y administradores. |

Restricciones: integridad referencial entre entidades, un solo perfil vigente por estudiante y conservación del historial de perfiles y rutas. La aplicación no guarda contraseñas propias. Los datos se conservan tal cual en la base de datos, y es responsabilidad del investigador anonimizarlos al citar o publicar resultados.

#### 3.6 Restricciones de diseño

Moodle 5.1 con PHP 8.3 y PostgreSQL 16. La aplicación se construye con la configuración nativa de Moodle o como plugin con su API de plugins **[Pendiente]**.

Sin modificar el núcleo de Moodle ni depender de componentes fuera de Moodle.

Desarrollo con Scrum adaptado a la investigación aplicada (Fitzgerald et al., 2006; Conboy et al., 2015), con el asesor como Product Owner.

Código y configuración en un repositorio de GitHub con licencia MIT.

Pruebas unitarias con la herramienta que corresponda a la variante (PHPUnit si se elige plugin) **[Pendiente]**.

#### 3.7 Cumplimiento de estándares

IEEE/ISO/IEC 29148:2018 para la especificación de requisitos.

OWASP Top 10 como referencia de seguridad de la aplicación web.

Normativa mexicana de protección de datos personales aplicable a instituciones públicas, con aviso de privacidad y consentimiento informado.

Lineamientos éticos de analítica del aprendizaje (Slade & Prinsloo, 2013).

Metadatos educativos con la lógica de IEEE LOM (Wiley, 2002).

#### 3.8 Atributos del sistema de software


| Atributo       | Requisito                                                                                                                        | Criterio de aceptación                                                             |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------- |
| Confiabilidad | La aplicación tolera fallas de su proceso periódico sin perder datos. | REQ-INT-006 se cumple en las pruebas de integración. |
| Disponibilidad | Disponible durante el horario académico del curso.                                                                              | Meta propuesta de 95 % o más en ese horario.                                       |
| Seguridad      | Acceso por rol, HTTPS, mínimo de datos personales y bitácora de accesos (REQ-SEG-001 a REQ-SEG-004). | Las pruebas de seguridad no encuentran accesos indebidos ni datos expuestos.        |
| Mantenibilidad | Código modular, documentado y con pruebas automatizadas.                                                                        | Existe manual técnico con diagramas de componentes, secuencia y modelo de datos.   |
| Portabilidad | Transferible a cualquier instancia de Moodle 5.1. | La instalación en otra instancia se hace instalando el plugin o replicando la configuración nativa, sin cambiar código. |

Requisitos de seguridad:


| ID          | Requisito                                                            | Criterio de aceptación                                                            |
| ----------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------- |
| REQ-SEG-001 | Todo el tráfico va cifrado con HTTPS.                               | No se atienden solicitudes sin cifrar.                                             |
| REQ-SEG-002 | El control de acceso es por rol.                                     | Un estudiante no ve datos de otro estudiante.                                      |
| REQ-SEG-003 | Los datos personales se reducen al mínimo                           | Los datos que se exporten para la investigación no muestran datos identificables. |
| REQ-SEG-004 | La aplicación registra los accesos y los cambios de configuración. | Cada evento queda en una bitácora con usuario y fecha.                            |

Requisito de operación:


| ID           | Requisito                                                            | Criterio de aceptación                                                |
| ------------ | -------------------------------------------------------------------- | ---------------------------------------------------------------------- |
| REQ-OPER-001 | Los datos de la aplicación se respaldan junto con los de Moodle y se pueden restaurar. | Una restauración de prueba recupera los datos al estado del respaldo. |

### 4. Verificación


| Método                                    | Qué verifica                                                                        | Requisitos                         |
| ------------------------------------------ | ------------------------------------------------------------------------------------ | ---------------------------------- |
| Pruebas unitarias (herramienta según la variante) | Puntuación de cada parte del cuestionario integral (empezando por el ILS), construcción del perfil, reglas y combinación híbrida del motor | REQ-PER, REQ-REC |
| Pruebas de integración | Lectura de datos de Moodle, proceso periódico y publicación de rutas (etiquetas y restricciones) | REQ-INT, REQ-EVA-001 |
| Pruebas funcionales                        | Flujos completos de estudiante, docente y administrador                              | REQ-PER, REQ-REC, REQ-EVA, REQ-ADM |
| Pruebas de seguridad                       | Control de acceso por rol, HTTPS y exposición de datos, con base en OWASP Top 10    | REQ-SEG, REQ-ADM-001               |
| Pruebas de rendimiento                     | Carga simulada de 80 usuarios y tiempos de respuesta                                 | REQ-RND                            |
| Prueba piloto con 10 voluntarios | Claridad del cuestionario integral y tiempo de respuesta | REQ-USA-002, REQ-PER |
| Escala SUS y cuestionario de satisfacción | Usabilidad percibida y retroalimentación abierta                                    | REQ-USA-001, REQ-EVA-002           |
| Revisiones técnicas de código            | Calidad, seguridad y mantenibilidad antes de integrar cambios                        | REQ-SEG, mantenibilidad            |
| Prueba de restauración                    | Respaldo y recuperación de la base de datos                                         | REQ-OPER-001                       |

Las evidencias de validación son el reporte de pruebas automatizadas, los registros de las pruebas de integración y de rendimiento, los puntajes SUS y las observaciones de la piloto. Un requisito se considera cumplido cuando su criterio de aceptación se verifica con al menos uno de estos métodos.

#### Trazabilidad con los objetivos específicos:


| Objetivo específico              | Módulo                   | Requisitos clave          |
| --------------------------------- | ------------------------- | ------------------------- |
| OE1. Integración dentro de Moodle | Integración con Moodle | REQ-INT-001 a REQ-INT-010 |
| OE2. Cuestionario integral de perfilamiento | Perfilamiento | REQ-PER-001 a REQ-PER-011 (sin REQ-PER-003 a 005, retirados) |
| OE3. Relación perfil-rutas       | Motor de recomendación   | REQ-REC-001 a REQ-REC-011 |
| OE4. Usabilidad y funcionamiento  | Seguimiento y evaluación | REQ-EVA, REQ-USA, REQ-RND |

<iframe sandbox="allow-scripts allow-same-origin" aria-hidden="true" tabindex="-1" referrerpolicy="no-referrer" src="https://aif.notion.so/aif-production.html"></iframe>
