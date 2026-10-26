# Protocolo de investigación tecnológica

**Titulación Integral por Proyecto de Investigación**
**Carta compromiso de asignación y seguimiento de proyecto de investigación del Banco de Proyectos**

> **Nota de actualización (2026-10-25).** Esta versión actualiza el protocolo original (`Local/docs/Protocolo_Bonito.docx`, redactado para una aplicación externa en Python/Flask con servicios web REST) para que coincida con la arquitectura vigente: el sistema vive dentro de Moodle 5.1 como el plugin `local_trayecta`, y el perfilamiento se organiza en cuatro herramientas (H1 a H4) con una evaluación cuasiexperimental de impacto académico (ERS v1.3). Corresponde al pendiente 6 de la sección 2.8 del ERS ("actualizar en el protocolo de investigación el nombre de OE1 y OE2"). Cambios de fondo, además de arquitectura e instrumentos:
> - Se agrega a Salvador Alejos Soria como tercer integrante del equipo (ya presente en `docs/Manual Tecnico.md` y `docs/Backlog del producto.md`); falta su número de control para la tabla de firmas.
> - A petición de Mariana Meneses, la Herramienta 2 se nombra **Trayectoria** en vez de "Preferencias de formato y disponibilidad de tiempo" (su título anterior queda entre paréntesis donde se describe). Su contenido no cambia. `docs/ERS.md` recibe el mismo renombre en el PR #9 (ERS v1.5, sin fusionar).
> - La población de estudiantes es de 25 a 30, en un solo grupo dividido en dos cohortes de 15 (confirmado por Mariana Meneses) para la evaluación cuasiexperimental.
> - Se corrige una inconsistencia del documento original: la sección "Enunciado del problema" situaba el curso en el periodo agosto-diciembre 2027 y la sección "Hipótesis" lo situaba en 2026. Se deja 2027 en todo el documento.
> - Las Partes II y III (firmas y seguimiento) se conservan sin llenar, como en el original.
>
> Pendiente de revisión por el asesor, igual que la variante de implementación que describe (ERS §2.8, punto 1).

## I - De la propuesta de investigación

### 1. Datos generales del proyecto de investigación que se propone

| Campo | Contenido |
|---|---|
| Título tentativo del proyecto | Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle |
| LGAC / Especialidad a la que pertenece el tema de investigación | Tópicos Avanzados de Ingeniería de Software |
| Palabras clave | IA aplicada a la Educación · Analítica en Moodle · Perfilamiento multidimensional del estudiante · Estilos de aprendizaje Felder-Silverman · Diseño cuasiexperimental |

### 2. Problemática general y su importancia

En el contexto de la educación superior, la personalización del aprendizaje representa un desafío debido a que los estudiantes que comparten un mismo curso no necesariamente poseen las mismas características, conocimientos, preferencias ni condiciones para aprender. Esta condición resulta particularmente relevante en los entornos virtuales de aprendizaje, donde un estudiante puede requerir mayor tiempo para comprender un tema, partir de conocimientos previos diferentes, presentar preferencias por determinados formatos de contenido o disponer de una cantidad de tiempo distinta para realizar sus actividades.

En este sentido, conocer las características individuales del estudiante resulta importante para diseñar experiencias de aprendizaje que consideren sus necesidades particulares. Sin embargo, debe señalarse que la evidencia científica no respalda de manera suficiente la idea de que simplemente adaptar la enseñanza al supuesto "estilo" de aprendizaje del estudiante produzca mejores resultados académicos (Pashler et al., 2008). Por ello, el valor de identificar los estilos de aprendizaje dentro de esta propuesta no se plantea como un mecanismo aislado para determinar cómo debe enseñarse a cada estudiante, sino como una dimensión adicional que, combinada con otros factores observables y medibles —rasgos psicométricos, preferencias de formato, disponibilidad de tiempo y nivel de conocimientos por unidad—, puede contribuir a construir un perfil más completo del estudiante.

Actualmente, dentro del escenario educativo del Instituto Tecnológico de Morelia (ITM), la plataforma oficial, Moodle, permite administrar cursos, recursos, actividades y evaluaciones, así como generar información relacionada con la interacción de los estudiantes con los contenidos. No obstante, cuando los recursos de un curso se presentan mediante una secuencia común, existe el riesgo de que todos los estudiantes recorran esencialmente la misma estructura de aprendizaje sin considerar de manera conjunta sus características de aprendizaje, preferencias de formato, disponibilidad de tiempo y comportamiento dentro de la plataforma. En este escenario se desaprovecha información que puede utilizarse para identificar patrones de interacción, desempeño y progreso (Graf et al., 2009).

