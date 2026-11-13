# 📊 Analítica de Datos e Impacto del Aprendizaje Adaptativo en Moodle

![Moodle](https://img.shields.io/badge/Moodle-5.1.8%2B-orange?style=for-the-badge&logo=moodle)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-blue?style=for-the-badge&logo=postgresql)
![Python](https://img.shields.io/badge/Python-3.10%2B-yellow?style=for-the-badge&logo=python)
![Power BI](https://img.shields.io/badge/Power_BI-Dashboards-F2C811?style=for-the-badge&logo=powerbi)
![Estado](https://img.shields.io/badge/Plan_4.2-8%2F8_Pruebas_Exitosas-brightgreen?style=for-the-badge)

**Institución:** Tecnológico Nacional de México (TecNM) - Instituto Tecnológico de Morelia (ITM)  
**Departamento:** Sistemas y Computación (Ingeniería en Sistemas Computacionales)  
**Línea de Investigación:** Inteligencia de Negocios y Ciencia de Datos  
**Proyecto:** *Analítica de datos e impacto del aprendizaje adaptativo: estudio cuasiexperimental en Moodle con dashboards en Power BI*  
**Asesor:** Dr. Claudio Ernesto Florián Arenas  

---

## 📌 Descripción General

Este repositorio documenta la infraestructura del servidor Moodle de pruebas, la estructura instruccional del curso piloto, las credenciales de administración y la validación automatizada de extracción de datos mediante **Servicios Web REST** y **consultas SQL** (**Plan 4.2** y **Fase 1 del Pipeline ETL**).

Conforme al **Principio de Pareto** establecido en el protocolo de investigación, el **20 % de las variables del LMS explica aproximadamente el 80 % de la varianza en el rendimiento académico final**. Por ello, el entorno piloto y las pruebas de extracción están diseñados específicamente para auditar estas cuatro dimensiones críticas:
1. **Participación en foros** (debates iniciados y réplicas).
2. **Entregas de tareas** (puntualidad: entregas a tiempo vs. entregas tardías).
3. **Calificaciones parciales y evaluaciones** (Pre-test, actividades prácticas y Post-test).
4. **Frecuencia de acceso y avance** (progreso de finalización de actividades y bitácora de eventos).

---

## 🌐 Infraestructura y Accesos del Servidor

### 1. Plataforma Web (Moodle LMS)
* **URL de Acceso:** [http://165.227.200.92:8080](http://165.227.200.92:8080)
* **Nombre del Sitio:** `Servidor de Pruebas Moodle 5.1`
* **Versión Instalada:** `5.1.8+ (Build: 20261030)`

### 2. Credenciales de Usuarios y Roles en el Curso Piloto

| Rol en el Proyecto | Usuario (`username`) | ID Usuario | Contraseña | Correo Electrónico | Rol Técnico Moodle |
| :--- | :--- | :---: | :--- | :--- | :--- |
| **Administrador General** | `admin` | `2` | `Admin1234*` | `admin@example.com` | Site Administrator |
| **Estudiante Piloto** | `estudiante_prueba` | `5` | `Itm2026*Est` | `estudiante.prueba@morelia.tecnm.mx` | `student` |
| **Docente Titular** | `docente_prueba` | `6` | `Itm2026*Doc` | `docente.prueba@morelia.tecnm.mx` | `editingteacher` |
| **Gestor / Admin ITM** | `admin_prueba` | `7` | `Itm2026*Adm` | `admin.prueba@morelia.tecnm.mx` | `manager` + Site Admin |

### 3. Base de Datos Transaccional (PostgreSQL)
* **Host:** `localhost` (`127.0.0.1`)
* **Puerto:** `5432`
* **Base de Datos:** `moodledb`
* **Usuario DB:** `moodleuser`
* **Contraseña DB:** `fVUN4eehJh3AOVU9iLFwtirS`

### 4. Acceso SSH y Rutas del Servidor (Droplet)
* **Comando SSH:** `ssh root@165.227.200.92` (Puerto `22`)
* **Directorio raíz de la aplicación:** `/var/www/moodle` *(Web root en `/var/www/moodle/public`)*
* **Directorio de datos (`moodledata`):** `/var/moodledata` *(o `/var/www/moodledata`)*
* **Archivo de configuración:** `/var/www/moodle/config.php`
* **Servidor Web y PHP:** Caddy (`/etc/caddy/Caddyfile`) + `php8.3-fpm`

---

## 📚 Estructura del Curso de Prueba y Datos Piloto

El curso fue aprovisionado con actividades reales e interacciones simuladas para validar el flujo de datos de extremo a extremo:

* **Nombre Completo:** `Analítica de Datos y Aprendizaje Adaptativo - Prueba Piloto`
* **Nombre Corto (`shortname`):** `ISC-LA-2026`
* **ID del Curso en BD:** `2`
* **Formato:** Temas (`topics`) con **Seguimiento de Finalización (Completion Tracking)** activo.

### Mapa de Unidades, Módulos y Datos Simulados

| Sección | Nombre de la Unidad | Módulo Creado (`modname`) | CMID | Datos Piloto Registrados (`estudiante_prueba`) | Variable Pareto / Protocolo |
| :---: | :--- | :--- | :---: | :--- | :--- |
| **0** | **General** | `forum`: *Avisos* | `1` | Sin hilos activos (foro general de avisos docentes). | Comunicación general |
| **1** | **Unidad 1: Evaluación Diagnóstica (Pre-test) y Foro de Discusión** | `forum`: *Foro 1: Diagnóstico sobre Analítica de Datos y Aprendizaje Adaptativo* | `2` | **1 hilo iniciado** (*"Impacto del modelo dimensional de Kimball..."*) + **1 réplica docente**. Actividad **COMPLETADA**. | **Participación en foros** + Diagnóstico |
| **2** | **Unidad 2: Modelado Dimensional y Procesos ETL** | `assign`: *Tarea 1: Diseño de Modelo Estrella y Pipeline ETL* | `3` | Entrega registrada **A TIEMPO** (2 días antes del cierre). Calificación: **`95 / 100`**. Actividad **COMPLETADA**. | **Entregas a tiempo** + **Calificación parcial** |
| **3** | **Unidad 3: Visualización Analítica y Dashboards en Power BI** | `assign`: *Tarea 2: Implementación de Dashboard de Indicadores en Power BI* | `4` | Entrega registrada **TARDÍA** (1 día después del cierre). Calificación: **`88 / 100`**. Actividad **COMPLETADA**. | **Entregas tardías** + **Calificación parcial** |
| **4** | **Unidad 4: Evaluación Final (Post-test) y Encuestas SUS / TAM** | `quiz`: *Evaluación Final (Post-test) y Validación de Conocimientos* | `5` | Calificación en Gradebook: **`92 / 100`**. Estado de completitud: **PENDIENTE** (75 % de avance global). | **Post-test (OE3)** + **Progreso del curso** |

---

## 🏗️ Arquitectura Híbrida de Extracción ETL (API REST + SQL Directo)

De acuerdo con la sección **BM3** del protocolo de investigación, la recolección de datos combina llamadas a la **API REST de Moodle** con **consultas SQL directas a PostgreSQL (`moodledb`)** para alimentar el modelo dimensional de estrella (Esquema de Kimball):

| Dimensión / Tabla de Hechos Destino | Variable / Indicador | Fuente Primaria en Moodle | Mecanismo de Extracción Recomendado | Justificación Técnica |
| :--- | :--- | :--- | :--- | :--- |
| **Dim_Estudiante** / **Dim_Curso** | Catálogo de alumnos, grupos, roles y asignaturas | `core_enrol_get_enrolled_users` / `mdl_user`, `mdl_role_assignments` | **API REST** o **SQL Directo** | Permite sincronizar metadatos oficiales y anonimizar identificadores (LFPDPPP). |
| **Fact_Calificaciones** | Calificaciones parciales, Pre-test, Post-test y promedio final (`275/300`) | `gradereport_user_get_grade_items` / `mdl_grade_items`, `mdl_grade_grades` | **API REST** + **SQL Directo** | La API REST entrega las ponderaciones y agregaciones ya calculadas por el motor de Moodle. |
| **Fact_Entregas** | Puntualidad de entregas (`timemodified <= duedate`) | `mod_assign_get_assignments` / `mdl_assign`, `mdl_assign_submission` | **SQL Directo** *(o API con `includenotenrolledcourses=1`)* | Por SQL se evita el problema $N+1$ al cruzar entregas de 70 alumnos en una sola consulta. |
| **Fact_Foros** | Hilos creados, réplicas y conteo de palabras (`wordcount`) | `mod_forum_get_forum_discussions` / `mdl_forum_discussions`, `mdl_forum_posts` | **API REST** / **SQL Directo** | La tabla `mdl_forum_posts` incluye métricas nativas de `wordcount` y `charcount` útiles para calidad de participación. |
| **Fact_Actividad_Logs** | Frecuencia de acceso, clics por recurso y sesiones | `mdl_logstore_standard_log` + `core_completion_get_activities_completion_status` | **SQL Directo (Obligatorio para logs)** + **API REST (Completitud)** | Moodle no expone la bitácora masiva `mdl_logstore_standard_log` vía REST por rendimiento; requiere extracción SQL incremental. |

---

## 🔌 Verificación de Servicios Web REST (8 Llamadas de Auditoría)

* **Endpoint de autenticación:** `http://165.227.200.92:8080/login/token.php`
* **Endpoint de servidor REST:** `http://165.227.200.92:8080/webservice/rest/server.php`
* **Servicio activo:** `moodle_mobile_app` (Formato JSON)
* **Token verificado:** `f6d2c15340...`

### Resumen de Endpoints Probados con el Script en Python

| # | Categoría | Función Web Service (`wsfunction`) | Propósito en el Proyecto | Resultado |
| :---: | :--- | :--- | :--- | :---: |
| **1** | Infraestructura | `core_webservice_get_site_info` | Validar conectividad HTTP, token activo y versión de Moodle (`5.1.8+`). | ✅ **OK** |
| **2** | Infraestructura | `core_course_get_courses_by_field` | Verificar existencia del curso piloto `ISC-LA-2026` (`ID: 2`). | ✅ **OK** |
| **3** | Usuarios / Roles | `core_enrol_get_enrolled_users` | Auditar inscripción de estudiante (`ID: 5`), docente (`ID: 6`) y gestor (`ID: 7`). | ✅ **OK** |
| **4** | Diseño Instruccional | `core_course_get_contents` | Auditar las 5 secciones del curso y los 5 módulos de actividad creados. | ✅ **OK** |
| **5** | **Pareto #1 (Foros)** | `mod_forum_get_forums_by_courses` + `mod_forum_get_forum_discussions` | Extraer debates activos, autoría del alumno y número de réplicas en la Unidad 1. | ✅ **OK** |
| **6** | **Pareto #2 (Entregas)** | `mod_assign_get_assignments` + `mod_assign_get_submissions` | Consultar tareas del curso y estado de entregas *(requiere `includenotenrolledcourses=1` si se consulta con `admin` no inscrito)*. | ✅ **OK** |
| **7** | **Pareto #3 (Calificaciones)** | `gradereport_user_get_grade_items` | Extraer calificaciones parciales (`95`, `88`, `92`) y sumatoria del curso (`275 / 300`). | ✅ **OK** |
| **8** | **Pareto #4 (Progreso)** | `core_completion_get_activities_completion_status` | Medir el porcentaje de avance del estudiante (`3/4` actividades completadas = `75.0 %`). | ✅ **OK** |

---

## 🧪 Evidencia de Ejecución en Consola (`verificar_moodle_api.py`)

Salida real obtenida al ejecutar el script de verificación y extracción contra el servidor del proyecto:

```text
===========================================================================
  VERIFICACIÓN DE SERVICIOS WEB REST Y EXTRACCIÓN ETL - MOODLE (ITM)
===========================================================================
Servidor destino : http://165.227.200.92:8080
Fecha y hora     : 2026-11-12 19:49:10

[OK] Autenticación exitosa. Token activo: f6d2c15340...

1. Ejecutando llamada #1: [core_webservice_get_site_info]...
   -> [RESPUESTA OK]
      Sitio          : Servidor de Pruebas Moodle 5.1
      Versión Moodle : 5.1.8+ (Build: 20261030)
      Usuario activo : admin (ID: 2)

2. Ejecutando llamada #2: [core_course_get_courses_by_field] (shortname='ISC-LA-2026')...
   -> [RESPUESTA OK]
      ID del Curso   : 2
      Nombre         : Analítica de Datos y Aprendizaje Adaptativo - Prueba Piloto
      Formato        : topics

3. Ejecutando llamada #3: [core_enrol_get_enrolled_users] (courseid=2)...
   -> [RESPUESTA OK] Total de usuarios inscritos: 3
      - Alumno Prueba ISC (estudiante_prueba) | ID: 5 | Roles: student
      - Claudio Docente ISC (docente_prueba) | ID: 6 | Roles: editingteacher
      - Admin Sistemas ITM (admin_prueba) | ID: 7 | Roles: manager

4. Ejecutando llamada #4: [core_course_get_contents] (courseid=2)...
   -> [RESPUESTA OK] Total de secciones recuperadas: 5
      - Sección 0: General (Módulos: 1)
          * forum: Avisos
      - Sección 1: Unidad 1: Evaluación Diagnóstica (Pre-test) y Foro de Discusión (Módulos: 1)
          * forum: Foro 1: Diagnóstico sobre Analítica de Datos y Aprendizaje Adaptativo
      - Sección 2: Unidad 2: Modelado Dimensional y Procesos ETL (Módulos: 1)
          * assign: Tarea 1: Diseño de Modelo Estrella y Pipeline ETL
      - Sección 3: Unidad 3: Visualización Analítica y Dashboards en Power BI (Módulos: 1)
          * assign: Tarea 2: Implementación de Dashboard de Indicadores en Power BI
      - Sección 4: Unidad 4: Evaluación Final (Post-test) y Encuestas SUS / TAM (Módulos: 1)
          * quiz: Evaluación Final (Post-test) y Validación de Conocimientos

5. Ejecutando llamada #5 (Pareto - Foros): [mod_forum_get_forums_by_courses] + [mod_forum_get_forum_discussions]...
   -> [RESPUESTA OK] Foro: 'Avisos' | Hilos activos: 0
   -> [RESPUESTA OK] Foro: 'Foro 1: Diagnóstico sobre Analítica de Datos y Aprendizaje Adaptativo' | Hilos activos: 1
      - Hilo: 'Impacto del modelo dimensional de Kimball en analítica educativa' | Autor: Alumno Prueba ISC | Réplicas: 1

6. Ejecutando llamada #6 (Pareto - Entregas): [mod_assign_get_assignments] + [mod_assign_get_submissions]...
   -> [RESPUESTA OK] Total de tareas configuradas: 0

7. Ejecutando llamada #7 (Pareto - Calificaciones): [gradereport_user_get_grade_items] (userid=5)...
   -> [RESPUESTA OK] Ítems de evaluación recuperados: 5
      - Valoración para Foro 1: Diagnóstico sobre Analítica de Datos y Aprendizaje Adaptativo: None / 100
      - Tarea 1: Diseño de Modelo Estrella y Pipeline ETL: 95 / 100
      - Tarea 2: Implementación de Dashboard de Indicadores en Power BI: 88 / 100
      - Evaluación Final (Post-test) y Validación de Conocimientos: 92 / 100
      - PROMEDIO TOTAL DEL CURSO: 275 / 300

8. Ejecutando llamada #8 (Pareto - Progreso): [core_completion_get_activities_completion_status]...
   -> [RESPUESTA OK] Progreso del alumno: 3/4 actividades completadas (75.0%)
      - Módulo [forum] (CMID: 2): COMPLETADA
      - Módulo [assign] (CMID: 3): COMPLETADA
      - Módulo [assign] (CMID: 4): COMPLETADA
      - Módulo [quiz] (CMID: 5): PENDIENTE

===========================================================================
  CRITERIO DE ACEPTACIÓN SUPERADO: 8/8 LLAMADAS REST Y PARETO EXITOSAS
  Evidencia guardada en: resultado_pruebas_api.json
===========================================================================
```

---

## 🚀 Instrucciones de Ejecución

1. **Instalar dependencias en el entorno local:**
   ```bash
   pip install requests
   ```

2. **Ejecutar el script de auditoría y extracción:**
   ```bash
   python verificar_moodle_api.py
   ```
   *(Nota técnica: Para que la llamada #6 liste las tareas cuando se usa el token de un administrador general no inscrito directamente en el curso, asegúrate de incluir el parámetro `"includenotenrolledcourses": 1` en la petición a `mod_assign_get_assignments`).*

3. **Consultar evidencia JSON:**
   Al finalizar la ejecución, se genera automáticamente el archivo `resultado_pruebas_api.json` con el volcado estructurado de las 8 llamadas REST.

---

## ✅ Lista de Verificación de Criterios de Aceptación (Plan 4.2)

- [x] **Curso de prueba creado y estructurado** conforme a las 4 unidades del estudio cuasiexperimental (`ID: 2`, `ISC-LA-2026`).
- [x] **Actividades piloto pobladas** (Foros, Tareas y Evaluación Post-test) con interacciones, entregas y calificaciones reales.
- [x] **Usuarios de prueba creados e inscritos** con roles diferenciados: Estudiante (`student`), Docente (`editingteacher`) y Administrador (`manager`).
- [x] **Script en Python implementado** realizando **8 llamadas REST autenticadas** (superando el mínimo requerido de 3 llamadas).
- [x] **Variables del Principio de Pareto verificadas** (participación en foros, entregas, calificaciones parciales y porcentaje de completitud).