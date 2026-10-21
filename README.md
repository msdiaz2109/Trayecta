# Trayecta

Sistema integrado en **Moodle 5.1** para el perfilamiento multidimensional del estudiante y recomendación de rutas de aprendizaje personalizadas.

Proyecto de titulación para la carrera de Ingeniería en Sistemas Computacionales en el Instituto Tecnológico de Morelia (ITM).

## Autores y Asesor

- **Autores:** Alfredo Aguilar Garnica, Mariana Sofía Meneses Díaz
- **Asesor:** DCE. Claudio Ernesto Florián Arenas

## Estructura del repositorio

```text
Trayecta/
├── docker/                                    # Entorno de desarrollo: Moodle 5.1 + PostgreSQL 16 (ver docker/README.md)
├── docs/
│   ├── ERS.md                                 # Especificación de Requisitos de Software
│   ├── PRM-1_tabla_reglas_ILS_formatos.md     # Tabla de reglas ILS a formatos (REQ-REC-002)
│   └── PRM-5_estudio_viabilidad.md            # Estudio de viabilidad: Trayecta dentro de Moodle (REQ-INT-001, REQ-INT-005)
├── .gitignore
├── LICENSE                                    # Licencia MIT
└── README.md
```

## Ramas y flujo de trabajo

- `main`: Código y versiones estables para producción.
- `develop`: Rama principal de desarrollo activo. Las ramas de características e incidencias se desprenden e integran aquí.

## Licencia

Este proyecto está distribuido bajo la licencia [MIT](LICENSE).
