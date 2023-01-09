#!/bin/bash
set +e

echo "Building docker image"
docker build -t 192.168.88.151:32040/lib .
echo "Pushing docker image"
docker push 192.168.88.151:32040/lib:latest
echo "Done"