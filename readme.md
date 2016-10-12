Configurações

1 - Acessar o arquivo .env e alterar os dados de acesso ao BD:
	* DB_DATABASE= //NOME DO BD
	* DB_USERNAME= // USUÁRIO DO BD
 	* DB_PASSWORD= // SENHA

2 - Acessar a raiz do projeto e executar o seguinte comando:
 	*  php artisan migrate

3 - Para iniciar o servidor basta executar o comando na raiz do projeto:
    * php artisan serve

4 - Criar um usuário

5 - Fazer login com o mesmo

API

1 - Toda requisição deve enviar parametro extra na URL chamado api_token com o código da api disponibilizado para o usuário ao fazer login.
 Ex: http://localhost:8000/api/v1/pipas?api_token=beab52c7e7d98c42e10e0e58a0b48981