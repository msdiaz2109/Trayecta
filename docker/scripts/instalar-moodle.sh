#!/bin/bash
# Crea las tablas de Moodle y el usuario administrador (solo la primera vez).
# Uso (dentro de Ubuntu/WSL, con los contenedores arriba): docker/scripts/instalar-moodle.sh
set -euo pipefail
cd "$(dirname "$0")/.."
set -a; . ./.env; set +a

if docker compose exec -T moodle test -f /var/www/moodledata/.instalado; then
  echo "Moodle ya está instalado."
  exit 0
fi

docker compose exec -T moodle chown -R www-data:www-data /var/www/moodledata
docker compose exec -T -u www-data -w /var/www/html moodle php admin/cli/install_database.php \
  --agree-license --lang=en \
  --adminuser="$MOODLE_ADMIN_USER" --adminpass="$MOODLE_ADMIN_PASS" --adminemail="$MOODLE_ADMIN_EMAIL" \
  --fullname="Trayecta (desarrollo)" --shortname="Trayecta"
docker compose exec -T -u www-data moodle touch /var/www/moodledata/.instalado
