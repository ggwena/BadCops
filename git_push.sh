#!/bin/sh
echo git add -A
git add -A
[ -n "$1" ] && comment="-m \"$*\""
echo git commit -a "$comment"
git commit -a "$comment"
git push
