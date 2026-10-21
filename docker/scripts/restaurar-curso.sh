#!/bin/bash
# Restaura un respaldo .mbz de BACKUPS_DIR como curso nuevo en la categoría indicada.
# Uso (dentro de Ubuntu/WSL): docker/scripts/restaurar-curso.sh <archivo.mbz> [id_categoria]
set -euo pipefail
cd "$(dirname "$0")/.."

archivo=${1:?Indica el nombre del .mbz que está en BACKUPS_DIR}
categoria=${2:-1}

docker compose exec -T -u www-data -w /var/www/html moodle php admin/cli/restore_backup.php \
  --file="/backups/$archivo" --categoryid="$categoria"
