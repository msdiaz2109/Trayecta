# PRM-14 · Integración con sesiones y roles nativos de Moodle

> **Proyecto:** Aplicación web de perfilamiento multidimensional del estudiante y motor de recomendación de rutas de aprendizaje integrado a Moodle  
> **Tarea Jira:** PRM-14  
> **Requisitos relacionados:** REQ-INT-001, REQ-ADM-001, REQ-SEG-002, MT 2.3  
> **Responsable:** Mariana Sofía Meneses Díaz  
> **Estado:** Borrador para revisión del asesor  

---

## 1. Propósito de la tarea

Verificar y programar que el plugin `local_trayecta` identifique a cualquier usuario autenticado en Moodle 5.1 a partir de su sesión activa, determine si está inscrito en el curso, distinga su rol operativo (**Estudiante**, **Docente** o **Administrador**) y actúe en consecuencia sin solicitar contraseñas ni registros adicionales (`REQ-INT-001`, `MT 2.3`).

---

## 2. Funciones y APIs nativas de Moodle utilizadas

La integración se implementó en [session_role_resolver.php](file:///c:/Users/Mariana/Desktop/Trayecta/local/trayecta/classes/local/session_role_resolver.php), [index.php](file:///c:/Users/Mariana/Desktop/Trayecta/local/trayecta/index.php) y [lib.php](file:///c:/Users/Mariana/Desktop/Trayecta/local/trayecta/lib.php) empleando exclusivamente las APIs internas del núcleo de Moodle 5.1:

| Función / Objeto de Moodle | Propósito dentro de `local_trayecta` |
| --- | --- |
| `require_login()` y `isguestuser()` | Garantiza que el usuario tenga una sesión activa en Moodle antes de acceder a cualquier página del plugin y bloquea cuentas de invitado. Si no ha iniciado sesión, Moodle redirige automáticamente a su pantalla de login institucional sin manejo de contraseñas propias. |
| `$USER` y `fullname($USER)` | Variable global de sesión de Moodle de la cual se leen `id`, `username`, `firstname`, `lastname`, `email` e `idnumber` (número de control/matrícula). |
| `context_system::instance()` | Obtiene el contexto global del sitio para verificar permisos de administración general. |
| `context_course::instance($courseid)` | Obtiene el contexto específico del curso consultado para evaluar inscripción, capacidades docentes y roles asignados. |
| `is_siteadmin($userid)` | Verifica si el usuario autenticado es administrador global de la plataforma Moodle. |
| `has_capability($capability, $context, $userid, $doanything)` | Evalúa capacidades nativas de Moodle:<br>• `moodle/site:config` en contexto de sistema para **Administrador**.<br>• `moodle/course:manageactivities` o `moodle/course:update` (con `$doanything = false`) en contexto de curso para **Docente** (`editingteacher` / `teacher`). |
| `is_enrolled($coursecontext, $userid, '', true)` | Comprueba si el usuario tiene una inscripción **activa** (`$onlyactive = true`) en el curso (`REQ-INT-001`). |
| `get_user_roles($coursecontext, $userid, true)` | Recupera los nombres cortos (`shortname`) de los roles asignados al usuario en el curso (`student`, `editingteacher`, `teacher`, etc.) para auditoría y diagnóstico. |
| `local_trayecta_extend_navigation_course()` | Hook en [lib.php](file:///c:/Users/Mariana/Desktop/Trayecta/local/trayecta/lib.php) que inserta el nodo **«Trayecta»** en la navegación del curso únicamente para usuarios autenticados con inscripción activa o permisos docentes/administrativos. |

---

## 3. Reglas de resolución de roles en Trayecta

La clase `\local_trayecta\local\session_role_resolver::resolve(int $courseid)` evalúa en orden jerárquico las condiciones del usuario en sesión y devuelve su rol operativo:

| Condición evaluada en Moodle | Rol resuelto (`trayectarole`) | Acceso (`canaccess`) | Acción del plugin (`MT 2.3` / `REQ-INT-001`) |
| --- | --- | --- | --- |
| `is_siteadmin($userid)` o `has_capability('moodle/site:config', $systemcontext)` | `admin` (**Administrador**) | `true` | Habilita configuración global del plugin, gestión de cohortes y exportación anonimizada CSV (`REQ-ADM-002`, `REQ-EVA-004`). |
| `has_capability('moodle/course:manageactivities', $coursecontext, $userid, false)` o `moodle/course:update` | `teacher` (**Docente**) | `true` | Habilita clasificación de objetos de aprendizaje, panel analítico del grupo y desbloqueo de recursos (`REQ-EVA-005`, `REQ-REC-010`). |
| `is_enrolled($coursecontext, $userid, '', true)` (sin capacidades docentes/admin) | `student` (**Estudiante**) | `true` | Habilita flujo de consentimiento informado (`REQ-PER-001`), herramientas de perfilamiento (H1–H4) y visualización de ruta personalizada. |
| Ninguna de las anteriores (usuario no inscrito en el curso) | `none` (**Sin acceso**) | `false` | Rechaza el acceso a los datos y recursos del curso conforme a `REQ-INT-001` y `REQ-SEG-002`. |

---

## 4. Usuarios y contraseñas para pruebas locales

Para comprobar la página de diagnóstico de roles en el entorno local Docker ([http://localhost:8080/local/trayecta/index.php?courseid=2](http://localhost:8080/local/trayecta/index.php?courseid=2)), se configuraron las siguientes credenciales para cada rol:

| Rol | Usuario de prueba | Contraseña | Datos en Moodle | Resultado esperado en Trayecta |
| --- | --- | --- | --- | --- |
| **Administrador** | `admin` | `Admin123!` | Administrador institucional | Rol: **Administrador** (acceso a configuración y cohortes) |
| **Docente** | `docente1` | `Clave123!` | Claudio Florian (`editingteacher` en curso 2) | Rol: **Docente** (acceso a catálogo, panel y desbloqueos) |
| **Estudiante** | `estudiante1` | `Clave123!` | Mariana Meneses (Matrícula: `23121132`, `student` en curso 2) | Rol: **Estudiante** (acceso a consentimiento, H1-H4 y rutas) |
| **No inscrito** | *(Crear o usar cuenta externa)* | — | Usuario autenticado no inscrito en curso 2 | Rol: **Sin acceso** (acceso rechazado según REQ-INT-001) |

---

## 5. Estructura de archivos implementados

```text
local/trayecta/
├── classes/
│   └── local/
│       └── session_role_resolver.php          # Lógica de identificación de sesión y resolución de los 3 roles
├── lang/
│   ├── en/
│   │   └── local_trayecta.php                 # Cadenas de idioma base en inglés
│   └── es/
│       └── local_trayecta.php                 # Cadenas de idioma en español
├── tests/
│   └── session_role_resolver_test.php         # Prueba PHPUnit para los 3 roles + usuario no inscrito
├── index.php                                  # Página de prueba del plugin (/local/trayecta/index.php?courseid=X)
├── lib.php                                    # Hook de navegación del curso en Moodle
└── version.php                                # Versión actualizada a 2026110200 (0.1.1)
```

---

## 6. Verificación con los tres roles

### 6.1 Página de prueba en navegador (`/local/trayecta/index.php?courseid=<id>`)
Al ingresar a un curso en Moodle con cualquiera de los tres roles y hacer clic en **«Trayecta»** en la navegación del curso (o visitar directamente `/local/trayecta/index.php?courseid=2`), la página despliega una tabla de diagnóstico con:
1. **Nombre completo (`$USER`):** obtenido de la sesión activa sin pedir inicio de sesión adicional.
2. **Usuario de Moodle, correo institucional y número de control (`idnumber`).**
3. **Curso actual** e indicador de **inscripción activa (`is_enrolled`)**.
4. **Roles asignados en Moodle (`get_user_roles`)** y **Rol reconocido por Trayecta** (`Estudiante`, `Docente` o `Administrador`), junto con la notificación en español del flujo que le corresponde.

### 6.2 Prueba automatizada con PHPUnit
El archivo [session_role_resolver_test.php](file:///c:/Users/Mariana/Desktop/Trayecta/local/trayecta/tests/session_role_resolver_test.php) verifica de forma automatizada los cuatro escenarios en Moodle:
1. **Estudiante inscrito (`student`):** reconoce su `userid`, matrícula (`23121132`), `isenrolled = true`, `trayectarole = 'student'` y `canaccess = true`.
2. **Docente inscrito (`editingteacher`):** reconoce `isenrolled = true`, `isteacher = true`, `trayectarole = 'teacher'` y `canaccess = true`.
3. **Administrador (`setAdminUser()`):** reconoce `isadmin = true`, `trayectarole = 'admin'` y `canaccess = true`.
4. **Usuario externo no inscrito:** reconoce `isenrolled = false`, `trayectarole = 'none'` y `canaccess = false` (`REQ-INT-001`).

Comando para ejecutar la prueba en el contenedor de Moodle:
```bash
docker compose exec -u www-data -w /var/www/html moodle vendor/bin/phpunit public/local/trayecta/tests/session_role_resolver_test.php
```

---

## 7. Criterios de aceptación cumplidos (PRM-14)

- [x] Uso de las APIs nativas de Moodle (`$USER`, `has_capability()`, `is_enrolled()`, `is_siteadmin()`, `get_user_roles()`) sin registros ni contraseñas adicionales (`REQ-INT-001`).
- [x] Página de prueba creada en [local/trayecta/index.php](file:///c:/Users/Mariana/Desktop/Trayecta/local/trayecta/index.php) que muestra el nombre del usuario, su rol en el curso y si está inscrito.
- [x] Verificación de los tres roles (**Estudiante**, **Docente**, **Administrador**) y rechazo de usuarios no inscritos mediante prueba PHPUnit ([session_role_resolver_test.php](file:///c:/Users/Mariana/Desktop/Trayecta/local/trayecta/tests/session_role_resolver_test.php)).
- [x] Credenciales de prueba documentadas para verificación funcional en el entorno de desarrollo.
- [x] Funciones nativas de Moodle documentadas en este entregable (`MT 2.3`).
