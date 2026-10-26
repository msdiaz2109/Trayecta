# PRM-4 · Reglas para asignar etiquetas y crear rutas de aprendizaje

> **Proyecto:** Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle
> 
> 
> **Tarea Jira:** PRM-4
> 
> **Requisitos relacionados:** REQ-REC-002, REQ-REC-005 y REQ-REC-009
> 
> **Responsable:** Mariana Sofía Meneses Díaz
> 
> **Estado:** Borrador para revisión del asesor
> 

# 1. ¿Para qué sirve este documento?

El objetivo es definir cómo el plugin de Moodle (Trayecta) utilizará las respuestas de los instrumentos de perfilamiento para asignar etiquetas de acceso (grupos de Moodle), recomendar recursos didácticos y organizar las actividades semanales de estudio.

### Alcance de la personalización y diseño cuasiexperimental:
- **Grupo Experimental:** Los estudiantes asignados a la cohorte experimental reciben rutas personalizadas generadas por las reglas de este documento. El acceso a los recursos de estudio queda regulado mediante etiquetas (grupos de Moodle: nivel por unidad y formatos preferidos).
- **Grupo de Control:** Los estudiantes asignados a la cohorte de control acceden a todos los recursos didácticos del curso bajo el modelo uniforme nativo de Moodle, sin restricciones de etiquetas ni personalización.
- **Evaluaciones oficiales comunes:** Las actividades calificadas y los exámenes oficiales de la materia no tienen restricciones por etiquetas para ningún estudiante (REQ-INT-008).

Para estructurar la ruta del grupo experimental, el sistema utiliza **cuatro herramientas de perfilamiento**:
1. **Herramienta 1 — Estilos de aprendizaje (ILS):** cuatro dimensiones bipolares (fase inicial).
2. **Herramienta 2 — Preferencias y disponibilidad:** formatos didácticos preferidos (1 a 5) y horas/franjas semanales (fase inicial).
3. **Herramienta 3 — Módulo psicométrico obligatorio:** rasgos cognitivos/conductuales según la batería determinada por el profesor (fase inicial).
4. **Herramienta 4 — Diagnóstico modular por unidad:** examen de conocimientos previos aplicado dentro de Moodle **cada vez que va a comenzar una nueva unidad temática** (fase modular por unidad, con reactivos del docente).
---

# 2. ¿Cómo funciona el proceso completo?

Para los estudiantes del **Grupo Experimental**, el plugin sigue este flujo temporal:

**Fase Inicial (al ingresar al curso):**
1. El estudiante acepta el consentimiento informado y responde las herramientas iniciales: ILS (H1), preferencias de formato y disponibilidad (H2), y el módulo psicométrico obligatorio (H3).
2. El sistema calcula su perfil de partida y determina sus dos etiquetas iniciales de formato didáctico preferido.

**Fase Modular por Unidad Temática (al comenzar cada unidad):**
3. Cada vez que el grupo va a comenzar una nueva unidad temática (de la Unidad 1 a la 5), el estudiante presenta dentro de Moodle la **Herramienta 4 (examen diagnóstico de dicha unidad)**, con reactivos provistos por el docente.
4. El plugin calcula el puntaje y le asigna de inmediato su etiqueta de nivel para esa unidad (`U{n}-bajo`, `U{n}-medio` o `U{n}-alto`).
5. El motor de recomendación filtra los objetos de aprendizaje disponibles en Moodle para esa unidad temática, priorizando los que coinciden con su nivel y formatos asignados.
6. Empaqueta la ruta en bloques semanales de estudio respetando las horas declaradas en la Herramienta 2.

**Fase de Seguimiento y Ajuste Continuo:**
7. El sistema registra la interacción real (accesos, tiempo de permanencia y calificaciones). Conforme el estudiante acumula evidencia de qué formato le es más efectivo, la recomendación se especializa reduciendo las etiquetas de formato (REQ-REC-009).
---

# 3. Regla 1. Determinar cuánto sabe el estudiante por unidad (Herramienta 4)

Para conocer el nivel de partida del estudiante en cada tema, se utiliza la **Herramienta 4 (Diagnóstico modular por unidad)**. Este examen no se contesta al inicio del curso, sino **cada vez que se va a iniciar una unidad nueva**, dentro de la plataforma Moodle.

El docente titular entrega el banco de reactivos oficial para cada unidad (3 preguntas por unidad temática como estándar). Cada respuesta correcta otorga un punto y las incorrectas cero.### 3.1 ¿Cómo se calcula el nivel?

