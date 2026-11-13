from datetime import datetime
import json
import sys
import requests

# =====================================================================
# CONFIGURACIÓN DE CONEXIÓN AL SERVIDOR MOODLE (Droplet ITM)
# =====================================================================
MOODLE_URL = "http://165.227.200.92:8080"
ADMIN_USER = "admin"
ADMIN_PASS = "Admin1234*"
COURSE_SHORTNAME = "ISC-LA-2026"
STUDENT_USERNAME = "estudiante_prueba"

MANUAL_TOKEN = "f6d2c15340eac805491fe7c6686a3f99"


def obtener_token():
    """Obtiene el token de los servicios web usando las credenciales del admin."""
    if MANUAL_TOKEN:
        return MANUAL_TOKEN

    url = f"{MOODLE_URL}/login/token.php"
    params = {
        "username": ADMIN_USER,
        "password": ADMIN_PASS,
        "service": "moodle_mobile_app",
    }
    try:
        response = requests.get(url, params=params, timeout=10)
        response.raise_for_status()
        data = response.json()
        if "token" in data:
            return data["token"]
        else:
            print(f"[ERROR] No se pudo obtener el token: {data}")
            sys.exit(1)
    except Exception as e:
        print(
            f"[ERROR DE CONEXIÓN] Verifica que {MOODLE_URL} sea accesible: {e}"
        )
        sys.exit(1)


def llamar_ws(token, wsfunction, params=None):
    """Realiza una petición POST al endpoint REST de Moodle y valida la respuesta."""
    endpoint = f"{MOODLE_URL}/webservice/rest/server.php"
    payload = {
        "wstoken": token,
        "wsfunction": wsfunction,
        "moodlewsrestformat": "json",
    }
    if params:
        payload.update(params)

    response = requests.post(endpoint, data=payload, timeout=15)
    response.raise_for_status()
    data = response.json()

    if isinstance(data, dict) and ("exception" in data or "errorcode" in data):
        raise RuntimeError(
            f"Error en Moodle WS ({wsfunction}): {data.get('message')} [{data.get('errorcode')}]"
        )

    return data


