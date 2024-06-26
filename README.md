## README - Projeto Biblioteca
Este é um projeto desenvolvido em Laravel para uma aplicação de biblioteca.

## Requisitos
Certifique-se de ter os seguintes requisitos instalados em seu sistema:

PHP >= 7.3
Composer
MySQL ou outro banco de dados suportado pelo Laravel


## Configuração:

Clone este repositório para o seu ambiente local:
git clone https://github.com/HenriqueoNovaes/biblioteca.git

# Navegue até o diretório do projeto:
cd biblioteca

# Instale as dependências do Composer:
composer install

# Crie um arquivo .env na raiz do projeto e configure-o com as suas credenciais de banco de dados. Você pode usar o arquivo .env.example como um ponto de partida:
cp .env.example .env

# Gere a chave de aplicativo Laravel:
php artisan key:generate

# Execute as migrações do banco de dados para criar as tabelas necessárias:
php artisan migrate

(Opcional) Se desejar, você pode preencher o banco de dados com dados de amostra usando os seeders:
php artisan db:seed

## Executando o projeto

Após concluir as etapas de configuração, você pode iniciar o servidor de desenvolvimento do Laravel com o comando:
php artisan serve

Acesse a aplicação em seu navegador visitando http://localhost:8000.

## Utilizando o Projeto

Clique em LOGIN na tela inicial.
Para se registrar, clique em Registrar um novo membro e preencha todos os dados corretamente.
Caso não tenha utilizado o Seeder, após acessar a plataforma, lembre-se de adicionar as informações nas seções de Gêneros, Livros e Usuários.