La ausencia de un mecanismo que integre estas dimensiones en un mismo perfil y las utilice para generar rutas de aprendizaje personalizadas constituye un vacío que puede abordarse mediante una solución tecnológica orientada a la recomendación. Esta necesidad está documentada a nivel global: una revisión sistemática de 78 estudios publicados entre 2019 y 2024 identificó un predominio de tecnologías de aprendizaje adaptativo y un crecimiento de soluciones destinadas a generar rutas de aprendizaje personalizadas, especialmente en educación superior; sin embargo, la mayoría de ellas permanece en el plano conceptual o experimental (Bayly-Castaneda et al., 2024). De ahí surge la importancia de llevar este tipo de soluciones a escenarios concretos de instituciones educativas y vincularlas directamente con los recursos de un LMS como Moodle, en lugar de mantenerlas como un sistema externo y separado.

Ante esta problemática, se propone desarrollar **Trayecta**, un plugin de Moodle de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje. El plugin vive por completo dentro de Moodle 5.1, sin componentes externos, y usa su API de plugins para ampliar sus funciones sin modificar su núcleo. El perfil se construye a partir de cuatro herramientas: estilos de aprendizaje (modelo de Felder-Silverman), Trayectoria (preferencias de formato y disponibilidad de tiempo), un módulo psicométrico obligatorio que determina el docente, y un diagnóstico de conocimientos que se repite al iniciar cada unidad del curso. A partir de esta información, el sistema utiliza un motor de recomendación híbrido, basado inicialmente en reglas y filtrado colaborativo (Burke, 2002), que incorpora progresivamente los datos de interacción del estudiante para ajustar las rutas propuestas. El proyecto además evalúa el impacto académico de la personalización con un diseño cuasiexperimental: compara el desempeño de un grupo que recibe las rutas de Trayecta contra uno que usa Moodle sin personalizar.

### 3. Enunciado del problema específico que se pretende resolver

En el Instituto Tecnológico de Morelia no existe un mecanismo institucional formal de perfilamiento multidimensional del estudiante ni de recomendación personalizada de objetos de aprendizaje dentro de Moodle. Aunque se dispone de un marco teórico validado para el perfilamiento (FSLSM), de técnicas maduras de recomendación híbrida y de la infraestructura tecnológica necesaria (Moodle y su API de plugins), estos tres elementos no se encuentran integrados en un solo sistema. Esta situación provoca que los estudiantes de la materia de Fundamentos de Ingeniería de Software, que se impartirá bajo un modelo uniforme de recursos, accedan a los mismos contenidos independientemente de su estilo de aprendizaje, sus rasgos psicométricos, sus preferencias de formato, su disponibilidad de tiempo y su nivel de conocimientos por unidad.

El alcance de este proyecto se delimita a los estudiantes de la materia de Fundamentos de Ingeniería de Software de la carrera de Ingeniería en Sistemas Computacionales durante el periodo agosto-diciembre 2027, y se desarrollará hasta la fase de prototipo funcional evaluado. Ante este panorama, se plantea la siguiente pregunta de investigación:

> ¿Cómo afectaría el desarrollo e integración de un plugin de perfilamiento multidimensional y recomendación de rutas de aprendizaje en Moodle a la personalización de la experiencia de aprendizaje y al desempeño académico de los estudiantes, en comparación con el uso estándar de la plataforma?

### 4. Objetivos de la investigación (general y específicos)

**General:** Desarrollar un plugin de Moodle de perfilamiento multidimensional del estudiante y un motor de recomendación de rutas de aprendizaje, dirigido a estudiantes de educación superior del Tecnológico Nacional de México, con la finalidad de personalizar la experiencia de aprendizaje a partir de sus estilos de aprendizaje, sus rasgos psicométricos, sus preferencias de formato, su disponibilidad de tiempo, su nivel de conocimientos por unidad y sus datos de interacción con la plataforma, y de evaluar su impacto en el desempeño académico mediante un diseño cuasiexperimental.

**Específicos:**

