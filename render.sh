#!/bin/bash
shopt -s nullglob
files=sources/*
for f in $files
  do
    echo "Rendering file $f"
    asciidoctor -T _templates/post -D articles/ "$f"
  done
echo "Rendering Index"
asciidoctor -T _templates index.adoc