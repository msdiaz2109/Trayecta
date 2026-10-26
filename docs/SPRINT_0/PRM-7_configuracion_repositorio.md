# PRM-7 · Configuración del repositorio GitHub, ramas y gobernanza

> **Proyecto:** Trayecta — Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle  
> **Tarea Jira:** PRM-7  
> **Requisitos relacionados:** Flujo de trabajo 1, 2 y 9  
> **Responsable:** Alfredo Aguilar  
> **Estado:** Borrador para revisión del asesor  

---

## 1. Propósito de la tarea

Establecer el repositorio oficial de Trayecta en GitHub siguiendo los lineamientos de control de versiones y gobernanza definidos en el documento `Flujo de trabajo y control de versiones (GitHub).md`.

## 2. Configuración del Repositorio

- **Nombre oficial del repositorio:** `trayecta` (derivado de PRM-1).
- **Visibilidad:** Privado durante la fase de desarrollo y validación experimental.
- **Ramas base creadas:**
  - `main`: Rama de producción. Contiene únicamente versiones estables liberadas al final de cada sprint o hito evaluable.
  - `develop`: Rama de integración continua. Base para la creación de ramas de características y tareas.

## 3. Políticas de Protección de Ramas (Branch Protection)

Se configuraron las siguientes reglas de protección en GitHub para las ramas `main` y `develop`:
1. **Bloqueo de push directo:** Ningún miembro del equipo puede realizar `git push` directo a `main` ni a `develop`.
2. **Revisión obligatoria de Pull Requests (PR):**
   - Todo cambio debe integrarse mediante Pull Request.
   - Requiere la aprobación de al menos un revisor del equipo antes de fusionar.
   - Los autores no pueden aprobar sus propios PRs.
3. **Conversaciones resueltas:** Todos los hilos de comentarios y revisiones de código deben marcarse como resueltos antes de permitir el merge.
4. **Historial lineal y mensajes de commit:** Se requiere asociar la clave de la tarea (`prm-N`) tanto en el nombre de la rama como en los mensajes de commit.

## 4. Archivo `.gitignore`

Se generó el archivo `.gitignore` optimizado para el ecosistema PHP 8.3, Moodle 5.1 y contenedores Docker:
- Exclusión de directorios de dependencias: `vendor/`, `node_modules/`.
- Exclusión de datos variables de Moodle: `moodledata/`, cachés locales y sesiones.
- Exclusión de configuraciones locales y secretos: `config.php`, `.env`, certificados SSL.
- Exclusión de archivos del sistema operativo e IDEs: `.DS_Store`, `Thumbs.db`, `.vscode/`, `.idea/`.

## 5. Criterios de Aceptación Cumplidos

- [x] Repositorio creado con el nombre oficial `trayecta`.
- [x] Ramas `main` y `develop` creadas e inicializadas.
- [x] Reglas de protección activadas para `main` y `develop` (PR obligatorio y sin push directo).
- [x] Archivo `.gitignore` configurado y añadido en el commit inicial.
- [x] Documentación de gobernanza alineada con el flujo de trabajo del equipo.
