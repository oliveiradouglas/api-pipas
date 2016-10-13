Configurações

1 - Fazer o clone do projeto;

2 - É necessário ter o composer instalado na sua maquina e executar o seguinte comando na raiz do projeto:
   * composer install

3 - Na raiz do projeto execute os seguintes comandos:
   * mv .env.example .env
   * php artisan key:generate

4 - Acessar o arquivo .env e alterar os dados de acesso ao BD:
	* DB_DATABASE= //NOME DO BD
	* DB_USERNAME= // USUÁRIO DO BD
 	* DB_PASSWORD= // SENHA

5 - Acessar a raiz do projeto e executar o seguinte comando:
 	*  php artisan migrate

6 - Para iniciar o servidor basta executar o comando na raiz do projeto:
    * php artisan serve

7 - Criar um usuário

8 - Fazer login com o mesmo

API

1 - Toda requisição deve enviar parametro extra na URL chamado api_token com o código da api associado ao usuário ao se cadastrar.
 Ex: http://localhost:8000/api/v1/pipas?api_token=beab52c7e7d98c42e10e0e58a0b48981