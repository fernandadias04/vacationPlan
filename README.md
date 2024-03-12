
Installation

First, clone the project from git to your machine.

Afterwards, initialize Composer and its dependencies

``

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
``

Configuration

Copy the .env.example file to a new file named .env:

``

cp .env.example .env
`` 

Execution

In this project, we use Sail as a Docker operator.

Therefore, to bring up the project, you need to use the command:

``

./vendor/bin/sail up -d
`` 

Afterwards, run the migrations:


``
./vendor/bin/sail artisan migrate
``

And then, to make it easier, run the project seed. It is with this user that you will get the token to validate the api routes:

``
./vendor/bin/sail artisan db:seed
`

All internal routes require an Authorization. To get it, you need to use the "/login" route passing the user, password and device_name. Example:

``
{
  "email": "test@example.com",
  "password": "123456987",
  "device_name": "Insomnia"
}
`

When returning, add the token to the headers.

Example:
``
Authorization: Bearer 2|qM3Cr4zj1k2gJgcFYc5Gtl31qONM0xM4KjC2s8NTa149baf0
``

To simulate the routes I used Insomnia, but you can use the tool of your choice.

The routes used and their parameters are:

/login -> POST method. It expects to receive an email, password and device_name. Returns the authentication token.

/get/all -> GET method. Returns all registered vacation plans.

/create -> POST method. Creates a vacation plan. It expects to receive the following values: 'title', 'description', 'date' (in format YYYY/MM/DD), 'location', 'participants' (optional), in JSON request body.

/get-vacation/{id} -> GET method. Returns the vacation plan corresponding to the ID passed in the URL.

/update/{id} -> PATCH method. Updates the fields of the event using the ID as identifier. It can be one or all. It expects to receive one of the following values: 'title', 'description', 'date' (in format YYYY/MM/DD), 'location', 'participants' (optional), in JSON request body.

/delete/{id} -> DELETE method. Deletes the event from the database using the ID as identifier.

/get-pdf/{id} -> GET method. Downloads a PDF to the storage folder of the project passing the ID as event identifier.




#Instalação

Primeiro, clone o projeto do git para a sua maquina. 

Logo após, inicialize o composer e suas dependencias 

``
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
``

#Configuração

Copie o arquivo .env.example para um novo arquivo chamado .env:

``
cp .env.example .env
``

#Execução

Nesse projeto, utilizamos o sail como operador do Dcoker. 

Por isso para subir o projeto é necessário usar o comando: 

``
./vendor/bin/sail up -d
``

Logo após, as migrations: 

``
./vendor/bin/sail artisan migrate
``

E então, para facilitar rode a seed do projeto. É com esse usuário que você consiguirar o token para validar as rotas da api: 

``
./vendor/bin/sail artisan db:seed
``

Todas as rotas internas precisam de um Authorization. Para conseguir é necessário usar a rota "/login" passando o usuário, senha e device_name. 
Exemplo: 

``
{
	"email": "test@example.com",
	"password" : "123456987",
	"device_name" : "Insominia"
}
``

Ao retornar, adicione o token nos headers. 

Exemplo:

``
Authorization: Bearer 2|qM3Cr4zj1k2gJgcFYc5Gtl31qONM0xM4KjC2s8NTa149baf0
``

Para simular as rotas eu utilizei o Insominia, mas você poderá utilizar a ferramenta de sua preferência. 



As rotas utilizadas e seus parametros são:

'/login' -> Metodo POST. Espera receber um email, senha e device_name. Retorna o token de autenticação.

'/get/all' -> Metodo GET. Retorna todas os planos de ferias cadastrados.

'/create' -> Metodo POST. Cria um plano de férias. Espera receber os seguintes valores: 'title', 'description', 'date' (no formato YYYY/MM/DD), 'location', 'participants' (opcional), no body da requisão em JSON.

'/get-vacation/{id}' -> Metodo GET. Retorna o plano de férias referente ao ID passado pela url.

'/update/{id}' -> Metodo PATCH. Atualiza os campos do evento usando o ID como indentificador. Pode ser um ou todos. Espera receber um dos seguintes valores: 'title', 'description', 'date' (no formato YYYY/MM/DD), 'location', 'participants' (opcional), no body da requisão em JSON.

'/delete/{id}' -> Metodo DELETE. Deleta o evento do banco passando o ID como indentificador.

'/get-pdf/{id}' -> Metodo GET. Baixa um pdf para a pasta storage do projeto passando o ID como indentificador do evento.