1. Determinar la arquitectura de integración dentro de Moodle 5.1 necesaria para que el plugin `local_trayecta` asigne etiquetas de acceso y restricciones de disponibilidad, y lea los registros de actividad del estudiante, sin modificar el núcleo de la plataforma. *(OE1: Integración con Moodle)*
2. Identificar y caracterizar las cuatro herramientas de perfilamiento del estudiante (estilos de aprendizaje según el modelo de Felder-Silverman, Trayectoria —preferencias de formato y disponibilidad de tiempo—, módulo psicométrico obligatorio y diagnóstico de conocimientos por unidad) mediante instrumentos de recopilación de información aplicados dentro de Moodle. *(OE2: Perfilamiento)*
3. Relacionar el perfil multidimensional del estudiante con los objetos y rutas de aprendizaje disponibles en Moodle, mediante un motor de recomendación híbrido basado en reglas y filtrado colaborativo que incorpore progresivamente los datos de interacción del usuario. *(OE3: Motor de recomendación)*
4. Determinar el nivel de usabilidad y el correcto funcionamiento del plugin desarrollado mediante la escala SUS y pruebas unitarias y de integración, y evaluar su impacto académico comparando el desempeño de un grupo experimental, que recibe las rutas personalizadas, contra un grupo de control, que usa Moodle sin personalizar. *(OE4: Seguimiento y evaluación)*

### 5. Contexto de desarrollo, prueba y evaluación

El presente proyecto se desarrollará e implementará dentro del entorno institucional del Instituto Tecnológico de Morelia (ITM), con la carrera de Ingeniería en Sistemas Computacionales dentro de la materia de Ingeniería de Software como población de interés. El plugin se construirá en PHP 8.3, siguiendo la API de plugins de Moodle, y vivirá dentro del servidor Moodle institucional (Moodle 5.1), sin modificar el código fuente de la plataforma. El plugin y Moodle comparten la misma base de datos PostgreSQL 16: las tablas propias del plugin (`mdl_trayecta_*`) viven junto a las de Moodle, sin una base de datos separada. El desarrollo técnico se llevará a cabo en el laboratorio de cómputo del Departamento de Sistemas y Computación y mediante trabajo remoto de los alumnos, con el código versionado en GitHub.

Una vez desarrollados los módulos, se realizarán pruebas unitarias y de integración automatizadas con PHPUnit, enfocadas en la integración con Moodle, la construcción del perfil y la generación de recomendaciones, y una prueba piloto con 10 estudiantes voluntarios para validar la claridad y el tiempo de respuesta de los instrumentos. Posteriormente, el sistema se desplegará en los grupos de la materia de Fundamentos de Ingeniería de Software durante el periodo agosto-diciembre 2027, divididos en un grupo experimental y uno de control, donde se recolectarán los datos de interacción registrados en Moodle y el desempeño en las evaluaciones oficiales del curso. Finalmente, el plugin será sometido a una evaluación de usabilidad con la cohorte experimental, mediante la escala SUS y un cuestionario de satisfacción.

### 6. Justificación de desarrollo, prueba y evaluación

**Justificación tecnológica.** El proyecto propone un artefacto de software novedoso en el contexto institucional: un plugin que amplía Moodle con su propia API de plugins, sin modificar su código fuente. Esta decisión se sustenta en un estudio de viabilidad técnica sobre la propia instancia de Moodle 5.1, que encontró que sus servicios web no exponen ninguna función para escribir restricciones de acceso ni para leer los registros de actividad del estudiante, y que el proceso periódico de sincronización y la ocultación automática de recursos nuevos solo se pueden dar de alta desde un plugin. Esta aproximación arquitectónica resuelve el problema de la personalización, incluida su automatización, sin comprometer la estabilidad del LMS. La solución es transferible a cualquier instancia de Moodle 5.1 y constituye una contribución metodológica al campo de la integración de sistemas educativos adaptativos con LMS institucionales.

**Justificación práctica.** La heterogeneidad del estudiantado de ISC en el ITM demanda un mecanismo que adapte la entrega de contenidos sin aumentar la carga habitual del docente en la impartición del curso: las etiquetas de acceso, la ocultación de recursos nuevos y el cálculo del perfil se automatizan. El docente sí participa en dos puntos puntuales: define el instrumento psicométrico oficial y entrega el banco de reactivos del diagnóstico de cada unidad, insumos que ya usaría de cualquier forma para evaluar al grupo. Según el principio de Pareto, el 20% del esfuerzo correctamente focalizado en el perfilamiento puede impactar el 80% del aprovechamiento al canalizar al estudiante hacia los recursos que mejor se alinean con su perfil multidimensional.

