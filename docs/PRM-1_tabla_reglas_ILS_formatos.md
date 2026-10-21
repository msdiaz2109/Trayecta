# PRM-1 · Tabla de reglas entre el ILS y los formatos

> **Tarea Jira:** [PRM-1](https://yoaguilar78.atlassian.net/browse/PRM-1) · **Requisito:** REQ-REC-002 · **Estado:** borrador para revisión del asesor
> **Formatos del catálogo (REQ-REC-001; antes REQ-PER-004):** video, podcast, texto, simulación, ejercicio, infografía.

## 1. Dimensiones del ILS

El Index of Learning Styles (Felder & Soloman, s.f.) mide cuatro dimensiones bipolares del modelo de Felder y Silverman (1988):

| Dimensión | Polo A | Polo B | Qué distingue |
|---|---|---|---|
| Procesamiento | Activo | Reflexivo | Procesar la información haciendo y discutiendo, o pensándola en silencio |
| Percepción | Sensorial | Intuitivo | Preferir hechos, datos y lo concreto, o conceptos, teorías y abstracciones |
| Entrada | Visual | Verbal | Recordar mejor lo que se ve (diagramas, demostraciones), o las palabras escritas y habladas |
| Comprensión | Secuencial | Global | Avanzar en pasos lineales y lógicos, o necesitar primero el panorama completo |

> [!NOTE]
> En el artículo de 1988 la dimensión de entrada se llamaba *visual–auditivo*. Felder la renombró después a *visual–verbal*, que es la que mide el ILS actual. El artículo de 1988 también tenía una quinta dimensión (*inductivo–deductivo*) que el ILS no incluye.

## 2. Tabla de reglas: polo → formatos favorecidos

| Dimensión | Polo | Formatos favorecidos | Justificación | Cita |
|---|---|---|---|---|
| Procesamiento | **Activo** | ejercicio, simulación | Aprende experimentando y aplicando enseguida. Los recursos que piden hacer algo le dan esa experimentación activa. En los LMS, los estudiantes activos usan más los ejercicios y las autoevaluaciones. | Felder & Silverman (1988); Graf et al. (2009) |
| Procesamiento | **Reflexivo** | texto, video | Necesita tiempo para pensar la información antes de usarla. El texto y el video se pueden pausar y repasar al propio ritmo, lo que favorece la observación reflexiva. En los LMS pasan más tiempo en los objetos de contenido. | Felder & Silverman (1988); Graf et al. (2009) |
| Percepción | **Sensorial** | ejercicio, simulación, video | Prefiere hechos, ejemplos concretos y procedimientos prácticos vinculados al mundo real. Las demostraciones en video y la práctica guiada le dan esa base concreta. | Felder & Silverman (1988); Graf et al. (2009) |
| Percepción | **Intuitivo** | texto, podcast | Prefiere principios, teorías y relaciones entre conceptos, y se aburre con la repetición. Las explicaciones conceptuales en texto o audio desarrollan la abstracción. | Felder & Silverman (1988) |
| Entrada | **Visual** | video, infografía, simulación | Recuerda mejor lo que ve: imágenes, diagramas, diagramas de flujo, películas y demostraciones. | Felder & Silverman (1988) |
| Entrada | **Verbal** | texto, podcast | Aprovecha mejor las explicaciones con palabras, escritas (texto) o habladas (podcast). | Felder & Silverman (1988); Felder & Spurlin (2005) |
| Comprensión | **Secuencial** | texto, ejercicio | Avanza en pasos lineales, cada uno siguiendo lógicamente al anterior. El texto estructurado y los ejercicios graduados respetan esa progresión. | Felder & Silverman (1988) |
| Comprensión | **Global** | infografía, video | Necesita el panorama completo y ver cómo se conectan las partes antes de los detalles. Las infografías y los videos introductorios dan esa visión de conjunto. En los LMS, los estudiantes globales consultan más los esquemas generales. | Felder & Silverman (1988); Graf et al. (2009) |

**Cobertura:** los 8 polos tienen al menos un formato, y los 6 formatos del catálogo aparecen en al menos un polo.

## 3. Cómo se aplica la tabla (propuesta para el motor)

1. **Intensidad del polo.** El ILS da por dimensión un puntaje impar de −11 a +11 (Felder & Soloman, s.f.):
   - **1–3 (equilibrado):** la dimensión no favorece ningún formato.
   - **5–7 (moderado):** los formatos del polo suman **+1**.
   - **9–11 (fuerte):** los formatos del polo suman **+2**.
2. **Puntaje de estilo por formato:** la suma de los aportes de las cuatro dimensiones.
3. **El estilo no decide solo.** El puntaje de estilo se combina con las otras partes del cuestionario integral (psicométrica y trayectoria, REQ-PER-009) y con el nivel por unidad, con ponderación configurable (REQ-REC-007). El estilo es una dimensión más del perfil y no el único criterio, porque falta evidencia experimental de que adaptar la enseñanza al estilo mejore por sí solo el aprendizaje (Pashler et al., 2008).
   - *Cambio por ERS v1.1 (2026-10-20):* ya no existen la preferencia de formato Likert (REQ-PER-004) ni la disponibilidad (REQ-PER-005). Falta definir cómo aportan las partes psicométrica y de trayectoria al puntaje por formato, y de dónde sale el nivel por unidad (ERS §2.8).
4. **Diversidad de formatos.** Con pocos datos de comportamiento, cada unidad conserva al menos dos formatos (REQ-REC-009), aunque el estilo apunte claramente a uno.

> [!IMPORTANT]
> Los umbrales (1–3 / 5–7 / 9–11) siguen la interpretación que acompaña al ILS. Los pesos (+1 / +2) y su combinación con las demás partes del perfil se deben acordar con el asesor.

### Ejemplo

Perfil: Activo 7, Sensorial 3, Visual 9, Global 5.

| Formato | Activo (+1) | Sensorial (0, equilibrado) | Visual (+2) | Global (+1) | **Total** |
|---|---|---|---|---|---|
| simulación | +1 | – | +2 | – | **3** |
| video | – | – | +2 | +1 | **3** |
| infografía | – | – | +2 | +1 | **3** |
| ejercicio | +1 | – | – | – | **1** |
| texto | – | – | – | – | **0** |
| podcast | – | – | – | – | **0** |

## 4. Criterio de aceptación (PRM-1)

- [x] Cubre las cuatro dimensiones con sus dos polos.
- [x] Cada polo tiene al menos un formato favorecido, con justificación y cita.
- [ ] Aprobada por el asesor.

## Referencias

- Felder, R. M., & Silverman, L. K. (1988). Learning and teaching styles in engineering education. *Engineering Education, 78*(7), 674–681.
- Felder, R. M., & Soloman, B. A. (s.f.). *Index of Learning Styles Questionnaire*. North Carolina State University. https://www.webtools.ncsu.edu/learningstyles/
- Felder, R. M., & Spurlin, J. (2005). Applications, reliability and validity of the Index of Learning Styles. *International Journal of Engineering Education, 21*(1), 103–112.
- Graf, S., Kinshuk, & Liu, T.-C. (2009). Supporting teachers in identifying students' learning styles in learning management systems: An automatic student modelling approach. *Educational Technology & Society, 12*(4), 3–14.
- Pashler, H., McDaniel, M., Rohrer, D., & Bjork, R. (2008). Learning styles: Concepts and evidence. *Psychological Science in the Public Interest, 9*(3), 105–119.