| Respuestas correctas | Nivel | ¿Qué significa? |
| --- | --- | --- |
| 0 o 1 de 3 | Bajo | Necesita reforzar los conceptos básicos. |
| 2 de 3 | Medio | Conoce parte del tema, pero necesita practicar y repasar. |
| 3 de 3 | Alto | Demuestra conocimientos iniciales de los contenidos evaluados. |

Por ejemplo, si un estudiante responde correctamente dos preguntas de la unidad 1, su nivel en esa unidad será medio.

El nivel se calcula por separado para cada unidad. Esto significa que puede tener nivel bajo en una unidad y alto en otra.

### 3.2 ¿Para qué sirve el nivel?

El nivel ayudará a decidir qué recursos conviene recomendar:

- **Nivel bajo:** explicaciones básicas, ejemplos sencillos y ejercicios guiados.
- **Nivel medio:** recursos para repasar, practicar y comprender mejor los temas.
- **Nivel alto:** actividades de profundización y problemas que permitan aplicar los conocimientos.

Esto no significa que un estudiante con nivel alto pueda saltarse las actividades obligatorias. El nivel sirve para adaptar las recomendaciones, no para eliminar contenidos que debe cursar.

Los cortes anteriores son una propuesta y deberán revisarse con el asesor y el docente de la materia.

---

# 4. Regla 2. Elegir los formatos que mejor se ajustan al estudiante

La aplicación utilizará dos fuentes de información para elegir los formatos:

- El resultado del ILS.
- La preferencia que el estudiante declaró en el cuestionario de formatos.

El ILS aporta información sobre las preferencias identificadas en sus cuatro dimensiones. El cuestionario de formatos indica directamente qué tanto le interesa al estudiante cada tipo de recurso.

**La preferencia declarada tendrá un peso importante.** El ILS será un dato adicional para completar la recomendación, no el único criterio para decidir cómo debe aprender una persona.

### 4.1 ¿Cómo se interpreta el resultado del ILS?

Cada dimensión del ILS tiene dos polos. El signo del resultado indica hacia qué polo se inclina la respuesta del estudiante.

| Dimensión | Si el resultado es positivo | Si el resultado es negativo |
| --- | --- | --- |
| Procesamiento | Activo | Reflexivo |
| Percepción | Sensorial | Intuitivo |
| Entrada | Visual | Verbal |
| Comprensión | Secuencial | Global |

La intensidad se interpretará de manera provisional así:

| Resultado absoluto | Interpretación | Puntos para los formatos favorecidos |
| --- | --- | --- |
| 1 o 3 | Equilibrado | 0 |
| 5 o 7 | Moderado | +1 |
| 9 u 11 | Fuerte | +2 |

Por ejemplo, un resultado visual de +9 se considera una preferencia visual fuerte. Los formatos favorecidos por el polo visual recibirán dos puntos adicionales en el cálculo.

Si una dimensión está equilibrada, no dará puntos adicionales a ningún formato.

Los formatos favorecidos por cada polo se tomarán de la tabla de correspondencias entre el ILS y los formatos elaborada para el proyecto.

### 4.2 ¿Cómo se toman en cuenta las preferencias del estudiante?

El estudiante calificará cada formato del 1 al 5. Para convertir esa respuesta en puntos, se propone multiplicarla por dos.

| Calificación | Significado | Puntos |
| --- | --- | --- |
| 1 | Le interesa muy poco | 2 |
| 2 | Le interesa poco | 4 |
| 3 | Le resulta indiferente o intermedio | 6 |
| 4 | Le interesa bastante | 8 |
| 5 | Le interesa mucho | 10 |

Por ejemplo, si califica el video con 5, este formato comienza con 10 puntos. Si el ILS también favorece el video, puede recibir puntos adicionales.

### 4.3 ¿Cómo se obtiene la puntuación final?

Para cada formato se sumarán los puntos de la preferencia declarada y los puntos adicionales del ILS.

**Regla propuesta:**

Puntuación del formato = (preferencia declarada × 2) + puntos adicionales del ILS.

Ejemplo:

Un estudiante calificó el video con 5 y el ILS le aporta dos puntos adicionales al video.

- Preferencia: 5 × 2 = 10 puntos.
- Aporte del ILS: 2 puntos.
- **Puntuación total del video: 12 puntos.**