**Justificación teórica.** El modelo Felder-Silverman ha sido ampliamente validado en contextos de ingeniería (Felder & Spurlin, 2005; Litzinger et al., 2007), pero su integración con motores de recomendación híbridos y su operacionalización como plugin de un LMS carece de evidencia empírica en el contexto mexicano de educación tecnológica. El diseño cuasiexperimental, que compara un grupo que recibe la personalización contra uno que no la recibe, permite además aportar evidencia sobre si ese perfilamiento se traduce en una diferencia medible de desempeño académico, más allá de la usabilidad percibida. Este proyecto aporta conocimiento nuevo al documentar la efectividad de dicha integración en el TecNM.

**Justificación desde el modelo de 5 Hélices.** El proyecto vincula la universidad (ITM/TecNM) con la industria del software educativo (potencial de transferencia tecnológica), el gobierno (alineación con políticas de calidad educativa de la SEP/SECIHTI), la sociedad civil (estudiantes como beneficiarios directos) y el entorno natural (reducción de materiales impresos mediante digitalización de contenidos).

### 7. Bosquejo del Marco de referencia / Bosquejo del Marco teórico

**Conceptos clave:**

- Estilos de aprendizaje: preferencias cognitivas del estudiante clasificadas en cuatro dimensiones bipolares (Felder & Silverman, 1988).
- Perfilamiento multidimensional del estudiante: construcción de un perfil a partir de varias fuentes de información, incluido el comportamiento observado en el LMS (Graf et al., 2009).
- Objetos de aprendizaje y metadatos educativos: unidades de contenido descritas bajo el estándar IEEE LOM (Wiley, 2002).
- Sistemas de recomendación: filtrado basado en contenido, filtrado colaborativo e híbridos (Burke, 2002; Ricci et al., 2022).
- Aprendizaje adaptativo y personalización educativa (Brusilovsky & Peylo, 2003).
- API de plugins de Moodle (Moodle HQ, 2024).

**Fundamentos / teorías relevantes:**

- Modelo de estilos de aprendizaje de Felder-Silverman (FSLSM) (Felder & Silverman, 1988; Felder & Spurlin, 2005).
- Teoría de la carga cognitiva (Sweller, 1988).
- Diseño Universal para el Aprendizaje, DUA/UDL (CAST, 2018).
- Teoría de sistemas de recomendación, a partir de la taxonomía de Burke (2002, 2007).
- Zona de desarrollo próximo adaptada a entornos digitales (Vygotsky, 1978; Luckin, 2010).

**Antecedentes del abordaje por otros autores:**

- Zlatkovic et al. (2020): sistema adaptativo con ajuste de FSLSM en Moodle DLS, con mejoras significativas en la pertinencia de los contenidos entregados.
- Graf et al. (2009): detección automática de estilos de aprendizaje a partir del comportamiento en LMS.
- Khanal et al. (2020): revisión sistemática de sistemas de recomendación en e-learning, con tendencia hacia el filtrado híbrido.
- Bourkoukou & El Bachari (2022): perfilamiento dinámico con inteligencia artificial para la adaptación del aprendizaje.
- Santos et al. (2024): rutas de aprendizaje personalizadas basadas en grafos de conocimiento.
- Bayly-Castaneda et al. (2024): revisión sistemática de 78 estudios (2019-2024) sobre rutas de aprendizaje personalizadas, con predominio de tecnologías de aprendizaje adaptativo en educación superior.

**Principales debates y controversias:**

- Validez del constructo de estilos de aprendizaje: críticas de Pashler et al. (2008) frente a la evidencia favorable en ingeniería de Litzinger et al. (2007) y Felder & Spurlin (2005).
- Problema del arranque en frío (cold-start) en filtrado colaborativo con pocos datos iniciales (Schein et al., 2002).
- Privacidad y ética del perfilamiento estudiantil automatizado (Slade & Prinsloo, 2013).
- Escalabilidad de la personalización frente al esfuerzo de producción de objetos de aprendizaje multiformato.

### 8. Hipótesis

