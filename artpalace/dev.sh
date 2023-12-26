#!/bin/bash
# Bring down last stack run
docker-compose -f ./compose.yml down

docker-compose -f ./compose.yml up --build