Se hará el mismo cálculo para los seis formatos. Después se ordenarán de mayor a menor puntuación.

Esta fórmula es una propuesta para el motor de recomendación. Los pesos deberán aprobarse con el asesor antes de considerarse definitivos.

---

# 5. Regla 3. Asignar las etiquetas de formato

Una etiqueta indica qué tipo de recurso se recomendará al estudiante. Por ejemplo, `video` identifica los recursos clasificados como videos.

### 5.1 ¿Cómo se eligen las dos etiquetas iniciales?

Se seleccionarán los dos formatos con mayor puntuación.

Por ejemplo, si los resultados son:

| Formato | Puntuación |
| --- | --- |
| Video | 12 |
| Infografía | 10 |
| Ejercicio | 9 |
| Simulación | 7 |
| Texto | 6 |
| Podcast | 4 |

Las dos etiquetas iniciales serán `video` e `infografia`.

La aplicación utilizará esas etiquetas para identificar recursos que coincidan con los formatos recomendados.

Esto no significa que el estudiante solamente pueda ver videos e infografías. Los recursos obligatorios, los contenidos necesarios para aprobar la unidad y los materiales de apoyo deben seguir disponibles según las reglas del curso.

### 5.2 ¿Qué pasa si dos formatos tienen la misma puntuación?

Se compararán en este orden:

1. El formato que el estudiante calificó más alto.
2. El formato que recibió más puntos del ILS.
3. El formato que resulte más útil para las necesidades de la unidad, considerando los recursos disponibles.
4. Si continúa el empate, se utilizará el orden establecido en el catálogo para que el sistema siempre produzca un resultado consistente.

### 5.3 ¿Cuándo se puede pasar de dos etiquetas a una?

Al inicio se conservarán las dos etiquetas porque todavía no hay suficiente información sobre el comportamiento del estudiante.

Más adelante, se propone reducirlas a una cuando exista evidencia suficiente de que uno de los formatos funciona mejor para organizar su ruta.

Como regla inicial, se propone que:

- El estudiante haya interactuado con al menos cinco recursos.
- Existan datos de interacción comparables para ambos formatos.
- La tasa de finalización de uno sea al menos 20 puntos porcentuales mayor que la del otro.
- Se haya revisado que reducir las etiquetas no impida acceder a recursos necesarios.
- La regla haya sido aprobada para su implementación.

La tasa de finalización se calcula así:

Tasa de finalización = (recursos completados ÷ recursos iniciados) × 100.

Por ejemplo, si inició diez recursos de un formato y terminó ocho, su tasa de finalización es del 80 %.

Sin embargo, terminar un recurso no demuestra por sí solo que el estudiante haya aprendido más. Esta información se utilizará como una señal para ajustar la recomendación, no como una prueba definitiva de aprendizaje.

Los umbrales de cinco recursos y veinte puntos porcentuales son propuestas pendientes de aprobación. Si no hay suficientes datos, se conservarán las dos etiquetas.

---

# 6. Regla 4. Organizar la ruta de aprendizaje por semanas

Después de elegir los formatos, el sistema deberá decidir qué recursos conviene realizar primero y cómo distribuirlos en el tiempo.

Para hacerlo, tomará en cuenta el nivel de conocimientos, las etiquetas asignadas, los recursos disponibles, las actividades obligatorias y el horario del estudiante.

### 6.1 ¿Qué recursos van primero?

Se propone utilizar este orden de prioridad:

1. Actividades obligatorias y entregas con fecha límite.
2. Recursos básicos de las unidades donde el estudiante tiene nivel bajo.
3. Recursos de repaso para las unidades de nivel medio.
4. Recursos de profundización para las unidades de nivel alto.
5. Recursos complementarios que coincidan con las etiquetas de formato.

Este orden sirve como criterio general. Si una actividad necesita que el estudiante complete otra primero, se respetará esa dependencia.

### 6.2 ¿Cómo se utiliza la disponibilidad?

El cuestionario de disponibilidad indicará cuántas horas puede estudiar el estudiante y en qué franjas tiene tiempo: mañana, tarde o noche.

La aplicación utilizará esa información para distribuir los recursos en bloques semanales.

Por ejemplo, si el estudiante dispone de cuatro horas por semana, el sistema intentará que los recursos asignados a esa semana sumen como máximo cuatro horas.

