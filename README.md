Primeiro, clone o projeto do git para a sua maquina. 

Copie o arquivo .env.example para um novo arquivo chamado .env:

cp .env.example .env


Nesse projeto, utilizamos o sail como operador do Dcoker. 

Por isso para subir o projeto é necessário usar o comando: 


"./vendor/bin/sail up -d"


Logo após, as migrations: 

"./vendor/bin/sail artisan migrate"

E então, para facilitar rode a seed do projeto. É com esse usuário que você consiguirar o token para validar as rotas da api: 

"./vendor/bin/sail artisan db:seed"

Todas as rotas internas precisam de um Authorization. Para conseguir é necessário usar a rota "/login" passando o usuário, senha e device_name. 
Exemplo: 

{
	"email": "test@example.com",
	"password" : "123456987",
	"device_name" : "Insominia"
}

Ao retornar, adicione o token nos headers. 

Authorization: Bearer 2|qM3Cr4zj1k2gJgcFYc5Gtl31qONM0xM4KjC2s8NTa149baf0

Para simular as rotas eu utilizei o Insominia, mas você poderá utilizar a ferramenta de sua preferência. 



As rotas utilizadas e seus parametros são:

'/login' -> Metodo POST. Espera receber um email, senha e device_name. Retorna o token de autenticação.

'/get/all' -> Metodo GET. Retorna todas os planos de ferias cadastrados.

'/create' -> Metodo POST. Cria um plano de férias. Espera receber os seguintes valores: 'title', 'description', 'date' (no formato YYYY/MM/DD), 'location', 'participants' (opcional), no body da requisão em JSON.

'/get-vacation/{id}' -> Metodo GET. Retorna o plano de férias referente ao ID passado pela url.

'/update/{id}' -> Metodo PATCH. Atualiza os campos do evento usando o ID como indentificador. Pode ser um ou todos. Espera receber um dos seguintes valores: 'title', 'description', 'date' (no formato YYYY/MM/DD), 'location', 'participants' (opcional), no body da requisão em JSON.

'/delete/{id}' -> Metodo DELETE. Deleta o evento do banco passando o ID como indentificador.

'/get-pdf/{id}' -> Metodo GET. Baixa um pdf para a pasta storage do projeto passando o ID como indentificador do evento.
