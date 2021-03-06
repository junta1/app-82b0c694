# Desafio AppMax

## Tecnologias utilizadas

- PHP 8.0
- Laravel 8.54
- MySql 5.7
- Adminer 4.8.1
- Docker 20.10.7
- Docker Compose 1.26.0

## Padrão de projeto

- Service Repository

Desta forma, mantenho o repositório responsável por acessar o banco de dados e tudo relacionado a ele, na camada de serviço, mantenho toda a regra de negócio, dessa forma, deixo distribuído e separado cada classe com sua devida responsabilidade.

## Baixando projeto

`git clone https://github.com/junta1/app-82b0c694.git`

## Levantar o Container

Acesse ao projeto (entre no diretório app-82b0c694) e lavante o container: 

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
situado em (app-82b0c694/api/.env.example) para .env no mesmo local ou executar o comando:

`cp .env.example  .env`

Defina a chave da aplicação:

`php artisan key:generate`

Gere as migrations com as seeds:

`php artisan migrate`

_obs: As vezes o container appmax-mysql cai e será preciso levanta-lo._

Para acessar a api do projeto pelo link: <http://localhost:47000/api/product/>
