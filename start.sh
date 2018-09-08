#!/bin/bash

echo Levantando docker
docker-compose up -d

echo Copiando o arquivo .env
docker exec -it dropshipping-app cp .env.example .env

echo Instalando dependências
docker exec -it dropshipping-app composer install

echo Gerando o app key
docker exec -it dropshipping-app php artisan key:generate

echo Gerando migrations
docker exec -it dropshipping-app php artisan migrate

echo Gerando seeds
docker exec -it dropshipping-app php artisan db:seed

echo Informação dos containeres
docker ps -a