**Hipótesis de investigación (Hi):** Si se implementa el plugin Trayecta de perfilamiento multidimensional y recomendación de rutas de aprendizaje dentro de Moodle, en los estudiantes de la materia de Fundamentos de Ingeniería de Software de la carrera de ISC del Instituto Tecnológico de Morelia durante el periodo agosto-diciembre 2027, entonces el grupo experimental, que recibe las rutas personalizadas, alcanzará un mejor desempeño académico en las evaluaciones oficiales del curso que el grupo de control, que usa Moodle sin personalizar; además, el plugin construirá perfiles estudiantiles válidos y confiables, funcionará correctamente en su integración con Moodle, la construcción del perfil y la generación de recomendaciones, y alcanzará un puntaje de usabilidad igual o superior a 68 puntos en la escala SUS entre los estudiantes del grupo experimental.

**Hipótesis nula (H0):** Si se implementa el plugin Trayecta en los estudiantes de la materia de Fundamentos de Ingeniería de Software de la carrera de ISC del Instituto Tecnológico de Morelia durante el periodo agosto-diciembre 2027, entonces no habrá una diferencia de desempeño académico entre el grupo experimental y el grupo de control, o el plugin no construirá perfiles válidos y confiables, no funcionará correctamente, o no alcanzará un puntaje de usabilidad igual o superior a 68 puntos en la escala SUS.

La hipótesis se plantea en el Instituto Tecnológico de Morelia, con los estudiantes de la materia de Fundamentos de Ingeniería de Software de la carrera de ISC durante el periodo agosto-diciembre 2027, que es el escenario en el que el plugin se desplegará como recurso del curso y en el que se dispondrá de los datos de interacción de Moodle. Los estudiantes son la unidad de análisis sobre la que se construirán los perfiles, se comparará el desempeño académico y se medirá la usabilidad, mientras que el propio plugin es la unidad que se someterá a las pruebas de funcionamiento.

La variable independiente es la asignación del estudiante al grupo experimental o al grupo de control: el primero recibe el perfilamiento en sus cuatro herramientas (estilos de aprendizaje según Felder-Silverman, Trayectoria —preferencias de formato y disponibilidad de tiempo—, módulo psicométrico y diagnóstico por unidad) y las rutas de aprendizaje que de ahí resultan; el segundo usa Moodle en su formato estándar, sin restricciones ni personalización.

La variable dependiente se medirá mediante cuatro indicadores. El desempeño académico se compara entre cohortes con las evaluaciones oficiales del curso, idénticas para ambos grupos. La validez y confiabilidad de los perfiles se sustenta en que el Index of Learning Styles cuenta con evidencia psicométrica en contextos de ingeniería (Felder & Spurlin, 2005; Litzinger et al., 2007). El funcionamiento correcto se verificará con pruebas unitarias y de integración sobre la integración con Moodle, la construcción del perfil y la generación de recomendaciones. La usabilidad se evaluará con la escala SUS (Brooke, 1996) entre los estudiantes del grupo experimental, tomando 68 puntos como el umbral mínimo para considerar aceptable la experiencia de uso. Estos cuatro indicadores corresponden a los objetivos específicos 2, 3 y 4 de la investigación.

### 9. Bosquejo del Método

**Bosquejo científico:**

Se realizará una investigación aplicada con enfoque mixto, de tipo desarrollo tecnológico (Stolen, 2023), donde el problema es la necesidad de un nuevo artefacto y la solución es el artefacto mismo, evaluado además con un diseño cuasiexperimental de dos cohortes. El componente cuantitativo abarcará la medición de usabilidad (SUS), los resultados de las pruebas unitarias y de integración, el análisis de los datos de interacción y la comparación del desempeño académico entre el grupo experimental y el de control; el componente cualitativo incluirá la retroalimentación abierta de los usuarios del grupo experimental sobre la experiencia de personalización.

El universo de estudio estará compuesto por los estudiantes inscritos en la materia de Fundamentos de Ingeniería de Software del programa de ISC en el ITM, con una población estimada de 25 a 30 estudiantes en un solo grupo. Se trabajará con la totalidad del grupo disponible (censo), sin muestreo probabilístico. Los criterios de inclusión serán estar inscrito formalmente en la materia, tener acceso activo a Moodle y aceptar el consentimiento informado; se excluirán los estudiantes que no completen el proceso de perfilamiento inicial. El grupo se dividirá en dos cohortes de 15 estudiantes cada una, una experimental y otra de control, con un método de asignación que se define con el docente para que ambas sean estadísticamente comparables (sección 2.8 del ERS).

Se utilizarán cuatro herramientas integradas en el plugin:

