# Trayecta

Plugin local para **Moodle 5.1** (`local_trayecta`) de **perfilamiento multidimensional del estudiante y recomendación de rutas de aprendizaje personalizadas**, con evaluación de impacto académico mediante diseño cuasiexperimental.

Proyecto de titulación para la carrera de Ingeniería en Sistemas Computacionales en el Instituto Tecnológico de Morelia (ITM).

## Autores y Asesor

- **Autores:** Alfredo Aguilar Garnica, Mariana Sofía Meneses Díaz, Salvador Alejos Soria
- **Asesor:** DCE. Claudio Ernesto Florián Arenas

## Características principales

1. **Arquitectura nativa en Moodle:** Construido como plugin local (`local_trayecta`) en PHP 8.3 y PostgreSQL 16, integrado al núcleo de Moodle 5.1 sin servicios web externos ni LTI.
2. **Perfilamiento multidimensional en cuatro herramientas:**
   - **Herramienta 1:** *Index of Learning Styles* (ILS) de Felder-Silverman (44 reactivos dicotómicos, fase inicial).
   - **Herramienta 2:** Cuestionario de preferencias de formato (1 a 5) y disponibilidad semanal de estudio (horas/franjas, fase inicial).
   - **Herramienta 3:** Módulo psicométrico obligatorio para rasgos cognitivos/conductuales (fase inicial, indicado por el docente).
   - **Herramienta 4:** Examen diagnóstico de conocimientos previos por unidad temática, aplicado dentro de Moodle al comenzar cada nueva unidad con reactivos oficiales del profesor.
3. **Motor híbrido de recomendación:** Combina reglas pedagógicas y filtrado colaborativo, restringiendo el acceso condicional mediante la infraestructura nativa de grupos de Moodle.
4. **Diseño cuasiexperimental de evaluación:** División del grupo en cohorte experimental (rutas adaptadas) y cohorte de control (modelo uniforme estándar de Moodle), contrastando al final del semestre las calificaciones oficiales en exámenes (irrestrictos), retención y la escala SUS de usabilidad.

## Estructura de la documentación

```text
Trayecta/
├── docker/                                    # Entorno local: Moodle 5.1 + PHP 8.3 + PostgreSQL 16
├── docs/
│   ├── ERS.md                                 # Especificación de Requisitos de Software (v1.3)
│   ├── Protocolo de Investigación.md          # Protocolo de titulación (Banco de Proyectos), actualizado a la arquitectura de plugin
│   ├── Manual Tecnico.md                      # Manual técnico de arquitectura del plugin (v1.0)
│   ├── Plan de Pruebas.md                     # Plan de pruebas PHPUnit y cuasiexperimentales (v1.0)
│   ├── Backlog del producto.md                # Planificación de los 10 sprints
│   ├── Flujo de trabajo y control de versiones (GitHub).md # Convenciones de Git
│   ├── Protocolo_Bonito.docx                  # Carta compromiso original del Banco de Proyectos (formato oficial)
│   └── SPRINT_0/                              # Entregables metodológicos y de viabilidad
│       ├── Backlog Sprint 0.md
│       ├── PRM-1_tabla_reglas_ILS_formatos.md # Matriz estilos ILS vs. formatos
│       ├── PRM-2_Validación de los instrumentos que determinan el perfil.md # Fichas de las 4 herramientas
│       ├── PRM-3_Reglas para asignar etiquetas y crear ruta.md # Reglas de asignación y cohortes
│       ├── PRM-4 Definir el nombre del proyecto.md # Nombre "Trayecta"
│       ├── PRM-5_estudio_viabilidad.md        # Viabilidad técnica en Moodle
│       └── PRM-6_flujo_proceso.md             # Diagramas de secuencia y flujo por rol
├── LICENSE                                    # Licencia MIT
└── README.md
```

## Ramas y flujo de trabajo

- `main`: Código y versiones estables para producción.
- `develop`: Rama principal de integración continua. Toda nueva funcionalidad, prueba o documento se integra por Pull Request revisado.

## Licencia

Este proyecto está distribuido bajo la licencia [MIT](LICENSE).
