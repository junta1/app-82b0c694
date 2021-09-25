# Desafio AppMax

## Baixando projeto

`git clone https://github.com/junta1/app-82b0c694.git

## Levantar o Container

Acesse ao projeto (entre no diretório desafio-appmax) e lavante o container: 

`docker-compose up -d`

Verifique se todos os containers foram levantados executando:

`docker ps`

Estes containers devem estar em funcionamento:

`appmax-webserver`
`appmax-adminer`
`appmax-mysql`
`appmax-php-fpm`

Acesse ao container para prosseguir os demais passos: 

`docker exec -it appmax-php-fpm bash`

## Configurando projeto dentro do container

Depedências via composer:

`composer install`

Altere as permissões:

`chmod -R 777 storage/ bootstrap/`

Copiar e colar o arquivo .env.example 
situado em (desafio-appmax/api/.env.example) para .env no mesmo local ou executar o comando:

`cp .env.example  .env`

Defina a chave da aplicação:

`php artisan key:generate`

Gere as migrations com as seeds:

`php artisan migrate`

_obs: As vezes o container appmax-mysql cai e será preciso levanta-lo._

Para acessar a api do projeto pelo link: <http://localhost:47000/api/product/>
