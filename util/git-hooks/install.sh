#!/bin/bash
HOOKS="pre-commit"


BASE_DIR="$(cd "$(dirname "$0")" && pwd -P)"
GIT_HOOK_DIR="$BASE_DIR/../../.git/hooks"

if [[ ! -d "$GIT_HOOK_DIR" ]]; then
    echo "GIT_HOOK_DIR $GIT_HOOK_DIR does not exist. Ahem?"
    exit 11
fi

for hook in $HOOKS; do
    echo "Installing $hook"
    ln -sf "$BASE_DIR/$hook" "$GIT_HOOK_DIR/$hook"
done
