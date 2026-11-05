#!/usr/bin/env bash
# Serve the static demo on :8020 (project ports: 8020-8029).
set -euo pipefail
cd "$(dirname "$0")/demo-static"
exec python3 -m http.server 8020
