# Webservices Resful com Laravel

Sistema de exemplo para construção de uma api restful com Laravel. Usa JWT para autenticação na api.

### Pré-requisitos

- PHP Versão 7.1 + Servidor Web Nginx ou Apache

- Composer Gerenciador de Dependências para o PHP

- Banco de dados PostgreSQL V10. Mas se quiser usar o banco MySQL, basta trocar a variável de ambiente para
DB_CONNECTION=mysql no arquivo .env

- A aplicação foi construída usando o framework Laravel na versão 5.6. Portanto, possui todos os pré-requisitos desse
framework. Ademais, todos as outras bibliotecas de terceiros instaladas no sistema estão especificadas no arquivo
composer.json


## Instalação

1 - Clonar o projeto ou copiar para uma pasta no PC. Se necessário, altere as variáveis de ambiente no arquivo .env

2 - Criar um banco de dados no Postgres com o mesmo nome da variável de ambiente DB_DATABASE no arquivo .env

3 - Através da Linha de comando(cmd, poweshell, bash) entrar dentro da pasta raiz do projeto e executar o comando: 

php artisan migrate

Para criar as tabelas

3 - Ainda dentro da pasta raiz, executar o comando: 

php artisan db:seed

Para popular o banco de dados

## Usando o sistema

- **Autenticação na api** -> POST http://host_do_projeto/api/v1/auth com 2 form_params:

'email' => email_usuario
'password' => senha_usuario

Retorna Json com o parâmetro token que é JWT a ser usado em todas as requisições para identificar o cliente do 
webservice restful


- **Listar todos os produto** -> GET http://host_do_projeto/api/v1/products. O token do JWT pode ser enviado de 2 formas:

http://host_do_projeto/api/v1/products?token=jwt_gerado_no_login
OU
http://host_do_projeto/api/v1/products passando o header: "Authorization: Bearer jwt_gerado_no_login"


- **Exibir produto** -> GET http://host_do_projeto/api/v1/products/id_product. O token do JWT pode ser enviado de 2 formas:

http://host_do_projeto/api/v1/products/id_product?token=jwt_gerado_no_login
OU
http://host_do_projeto/api/v1/products/id_product passando o header: "Authorization: Bearer jwt_gerado_no_login"


- **Cadastrar produto** -> POST http://host_do_projeto/api/v1/products com 2 form_params:

'name' => nome_do_produto
'description' => descricao_do_produto

O token do JWT pode ser enviado de 2 formas:

http://host_do_projeto/api/v1/products?token=jwt_gerado_no_login
OU
http://host_do_projeto/api/v1/products passando o header: "Authorization: Bearer jwt_gerado_no_login"

Retorna o Json contendo os dados do produto cadastrado


- **Alterar produto** -> PUT http://host_do_projeto/api/v1/products/id_product com 2 form_params:

'name' => nome_do_produto
'description' => descricao_do_produto

O token do JWT pode ser enviado de 2 formas:

http://host_do_projeto/api/v1/products?token=jwt_gerado_no_login
OU
http://host_do_projeto/api/v1/products passando o header: "Authorization: Bearer jwt_gerado_no_login"

Retorna o Json contendo os dados do produto alterado


- **Excluir produto** -> DELETE http://host_do_projeto/api/v1/products/id_product

O token do JWT pode ser enviado de 2 formas:

http://host_do_projeto/api/v1/products?token=jwt_gerado_no_login
OU
http://host_do_projeto/api/v1/products passando o header: "Authorization: Bearer jwt_gerado_no_login"

Retorna true se ação for excluído ou false caso contrário.


## Desenvolvido com 

* [Laravel](https://laravel.com/) - Framework Web
* [Composer](https://getcomposer.org) - Gerenciador de dependências
* [Visual Studio Code](https://code.visualstudio.com/) - Editor de código
* [PostgreSQL](https://www.postgresql.org/) - Banco de dados

## Autor

* **Rander Carlos** - *Desenvolvedor PHP* (https://github.com/randercarlos)

## Licença

Esse projeto foi desenvolvido somente para fins de aprendizado e é licenciado pelo MIT.
