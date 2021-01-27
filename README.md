# sysforce
Trabalho de Conclusão de Curso

-------------Para utilizar o Sysforce é necessário instalar:

- PHP (versão 7.1.3 OU 7.3);
- MySql;
- Composer;


-----------Guia de utilização:

 -No MySql crie um Database com o nome: sysforce.

Navegue por linha de comando até a pasta do projeto e rode o seguinte comando:
- composer update;

crie um arquivo como nome de .env e copiei os scripts do arquivo .env.example

altere as linhas 

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=sysforce
DB_USERNAME=COLOQUE SEU USUARIO MYSQL
DB_PASSWORD=COLOQUE SUA SENHA MYSQL

Execute os seguintes comandos por linha de comando:
- php artisan key:generate
- php artisan migrate --seed;
- php artisan serve.

abra o navegador no seguinte endereço:
http://127.0.0.1:8000/

Para utilizar o sistema o usuário padrão é:
login: admin@sysforce
senha: admin