1. El Index of Learning Styles (ILS) de Felder-Silverman, instrumento validado de 44 ítems con escala dicotómica (Felder & Soloman, s.f.), aplicado al inicio del curso.
2. **Trayectoria** (Preferencias de formato y disponibilidad de tiempo): un cuestionario de preferencias de formato (video, podcast, texto, simulación, ejercicio, infografía) con escala de 1 a 5 y de disponibilidad de tiempo (horas por semana y franjas horarias), aplicado al inicio del curso.
3. Un módulo psicométrico obligatorio, con el instrumento, las escalas y la forma de puntuación que determine el docente titular o el asesor, aplicado al inicio del curso.
4. Un diagnóstico de conocimientos previos por unidad temática, con el banco de reactivos que entrega el docente, aplicado dentro de Moodle cada vez que el grupo experimental comienza una nueva unidad.

Para evaluar el sistema se aplicarán la escala SUS de 10 ítems (Brooke, 1996) y un cuestionario de satisfacción con preguntas abiertas al grupo experimental. Se realizará una prueba piloto con 10 estudiantes voluntarios para validar la claridad y el tiempo de respuesta de los instrumentos.

La recolección de información se realizará en las siguientes etapas:

1. Aplicación del consentimiento informado y asignación de cada estudiante al grupo experimental o de control.
2. Aplicación de las tres herramientas iniciales de perfilamiento (ILS, preferencias/disponibilidad y módulo psicométrico) a los estudiantes del grupo experimental.
3. Activación del motor de recomendación y asignación de rutas personalizadas en Moodle al grupo experimental.
4. Aplicación del diagnóstico por unidad (herramienta 4) al grupo experimental cada vez que inicia una nueva unidad, y recolección continua de datos de interacción de Moodle (accesos, tiempo en recurso, secuencia de navegación y calificaciones parciales) de ambos grupos.
5. Aplicación de la escala SUS y del cuestionario de satisfacción al grupo experimental, al concluir su intervención.
6. Cierre de la recolección, comparación del desempeño académico entre ambos grupos en las evaluaciones oficiales del curso, y exportación de los datos para su análisis.

Los resultados se presentarán mediante un dashboard con la distribución de perfiles por grupo, tablas de resultados de las pruebas por componente, un histograma de puntajes SUS con intervalo de confianza al 95%, una tabla comparativa del desempeño académico entre el grupo experimental y el de control, un diagrama de la arquitectura del plugin y tablas comparativas de métricas de interacción por ruta, utilizando Python (matplotlib, seaborn) y Power BI.

**Bosquejo tecnológico:**

El desarrollo de la solución se fundamentará en la metodología Scrum adaptada al contexto de investigación aplicada (Fitzgerald et al., 2006; Conboy et al., 2015). El Product Backlog será un catálogo priorizado de historias de usuario derivadas de los objetivos específicos, con los roles de Product Owner (asesor), Scrum Team (equipo de tres alumnos) y Scrum Master (rotativo entre los alumnos). El proceso técnico se dividirá en las siguientes fases:

- Arquitectura del plugin: estructura de `local_trayecta`, esquema de tablas propias en la base de datos de Moodle y registro en su API de plugins.
- Perfilamiento: implementación de las cuatro herramientas de perfilamiento y del algoritmo de construcción del perfil.
- Recomendación: motor de recomendación basado en reglas y filtrado colaborativo.
- Integración y pruebas: integración completa, pruebas de integración y prueba piloto con un grupo reducido.
- Despliegue y evaluación: despliegue en los grupos completos, asignación de cohortes y recolección de datos de evaluación, con métricas de usabilidad (SUS ≥ 68), resultados de pruebas, logs de interacción, desempeño académico comparado y satisfacción cualitativa.

El desarrollo se acompañará de documentación de arquitectura de software (diagrama de componentes, diagrama de secuencia y modelo de datos) y de pruebas unitarias y de integración automatizadas con PHPUnit.

### 10. Productos entregables

1. Plugin de Moodle funcional: prototipo de software documentado de perfilamiento multidimensional y recomendación de rutas de aprendizaje, integrado a Moodle como plugin y publicado en un repositorio de GitHub.
2. Artículo científico: 1 artículo enviado a una revista arbitrada reconocida por el SNPCyH (TIES, Computación y Sistemas, TERC CONAIC o ReCIBE).
3. Memoria en extenso: 1 memoria para un congreso nacional (CONAIS, CICOMP o similar).
4. Formación de recursos humanos: participación de 3 alumnos de ISC (7mo semestre) en un proyecto de investigación tecnológica, con el fortalecimiento de competencias en desarrollo de plugins de Moodle (PHP), diseño de bases de datos relacionales, algoritmos de recomendación, diseño cuasiexperimental e investigación aplicada, y con potencial de continuidad como tema de residencia profesional o tesis.

