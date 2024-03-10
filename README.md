As rotas utilizadas e seus parametros são:
'/get/all' -> Metodo GET. Retorna todas os planos de ferias cadastrados.
'/create' -> Metodo POST. Cria um plano de férias. Espera receber os seguintes valores: 'title', 'description', 'date' (no formato YYYY/MM/DD), 'location', 'participants' (opcional), no body da requisão em JSON.
'/get-vacation/{id}' -> Metodo GET. Retorna o plano de férias referente ao ID passado pela url.
'/update/{id}' -> Metodo PATCH. Atualiza os campos do evento usando o ID como indentificador. Pode ser um ou todos. Espera receber um dos seguintes valores: 'title', 'description', 'date' (no formato YYYY/MM/DD), 'location', 'participants' (opcional), no body da requisão em JSON.
'/delete/{id}' -> Metodo DELETE. Deleta o evento do banco passando o ID como indentificador.
'/get-pdf/{id}' -> Metodo GET. Baixa um pdf para a pasta storage do projeto passando o ID como indentificador do evento.
