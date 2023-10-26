#!/bin/bash

# Add lessc to the path.
PATH=/workspace/node_modules/.bin:$PATH
# Add node executable to the path since lessc cannot find it.
PATH=/layers/heroku_nodejs-engine/dist/bin:$PATH

for file in /workspace/pages/*/*.less
do
  lessc "$file" "${file/.less/.css}" --clean-css="--s0 --advanced"
done