| Recurso | Tiempo estimado | Prioridad |
| --- | --- | --- |
| Texto introductorio | 45 minutos | Fundamental |
| Video explicativo | 30 minutos | Complementaria |
| Ejercicio guiado | 60 minutos | Fundamental |
| Simulación | 45 minutos | Complementaria |
| Actividad obligatoria | 60 minutos | Obligatoria |
| **Total** | **240 minutos** | **4 horas** |

En este ejemplo, los recursos suman exactamente cuatro horas.

Si el estudiante indicó que puede estudiar por la tarde, la aplicación mostrará esa preferencia al organizar su ruta.

### 6.3 ¿Qué pasa si no hay tiempo suficiente?

La aplicación no deberá eliminar recursos simplemente porque no caben en una semana.

Si los recursos obligatorios superan el tiempo disponible:

1. Mantendrá las actividades obligatorias.
2. Distribuirá los demás recursos en los bloques siguientes, cuando sea posible.
3. Indicará que la carga de trabajo supera las horas disponibles.
4. Permitirá que el docente revise la planificación si es necesario.

De esta manera, la disponibilidad se utiliza para organizar el tiempo y no para impedir que el estudiante acceda a contenidos importantes.

La duración de cada recurso deberá registrarse en el catálogo o estimarse con ayuda del docente. Si no se conoce la duración, el sistema no deberá inventar un valor y presentarlo como un dato real.

---

# 7. Regla 5. Resolver situaciones especiales

| Situación | Qué hará el sistema |
| --- | --- |
| Dos formatos tienen la misma puntuación | Aplicará los criterios de desempate. |
| Una dimensión del ILS está equilibrada | No sumará puntos por esa dimensión. |
| Faltan respuestas del ILS | Solicitará completar el instrumento antes de calcular el perfil definitivo. |
| Faltan respuestas en las preferencias de formato | No supondrá que al estudiante no le gusta el formato que dejó sin responder. |
| El diagnóstico de una unidad está incompleto | Marcará el nivel como pendiente. |
| El estudiante no indica sus horas disponibles | Solicitará completar la disponibilidad antes de crear la planificación definitiva. |
| No existen suficientes recursos de un formato | Mantendrá la recomendación, pero señalará que faltan recursos de ese tipo. |
| Los recursos obligatorios exceden las horas disponibles | Mantendrá las actividades y señalará el conflicto. |
| Cambia la disponibilidad del estudiante | Reorganizará los recursos pendientes. |
| El estudiante avanza en el curso | Actualizará la ruta con la nueva información disponible. |

El objetivo es que la aplicación no invente información cuando falten respuestas ni genere una ruta definitiva a partir de un perfil incompleto.

---

# 8. Ejemplos completos

Los siguientes ejemplos utilizan estudiantes ficticios. Los puntajes y las rutas son ilustrativos y sirven para explicar cómo funcionarían las reglas.

### Ejemplo 1. Estudiante que necesita reforzar una unidad

**Datos del estudiante:**

- Resultado del diagnóstico: 1 respuesta correcta de 3 en la unidad 1.
- ILS: preferencia visual fuerte, con otras dimensiones que también favorecen algunos formatos.
- Preferencias: video = 5, infografía = 4, ejercicio = 4, simulación = 3, texto = 2, podcast = 1.
- Disponibilidad: cuatro horas por semana, por la tarde.

**Paso 1. Calcular el nivel.**

Obtuvo un acierto de tres, por lo que su nivel en la unidad 1 es bajo.

**Paso 2. Calcular los formatos.**

Se multiplica cada preferencia por dos y se agregan los puntos del ILS según la tabla de correspondencias.

| Formato | Puntos de preferencia | Puntos del ILS | Total |
| --- | --- | --- | --- |
| Video | 10 | 3 | 13 |
| Infografía | 8 | 3 | 11 |
| Ejercicio | 8 | 1 | 9 |
| Simulación | 6 | 1 | 7 |
| Texto | 4 | 0 | 4 |
| Podcast | 2 | 0 | 2 |

**Paso 3. Asignar las etiquetas.**

Recibe inicialmente `video` e `infografia`, porque son los formatos con mayor puntuación.

**Paso 4. Crear la ruta.**

Se recomiendan explicaciones básicas, ejemplos visuales y ejercicios guiados. Los recursos se distribuyen para que su duración no supere las cuatro horas semanales declaradas.

**Resultado:** el estudiante recibe apoyo para reforzar la unidad y una ruta organizada según sus preferencias y disponibilidad.

### Ejemplo 2. Estudiante que domina los contenidos iniciales

**Datos del estudiante:**

- Resultado del diagnóstico: 3 respuestas correctas de 3 en la unidad 2.
- ILS: preferencia intuitiva fuerte, con inclinación hacia los formatos favorecidos por las dimensiones reflexiva y verbal.
- Preferencias: texto = 5, podcast = 4, video = 3, infografía = 3, ejercicio = 2, simulación = 2.
- Disponibilidad: tres horas por semana, por la noche.

**Paso 1. Calcular el nivel.**

Obtuvo tres aciertos de tres, por lo que su nivel inicial en la unidad 2 es alto.

**Paso 2. Calcular los formatos.**

| Formato | Puntos de preferencia | Puntos del ILS | Total |
| --- | --- | --- | --- |
| Texto | 10 | 2 | 12 |
| Podcast | 8 | 2 | 10 |
| Video | 6 | 1 | 7 |
| Infografía | 6 | 1 | 7 |
| Ejercicio | 4 | 0 | 4 |
| Simulación | 4 | 0 | 4 |

Los aportes del ILS son ilustrativos y deberán coincidir con la tabla definitiva de correspondencias.

**Paso 3. Asignar las etiquetas.**

Recibe inicialmente `texto` y `podcast`.

**Paso 4. Crear la ruta.**

Se recomiendan lecturas conceptuales, explicaciones complementarias y recursos de profundización. Las actividades obligatorias se conservan y los recursos se distribuyen dentro de las tres horas semanales disponibles.

**Resultado:** la ruta prioriza contenidos de profundización, pero mantiene las actividades necesarias para cumplir los objetivos de la unidad.

### Ejemplo 3. Estudiante que todavía no completa su perfil

**Datos del estudiante:**

- ILS: completo.
- Diagnóstico de la unidad 3: 2 respuestas correctas de 3.
- Preferencias: video = 4, texto = 4 e infografía = 3; faltan las respuestas de podcast, simulación y ejercicio.
- Disponibilidad: dos horas por semana, por la mañana.

**Paso 1. Calcular el nivel.**

Obtuvo dos aciertos de tres, por lo que su nivel inicial en la unidad 3 es medio.

**Paso 2. Revisar el perfil.**

Como faltan respuestas del cuestionario de preferencias, todavía no se puede calcular una puntuación definitiva para los seis formatos.

**Paso 3. Evitar una asignación incorrecta.**

La aplicación no tratará los formatos sin respuesta como si tuvieran una preferencia baja. Solicitará completar el cuestionario y marcará el perfil como incompleto.

**Paso 4. Mostrar una planificación provisional.**

Mientras completa el instrumento, podrá consultar los recursos obligatorios y la información académica que ya esté disponible. La ruta personalizada definitiva se generará cuando se cuente con los datos necesarios.

**Resultado:** el sistema utiliza la información disponible sin inventar respuestas ni presentar una recomendación provisional como definitiva.

---

# 9. ¿Cómo se llevarán estas reglas al programa?

Cuando se apruebe el documento, las reglas se convertirán en funciones de Python independientes. Por ejemplo:

- Una función calculará el nivel de conocimientos de cada unidad.
- Otra calculará la puntuación de los seis formatos.
- Otra seleccionará las dos etiquetas iniciales.
- Otra organizará los recursos según la prioridad y la disponibilidad.
- Otra revisará si el perfil está completo y si hay situaciones especiales.

Cada función tendrá pruebas automatizadas para verificar que produzca los resultados esperados.

Los cambios en los puntajes, los umbrales y las reglas deberán quedar documentados. La aplicación también deberá conservar el progreso del estudiante cuando se actualice su perfil o se reorganice la ruta.

La recomendación se calculará en la aplicación y se integrará con Moodle respetando los permisos y las restricciones de acceso configuradas para el curso.

---

# 10. Criterios de aceptación

- Se propone una regla para calcular el nivel de conocimientos por unidad.
- Se explica cómo combinar el ILS con las preferencias de formato.
- Se establece una propuesta para asignar dos etiquetas iniciales y reducirlas a una cuando exista evidencia suficiente.
- Se explica cómo organizar los recursos por semanas según la disponibilidad.
- Se definen reglas para empates, instrumentos incompletos y falta de tiempo.
- Se presentan tres ejemplos ficticios de principio a fin.