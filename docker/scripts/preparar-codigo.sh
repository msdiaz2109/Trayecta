#!/bin/bash
# Clona Moodle 5.1 en MOODLE_DIR e instala los plugins de plugins.txt.
# Uso (dentro de Ubuntu/WSL): docker/scripts/preparar-codigo.sh
set -euo pipefail
cd "$(dirname "$0")/.."
set -a; . ./.env; set +a

if [ ! -d "$MOODLE_DIR/.git" ]; then
  git clone --depth 1 --branch MOODLE_501_STABLE https://github.com/moodle/moodle.git "$MOODLE_DIR"
fi

tmp=$(mktemp -d)
trap 'rm -rf "$tmp"' EXIT
grep -vE '^\s*(#|$)' plugins.txt | while read -r ruta url; do
  destino="$MOODLE_DIR/public/$ruta"
  if [ -d "$destino" ]; then
    echo "Ya existe: public/$ruta"
    continue
  fi
  echo "Instalando public/$ruta"
  curl -fsSL -A "Mozilla/5.0" -o "$tmp/plugin.zip" "$url"
  rm -rf "$tmp/x" && mkdir "$tmp/x"
  python3 -m zipfile -e "$tmp/plugin.zip" "$tmp/x"
  mv "$tmp/x"/* "$destino"
done
