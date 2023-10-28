#!/bin/bash

# Add lessc to the path.
PATH=/workspace/node_modules/.bin:$PATH
# Add node executable to the path since lessc cannot find it.
PATH=/layers/heroku_nodejs-engine/dist/bin:$PATH

dirs=(/workspace/pages/*/*.less /workspace/variants/*/*.less)
for file in "${dirs[@]}"
do
  if test -f "$file"
  then
    echo "... Compiling $file"
    lessc "$file" "${file/.less/.css}" --clean-css="--s0 --advanced"
  fi
done