def ejecutar_pruebas():
    print("=" * 75)
    print(
        "  VERIFICACIÓN DE SERVICIOS WEB REST Y EXTRACCIÓN ETL - MOODLE (ITM)"
    )
    print("=" * 75)
    print(f"Servidor destino : {MOODLE_URL}")
    print(f"Fecha y hora     : {datetime.now().strftime('%Y-%m-%d %H:%M:%S')}\n")

    token = obtener_token()
    print(f"[OK] Autenticación exitosa. Token activo: {token[:10]}...\n")

    reporte = {
        "fecha_ejecucion": datetime.now().isoformat(),
        "servidor": MOODLE_URL,
        "curso_piloto": COURSE_SHORTNAME,
        "llamadas": [],
    }

    # -----------------------------------------------------------------
    # LLAMADA 1: Información general del sitio
    # -----------------------------------------------------------------
    print("1. Ejecutando llamada #1: [core_webservice_get_site_info]...")
    site_info = llamar_ws(token, "core_webservice_get_site_info")
    print("   -> [RESPUESTA OK]")
    print(f"      Sitio          : {site_info.get('sitename')}")
    print(f"      Versión Moodle : {site_info.get('release')}")
    print(
        f"      Usuario activo : {site_info.get('username')} (ID: {site_info.get('userid')})\n"
    )

    reporte["llamadas"].append(
        {
            "numero": 1,
            "funcion": "core_webservice_get_site_info",
            "estado": "EXITOSO",
            "resumen": {
                "sitename": site_info.get("sitename"),
                "release": site_info.get("release"),
                "userid": site_info.get("userid"),
            },
        }
    )

    # -----------------------------------------------------------------
    # LLAMADA 2: Buscar y verificar el curso piloto
    # -----------------------------------------------------------------
    print(
        f"2. Ejecutando llamada #2: [core_course_get_courses_by_field] (shortname='{COURSE_SHORTNAME}')..."
    )
    cursos_data = llamar_ws(
        token,
        "core_course_get_courses_by_field",
        {"field": "shortname", "value": COURSE_SHORTNAME},
    )
    cursos = cursos_data.get("courses", [])
    if not cursos:
        print(
            f"   -> [ERROR] No se encontró el curso con shortname '{COURSE_SHORTNAME}'."
        )
        sys.exit(1)

    curso = cursos[0]
    course_id = curso["id"]
    print("   -> [RESPUESTA OK]")
    print(f"      ID del Curso   : {course_id}")
    print(f"      Nombre         : {curso.get('fullname')}")
    print(f"      Formato        : {curso.get('format')}\n")

    reporte["llamadas"].append(
        {
            "numero": 2,
            "funcion": "core_course_get_courses_by_field",
            "estado": "EXITOSO",
            "resumen": {
                "course_id": course_id,
                "fullname": curso.get("fullname"),
                "shortname": curso.get("shortname"),
            },
        }
    )

    # -----------------------------------------------------------------
    # LLAMADA 3: Obtener usuarios inscritos y localizar al estudiante
    # -----------------------------------------------------------------
    print(
        f"3. Ejecutando llamada #3: [core_enrol_get_enrolled_users] (courseid={course_id})..."
    )
    usuarios_inscritos = llamar_ws(
        token, "core_enrol_get_enrolled_users", {"courseid": course_id}
    )
    print(
        f"   -> [RESPUESTA OK] Total de usuarios inscritos: {len(usuarios_inscritos)}"
    )

    student_id = None
    resumen_usuarios = []
    for u in usuarios_inscritos:
        roles = [r.get("shortname") for r in u.get("roles", [])]
        if u.get("username") == STUDENT_USERNAME:
            student_id = u.get("id")
        print(
            f"      - {u.get('fullname')} ({u.get('username')}) | ID: {u.get('id')} | Roles: {', '.join(roles)}"
        )
        resumen_usuarios.append(
            {
                "id": u.get("id"),
                "username": u.get("username"),
                "fullname": u.get("fullname"),
                "roles": roles,
            }
        )
    print()

    reporte["llamadas"].append(
        {
            "numero": 3,
            "funcion": "core_enrol_get_enrolled_users",
            "estado": "EXITOSO",
            "total_inscritos": len(usuarios_inscritos),
            "usuarios": resumen_usuarios,
        }
    )

    # -----------------------------------------------------------------
    # LLAMADA 4: Obtener la estructura y módulos del curso
    # -----------------------------------------------------------------
    print(
        f"4. Ejecutando llamada #4: [core_course_get_contents] (courseid={course_id})..."
    )
    secciones = llamar_ws(
        token, "core_course_get_contents", {"courseid": course_id}
    )
    print(
        f"   -> [RESPUESTA OK] Total de secciones recuperadas: {len(secciones)}"
    )

    resumen_secciones = []
    for sec in secciones:
        mods = [
            f"{m.get('modname')}: {m.get('name')}"
            for m in sec.get("modules", [])
        ]
        print(
            f"      - Sección {sec.get('section')}: {sec.get('name')} (Módulos: {len(mods)})"
        )
        for m_str in mods:
            print(f"          * {m_str}")
        resumen_secciones.append(
            {
                "section": sec.get("section"),
                "name": sec.get("name"),
                "modulos_count": len(mods),
                "modulos": mods,
            }
        )
    print()

    reporte["llamadas"].append(
        {
            "numero": 4,
            "funcion": "core_course_get_contents",
            "estado": "EXITOSO",
            "secciones": resumen_secciones,
        }
    )

    # -----------------------------------------------------------------
    # LLAMADA 5: PARETO #1 - Participación en Foros
    # -----------------------------------------------------------------
    print(
        "5. Ejecutando llamada #5 (Pareto - Foros): [mod_forum_get_forums_by_courses] + [mod_forum_get_forum_discussions]..."
    )
    foros = llamar_ws(
        token, "mod_forum_get_forums_by_courses", {"courseids[0]": course_id}
    )
    resumen_foros = []
    total_discusiones = 0

    for f in foros:
        f_id = f.get("id")
        f_name = f.get("name")
        disc_data = llamar_ws(
            token, "mod_forum_get_forum_discussions", {"forumid": f_id}
        )
        discusiones = disc_data.get("discussions", [])
        total_discusiones += len(discusiones)
        print(
            f"   -> [RESPUESTA OK] Foro: '{f_name}' | Hilos activos: {len(discusiones)}"
        )
        for d in discusiones:
            print(
                f"      - Hilo: '{d.get('name')}' | Autor: {d.get('userfullname')} | Réplicas: {d.get('numreplies')}"
            )
            resumen_foros.append(
                {
                    "foro": f_name,
                    "hilo": d.get("name"),
                    "autor": d.get("userfullname"),
                    "replicas": d.get("numreplies"),
                }
            )
    print()

    reporte["llamadas"].append(
        {
            "numero": 5,
            "funcion": (
                "mod_forum_get_forums_by_courses +"
                " mod_forum_get_forum_discussions"
            ),
            "variable_pareto": "Participación en foros",
            "estado": "EXITOSO",
            "total_hilos": total_discusiones,
            "detalle": resumen_foros,
        }
    )

    # -----------------------------------------------------------------
    # LLAMADA 6: PARETO #2 - Entregas a Tiempo vs. Tardías
    # -----------------------------------------------------------------
    print(
        "6. Ejecutando llamada #6 (Pareto - Entregas): [mod_assign_get_assignments] + [mod_assign_get_submissions]..."
    )
    assign_data = llamar_ws(
        token, "mod_assign_get_assignments", {"courseids[0]": course_id}
    )
    cursos_assign = assign_data.get("courses", [])
    tareas = cursos_assign[0].get("assignments", []) if cursos_assign else []

    print(f"   -> [RESPUESTA OK] Total de tareas configuradas: {len(tareas)}")
    resumen_entregas = []

    for idx, t in enumerate(tareas):
        t_id = t.get("id")
        t_name = t.get("name")
        duedate = t.get("duedate", 0)
        sub_data = llamar_ws(
            token, "mod_assign_get_submissions", {"assignmentids[0]": t_id}
        )
        assignments_sub = sub_data.get("assignments", [])
        subs = (
            assignments_sub[0].get("submissions", []) if assignments_sub else []
        )

        for s in subs:
            if s.get("userid") == student_id:
                timemodified = s.get("timemodified", 0)
                en_tiempo = (
                    (timemodified <= duedate) if duedate > 0 else True
                )
                estado_puntualidad = (
                    "A TIEMPO" if en_tiempo else "TARDÍA (CON RETRASO)"
                )
                fecha_entrega = datetime.fromtimestamp(timemodified).strftime(
                    "%Y-%m-%d %H:%M"
                )
                fecha_limite = datetime.fromtimestamp(duedate).strftime(
                    "%Y-%m-%d %H:%M"
                )
                print(
                    f"      - {t_name}\n        Estado: {s.get('status')} | Puntualidad: {estado_puntualidad} (Entregado: {fecha_entrega} vs Límite: {fecha_limite})"
                )
                resumen_entregas.append(
                    {
                        "tarea": t_name,
                        "status": s.get("status"),
                        "puntualidad": estado_puntualidad,
                        "fecha_entrega": fecha_entrega,
                        "fecha_limite": fecha_limite,
                    }
                )
    print()

    reporte["llamadas"].append(
        {
            "numero": 6,
            "funcion": "mod_assign_get_assignments + mod_assign_get_submissions",
            "variable_pareto": "Entregas a tiempo",
            "estado": "EXITOSO",
            "entregas": resumen_entregas,
        }
    )

    # -----------------------------------------------------------------
    # LLAMADA 7: PARETO #3 - Calificaciones Parciales (Gradebook)
    # -----------------------------------------------------------------
    print(
        f"7. Ejecutando llamada #7 (Pareto - Calificaciones): [gradereport_user_get_grade_items] (userid={student_id})..."
    )
    grades_data = llamar_ws(
        token,
        "gradereport_user_get_grade_items",
        {"courseid": course_id, "userid": student_id},
    )
    usergrades = grades_data.get("usergrades", [])
    gradeitems = usergrades[0].get("gradeitems", []) if usergrades else []

    print(
        f"   -> [RESPUESTA OK] Ítems de evaluación recuperados: {len(gradeitems)}"
    )
    resumen_calificaciones = []
    for g in gradeitems:
        nombre_item = (
            g.get("itemname")
            if g.get("itemname")
            else "PROMEDIO TOTAL DEL CURSO"
        )
        calificacion = g.get("graderaw")
        rango_max = g.get("grademax")
        print(f"      - {nombre_item}: {calificacion} / {rango_max}")
        resumen_calificaciones.append(
            {
                "item": nombre_item,
                "itemmodule": g.get("itemmodule"),
                "calificacion": calificacion,
                "maximo": rango_max,
            }
        )
    print()

    reporte["llamadas"].append(
        {
            "numero": 7,
            "funcion": "gradereport_user_get_grade_items",
            "variable_pareto": "Calificaciones parciales y final",
            "estado": "EXITOSO",
            "calificaciones": resumen_calificaciones,
        }
    )

    # -----------------------------------------------------------------
    # LLAMADA 8: PARETO #4 - Avance y Finalización de Actividades
    # -----------------------------------------------------------------
    print(
        f"8. Ejecutando llamada #8 (Pareto - Progreso): [core_completion_get_activities_completion_status]..."
    )
    comp_data = llamar_ws(
        token,
        "core_completion_get_activities_completion_status",
        {"courseid": course_id, "userid": student_id},
    )
    statuses = comp_data.get("statuses", [])
    completadas = sum(1 for st in statuses if st.get("state") == 1)
    porcentaje = (
        round((completadas / len(statuses)) * 100, 1) if statuses else 0.0
    )

    print(
        f"   -> [RESPUESTA OK] Progreso del alumno: {completadas}/{len(statuses)} actividades completadas ({porcentaje}%)"
    )
    for st in statuses:
        estado_str = (
            "COMPLETADA" if st.get("state") == 1 else "PENDIENTE"
        )
        print(
            f"      - Módulo [{st.get('modname')}] (CMID: {st.get('cmid')}): {estado_str}"
        )
    print()

    reporte["llamadas"].append(
        {
            "numero": 8,
            "funcion": "core_completion_get_activities_completion_status",
            "variable_pareto": "Frecuencia de avance / Finalización",
            "estado": "EXITOSO",
            "actividades_completadas": completadas,
            "total_actividades": len(statuses),
            "porcentaje_avance": porcentaje,
        }
    )

    # Guardar evidencia en archivo JSON para documentación
    archivo_salida = "resultado_pruebas_api.json"
    with open(archivo_salida, "w", encoding="utf-8") as f:
        json.dump(reporte, f, indent=4, ensure_ascii=False)

    print("=" * 75)
    print(
        "  CRITERIO DE ACEPTACIÓN SUPERADO: 8/8 LLAMADAS REST Y PARETO EXITOSAS"
    )
    print(f"  Evidencia guardada en: {archivo_salida}")
    print("=" * 75)


if __name__ == "__main__":
    ejecutar_pruebas()