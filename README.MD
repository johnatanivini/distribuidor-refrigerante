# Requisitos

- PHP 7.+
- Mysql 8+
- Linux Ubuntu 16+ 

## Instalação do Sistema

O sistema está desenvolvido em Laravel 5.8, com banco de dados MYSQL 8+.
Para ver o projeto rodando, faça o clone deste projeto e salve em algum lugar do seu ambiente de trabalho.

Após fazer o clone, entre na pasta e execute a atualização dos pacotes dependentes do projeto:

`composer install ` ou `composer update`

## Permissões

Dê permissão nas pastas `storage` e `config/cache` para o sistema criar os seus arquivos

```
#! chmod 777 storage`
```

Após a instalação gere a secrete key para validar o sistema:

`php artisan key:generate`

## Banco de dados

O Banco de dados, no qual o projeto está setado é Mysql
Crie um banco com o nome `distribuidor_bebidas`

Salve o arquivo `.env.example` para `.env` e altere as credenciais para as do seu banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=distribuidor_bebidas
DB_USERNAME=<usuario_banco>
DB_PASSWORD=<senha_banco>

```

## Executando criação das tabelas

Para criar as tabelas responsáveis, entre na raiz do sistema, onde o mesmo foi clonado e execute:

`php artisan migrate`

Após criar as tabelas execute os seeds que irão inserir dados pré formatados:

`php artisan db:seed`

Este comando acima irá, criar um usuário padrão:

``
Usuario: admin
Senha: password
``

Seguindo os passos corretamente acima, poderá visualizar a tela inicial como mostra na demo abaixo:

Execute o comando, para iniciar um servidor local, caso ainda não tenha configurado um servidor web como Apache2 ou Nginx

`php artisan serve`

E acesse o ip mencionado no comando, geralmente é:

`localhost:8000`

##tests 
Uso do pacote phpunit/phpunit

Execução dos testes:

