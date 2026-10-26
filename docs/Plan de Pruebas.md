# Plan de Pruebas

**Plugin de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle (local_trayecta)**

Instituto Tecnológico de Morelia, Departamento de Sistemas y Computación.  
Autores: Aguilar Garnica Alfredo, Meneses Díaz Mariana Sofía y Salvador Alejos Soria.  
Asesor: DCE. Claudio Ernesto Florián Arenas.  
Versión 1.0, actualizada al 2026-10-25.

---

## 1. Propósito y alcance del plan

Este documento establece la estrategia, los casos de prueba y los criterios de aceptación para verificar y validar el funcionamiento del plugin `local_trayecta` dentro de Moodle 5.1, en estricto apego a la [Especificación de Requisitos de Software (ERS v1.3)](file:///c:/Users/Mariana/Desktop/Trayecta/docs/ERS.md) y al [Manual Técnico v1.0](file:///c:/Users/Mariana/Desktop/Trayecta/docs/Manual%20Tecnico.md).

El plan abarca cuatro dimensiones de verificación:
1. **Pruebas unitarias automatizadas (PHPUnit):** Algoritmos de puntuación de las cuatro herramientas de perfilamiento (H1 a H4) y motor híbrido de recomendación.
2. **Pruebas de integración con Moodle:** Tareas programadas (cron), observadores de eventos y gestión de restricciones condicionales por grupos.
3. **Pruebas cuasiexperimentales y estadísticas:** Contraste inferencial del impacto académico entre la cohorte experimental y la cohorte de control.
4. **Pruebas de usabilidad y seguridad:** Medición de la escala SUS y cumplimiento de directrices de seguridad OWASP Top 10.

---

## 2. Entorno de pruebas

- **Servidor de pruebas:** Ubuntu Server 24.04 LTS con Apache 2.4 y PHP 8.3.
- **Base de datos:** PostgreSQL 16 configurado con UTF-8 y base de datos limpia para pruebas unitarias.
- **Instancia LMS:** Moodle 5.1 instalado con configuración para PHPUnit habilitada (`$\rightarrow$CFG->phpunit_prefix = 'phpu_';`).
- **Plugin bajo prueba:** `local_trayecta` clonado en `/local/trayecta/`.
- **Datos de prueba:**
  - 1 curso de *Fundamentos de Ingeniería de Software* de prueba con 5 unidades temáticas.
  - Al menos 3 recursos por unidad (video, texto, simulación) y 2 actividades evaluativas oficiales.
  - Cohorte de prueba: 20 estudiantes sintéticos (10 asignados a cohorte experimental y 10 a control).

---

## 3. Matriz general de pruebas

| ID | Tipo de prueba | Componente evaluado | Método / Herramienta | Requisitos |
| --- | --- | --- | --- | --- |
| **PR-UNI-01** | Unitaria | Cálculo de dimensiones bipolares del ILS (H1) | PHPUnit | REQ-PER-002 |
| **PR-UNI-02** | Unitaria | Normalización de preferencias y disponibilidad (H2) | PHPUnit | REQ-PER-003 |
| **PR-UNI-03** | Unitaria | Almacenamiento y baremos del módulo psicométrico (H3) | PHPUnit | REQ-PER-004, REQ-PER-010 |
| **PR-UNI-04** | Unitaria | Corte de nivel del examen diagnóstico por unidad (H4) | PHPUnit | REQ-PER-005, REQ-PER-011 |
| **PR-UNI-05** | Unitaria | Motor híbrido: reglas y arranque en frío | PHPUnit | REQ-REC-001 a REQ-REC-004 |
| **PR-UNI-06** | Unitaria | Empaquetado en bloques semanales | PHPUnit | REQ-REC-005 |
| **PR-INT-01** | Integración | Ocultamiento inmediato de recursos nuevos (Event Observer) | Moodle Event API | REQ-INT-007, REQ-INT-010 |
| **PR-INT-02** | Integración | Tarea programada de sincronización y bitácora (Cron) | Scheduled Tasks API | REQ-INT-003, REQ-RND-004 |
| **PR-INT-03** | Integración | Asignación de grupos de acceso condicional | Core Group API | REQ-INT-004 |
| **PR-INT-04** | Integración | Exámenes y actividades sin restricción de acceso | Core Course API | REQ-INT-008 |
| **PR-INT-05** | Integración | Tolerancia a fallas y reintentos automáticos | Simulación de error | REQ-INT-006 |
| **PR-EXP-01** | Cuasiexperimental | Contraste estadístico de calificaciones finales (A/B) | Script R / Python / PHP | REQ-EVA-002 |
| **PR-USA-01** | Usabilidad | Cálculo y reporte del puntaje System Usability Scale (SUS) | Formulario Moodle | REQ-USA-001, REQ-EVA-003 |
| **PR-SEG-01** | Seguridad | Control de acceso por rol y protección de datos | OWASP ZAP / Manual | REQ-SEG-001 a REQ-SEG-004 |

---

## 4. Casos de prueba detallados

### PR-UNI-01. Cálculo de dimensiones bipolares del ILS (H1)
- **Objetivo:** Verificar que las 44 respuestas dicotómicas del ILS generen puntajes enteros impares en el rango $\rightarrow$[-11, +11]$\rightarrow$ para cada una de las 4 dimensiones.
- **Entrada:** Vector de respuestas sintéticas de prueba:
  - Caso A: 11 respuestas 'a' en ACT/REF $\rightarrow$
ightarrow$\rightarrow$ Puntaje esperado: $\rightarrow$+11$\rightarrow$ (Muy activo).
  - Caso B: 11 respuestas 'b' en ACT/REF $\rightarrow$
ightarrow$\rightarrow$ Puntaje esperado: $\rightarrow$-11$\rightarrow$ (Muy reflexivo).
  - Caso C: 6 respuestas 'a' y 5 respuestas 'b' en VIS/VRB $\rightarrow$
ightarrow$\rightarrow$ Puntaje esperado: $\rightarrow$+1$\rightarrow$ (Equilibrado hacia visual).
- **Criterio de éxito:** Las funciones `calculate_ils_scores()` devuelven exactamente los valores calculados y rechazan vectores incompletos.

### PR-UNI-04. Corte de nivel del examen diagnóstico por unidad (H4)
- **Objetivo:** Validar que el examen diagnóstico aplicado al comenzar cada nueva unidad asigne correctamente el nivel de partida del estudiante en la plataforma.
- **Entradas y salidas esperadas:**
  - 0 o 1 acierto sobre 3 $\rightarrow$
ightarrow$\rightarrow$ Nivel: `'bajo'`, Grupo asignado: `U{n}-bajo`.
  - 2 aciertos sobre 3 $\rightarrow$
ightarrow$\rightarrow$ Nivel: `'medio'`, Grupo asignado: `U{n}-medio`.
  - 3 aciertos sobre 3 $\rightarrow$
ightarrow$\rightarrow$ Nivel: `'alto'`, Grupo asignado: `U{n}-alto`.
- **Criterio de éxito:** La entidad `mdl_trayecta_nivel_unidad` registra el resultado con marca de tiempo y la API de grupos de Moodle matricula al estudiante en el grupo correspondiente dentro de los 5 segundos posteriores al envío.

### PR-INT-01. Ocultamiento automático de recursos nuevos (Event Observer)
- **Objetivo:** Comprobar que ningún recurso didáctico nuevo sea visible para los estudiantes antes de ser clasificado pedagógicamente.
- **Pasos:**
  1. Con rol de docente, subir un nuevo archivo PDF al curso en Moodle.
  2. Verificar en base de datos el campo `visible` del módulo en `mdl_course_modules`.
  3. Comprobar la vista del curso desde una sesión de estudiante experimental.
- **Criterio de éxito:** El observador del evento `\core\event\course_module_created` establece de inmediato `visible = 0`. El estudiante no ve el recurso hasta que el docente asigna unidad, formato y nivel en el catálogo de Trayecta.

### PR-INT-04. Exámenes oficiales libres de restricción
- **Objetivo:** Garantizar que todas las evaluaciones calificadas y exámenes oficiales permanezcan siempre accesibles en idénticas condiciones para ambos grupos (experimental y control).
- **Pasos:**
  1. Crear un cuestionario oficial calificado en el curso.
  2. Ejecutar la sincronización periódica de Trayecta.
  3. Consultar las restricciones de disponibilidad del cuestionario.
- **Criterio de éxito:** El cuestionario no recibe ninguna condición de grupo de Trayecta; tanto los alumnos del Grupo Experimental como los del Grupo de Control pueden acceder y contestarlo en igualdad de condiciones (REQ-INT-008).

### PR-EXP-01. Evaluación de impacto cuasiexperimental
- **Objetivo:** Validar el algoritmo de análisis estadístico inferencial que compara el desempeño académico entre las dos cohortes al cierre del semestre.
- **Datos de prueba:**
  - Calificaciones oficiales finales de 20 estudiantes del Grupo Experimental ($\rightarrow$M_1 = 86.4, SD_1 = 6.2$\rightarrow$).
  - Calificaciones oficiales finales de 20 estudiantes del Grupo de Control ($\rightarrow$M_2 = 78.1, SD_2 = 7.5$\rightarrow$).
- **Criterio de éxito:** El script calcula correctamente:
  - Prueba de normalidad de Shapiro-Wilk sobre ambas muestras.
  - Valor del estadístico $\rightarrow$t$\rightarrow$ de Student para muestras independientes (o $\rightarrow$U$\rightarrow$ de Mann-Whitney).
  - Valor $\rightarrow$p$\rightarrow$ y tamaño del efecto (d de Cohen).
  - Tasa porcentual de aprobación y retención por grupo.

---

## 5. Procedimiento de ejecución y registro de resultados

1. **Ejecución automatizada de la suite PHPUnit:**
   ```bash
   cd /var/www/html/moodle
   sudo -u www-data vendor/bin/phpunit --testsuite local_trayecta_testsuite
   ```
2. **Generación del reporte de cobertura:**
   ```bash
   sudo -u www-data vendor/bin/phpunit --testsuite local_trayecta_testsuite --coverage-text
   ```
3. **Criterio de liberación:** La versión se considera lista para producción únicamente si el 100% de las pruebas unitarias e integrales pasan sin errores ni advertencias (`0 failures, 0 errors`) y la cobertura de código en las clases de negocio supera el 85%.