### 11. Vinculaciones estratégicas y lugar(es) de desarrollo del proyecto

**Vinculaciones estratégicas:**

- Universidad: TecNM / Instituto Tecnológico de Morelia, Departamento de Sistemas y Computación y Academia de ISC.
- Industria: potencial transferencia a empresas de e-learning y EdTech.
- Gobierno: alineación con la política de calidad educativa de la SEP y el TecNM.
- Sociedad civil: estudiantes de ISC como beneficiarios directos del sistema adaptativo.

**Lugares de desarrollo:**

- Laboratorio de cómputo del Departamento de Sistemas y Computación del ITM.
- Servidor Moodle institucional del ITM (entorno de pruebas y producción).
- Trabajo remoto de los alumnos (desarrollo distribuido vía GitHub).

### 12. Fuentes preliminares (APA, 7ª edición)

- Bayly-Castaneda, K., Ramirez-Montoya, M.-S., & Morita-Alexander, A. (2024). Crafting personalized learning paths with AI for lifelong learning: A systematic literature review. *Frontiers in Education, 9*, Article 1424386. https://doi.org/10.3389/feduc.2024.1424386
- Bourkoukou, O., & El Bachari, E. (2022). Toward an intelligent e-learning system based on dynamic learner profiling using artificial intelligence. *Indonesian Journal of Electrical Engineering and Computer Science, 28*(2), 1168-1177. https://doi.org/10.11591/ijeecs.v28.i2.pp1168-1177
- Brooke, J. (1996). SUS: A "quick and dirty" usability scale. En P. W. Jordan et al. (Eds.), *Usability Evaluation in Industry* (pp. 189-194). Taylor & Francis.
- Brusilovsky, P., & Peylo, C. (2003). Adaptive and intelligent web-based educational systems. *International Journal of Artificial Intelligence in Education, 13*(2-4), 159-172.
- Burke, R. (2002). Hybrid recommender systems: Survey and experiments. *User Modeling and User-Adapted Interaction, 12*(4), 331-370. https://doi.org/10.1023/A:1021240730564
- CAST. (2018). *Universal Design for Learning Guidelines version 2.2*. http://udlguidelines.cast.org
- Conboy, K., Gleasure, R., & Cullina, E. (2015). Agile Design Science Research. En B. Donnellan et al. (Eds.), *New Horizons in Design Science (DESRIST 2015), LNCS 9073* (pp. 168-180). Springer. https://doi.org/10.1007/978-3-319-18714-3_11
- Felder, R. M., & Silverman, L. K. (1988). Learning and teaching styles in engineering education. *Engineering Education, 78*(7), 674-681.
- Felder, R. M., & Soloman, B. A. (s.f.). *Index of Learning Styles Questionnaire*. North Carolina State University. https://www.webtools.ncsu.edu/learningstyles/
- Felder, R. M., & Spurlin, J. (2005). Applications, reliability and validity of the Index of Learning Styles. *International Journal of Engineering Education, 21*(1), 103-112.
- Fitzgerald, B., Hartnett, G., & Conboy, K. (2006). Customising agile methods to software practices at Intel Shannon. *European Journal of Information Systems, 15*(2), 200-213.
- Graf, S., Kinshuk, & Liu, T.-C. (2009). Supporting teachers in identifying students' learning styles in learning management systems: An automatic student modelling approach. *Educational Technology & Society, 12*(4), 3-14.
- Khanal, S. S., Prasad, P. W. C., Alsadoon, A., & Maag, A. (2020). A systematic review: Machine learning based recommendation systems for e-learning. *Education and Information Technologies, 25*(4), 2635-2664. https://doi.org/10.1007/s10639-019-10063-9
- Litzinger, T. A., Lee, S. H., Wise, J. C., & Felder, R. M. (2007). A psychometric study of the Index of Learning Styles. *Journal of Engineering Education, 96*(4), 309-319.
- Luckin, R. (2010). *Re-designing learning contexts: Technology-rich, learner-centred ecologies*. Routledge.
- Moodle HQ. (2024). *Plugin types — MoodleDocs*. https://docs.moodle.org/dev/Plugin_types
- Pashler, H., McDaniel, M., Rohrer, D., & Bjork, R. (2008). Learning styles: Concepts and evidence. *Psychological Science in the Public Interest, 9*(3), 105-119.
- Ricci, F., Rokach, L., & Shapira, B. (Eds.). (2022). *Recommender Systems Handbook* (3.ª ed.). Springer. https://doi.org/10.1007/978-1-0716-2197-4
- Santos, O. C., Boticario, J. G., & Caeiro-Rodríguez, M. (2024). Personalized learning path recommendation based on knowledge graphs: A survey. *Electronics, 15*(1), 238. https://doi.org/10.3390/electronics15010238
- Schein, A. I., Popescul, A., Ungar, L. H., & Pennock, D. M. (2002). Methods and metrics for cold-start recommendations. *Proceedings of the 25th Annual International ACM SIGIR Conference* (pp. 253-260). https://doi.org/10.1145/564376.564421
- Slade, S., & Prinsloo, P. (2013). Learning analytics: Ethical issues and dilemmas. *American Behavioral Scientist, 57*(10), 1510-1529. https://doi.org/10.1177/0002764213479366
- Stolen, M. B. (2023). *Technology Research Methods* (2.ª ed.). Fagbokforlaget.
- Sweller, J. (1988). Cognitive load during problem solving: Effects on learning. *Cognitive Science, 12*(2), 257-285.
- Wiley, D. A. (2002). Connecting learning objects to instructional design theory: A definition, a metaphor, and a taxonomy. En D. A. Wiley (Ed.), *The Instructional Use of Learning Objects*. Agency for Instructional Technology.
- Zlatkovic, D., Denaric, D., Vujovic, V., & Purduski, M. (2020). Analysis of adaptive e-learning systems with adjustment of Felder-Silverman model in a Moodle DLS. *Computer Applications in Engineering Education, 28*(4), 803-813. https://doi.org/10.1002/cae.22251

## II - De la conformidad de los participantes

### 13. Firma de conformidad de los alumnos con la asignación de la propuesta que presentan

> **Nota importante: deben referir un proyecto inédito y ser únicos colaboradores.**

| Nombre completo de alumno (apellido(s) nombre(s)) | No. Control | Materia de investigación que cursa | Confírmese proyecto inédito y ser colaboradores únicos | Fecha de aceptación | Firma de aceptación |
|---|---|---|---|---|---|
| Meneses Díaz Mariana Sofía | 23121132 | Taller Inv. I | ___ Sí | | |
| Aguilar Garnica Alfredo | 23121049 | Taller Inv. I | ___ Sí | | |
| Alejos Soria Salvador | *[Pendiente: número de control]* | Taller Inv. I | ___ Sí | | |

### 14. Firma de aceptación de propuesta de proyecto de investigación y compromiso de asesoría y de seguimiento del asesor(es)

| Nombre del asesor interno | Días, horarios y lugar de asesoría | Fecha de firma | Firma de aceptación de propuesta y compromiso de asesoría y seguimiento |
|---|---|---|---|
| DCE. Claudio Ernesto Florián Arenas | | | |

| Nombre del asesor externo (si aplica) | Días, horarios y lugar de asesoría | Fecha de firma | Firma de aceptación de propuesta y compromiso de asesoría y seguimiento |
|---|---|---|---|
| | | | |

**Vo.Bo. JPI** ______________________________________________

## III - Seguimiento del proyecto de investigación

*— para ser llenado a lo largo del desarrollo del proyecto con las diferentes materias que aporten al mismo —*

| Proceso | Observaciones (indíquese cambios importantes, como por ejemplo: cambio de alumnos participantes, cambio de asesor, actualización del título de la investigación) | Fecha y firma de Asesor Interno | Fecha y firma de Asesor Externo |
|---|---|---|---|
| Término de protocolo de investigación en Taller I | | | |
| Ratificación de continuidad en Taller II | | | |
| Ratificación de continuidad en la materia (si aplica): *\<\<inserte nombre de la materia\>\>* | | | |
| Ratificación de continuidad en la materia (si aplica): *\<\<inserte nombre de la materia\>\>* | | | |
| Ratificación de continuidad en la materia (si aplica): *\<\<inserte nombre de la materia\>\>* | | | |
| Término satisfactorio / sobresaliente del informe de investigación | | | |
