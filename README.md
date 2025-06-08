# 🦇 NecromanticaStore 🕯️

NecromanticaStore é uma aplicação web de e-commerce com tema gótico, desenvolvida com Laravel e PHP. A loja fictícia foi criada como projeto acadêmico com foco na experiência do usuário, design temático e funcionalidades completas de um sistema de vendas online.


## 🕰️ Sobre o Repositório

Este repositório contém todo o código-fonte da **NecromanticaStore**, incluindo front-end, back-end e estrutura de banco de dados. Ele é ideal para fins de aprendizado, prática com Laravel ou como ponto de partida para projetos similares de e-commerce.


## 🕸️ Sobre o Projeto

O objetivo do projeto é oferecer uma experiência de loja online com uma estética gótica, onde o usuário pode:

- Visualizar os produtos disponíveis.
- Adicionar produtos ao carrinho.
- Finalizar a compra via cartão de crédito (simulado).
- Criar conta e fazer login/logout.
- Navegar por páginas temáticas e estilizadas com um visual sombrio.


## 🧛 Descrição do Projeto

### Páginas e Funcionalidades:
- **Home**: Apresentação da loja, com informações sobre a NecromanticaStore e links para redes sociais.
- **Produtos**: Lista de produtos com imagem, descrição e botão de "Adicionar ao carrinho".
- **Carrinho**: Visualização dos itens, total da compra e opção de finalizar pedido.
- **Finalização de compra**: Formulário para simulação de pagamento com cartão de crédito.
- **Login e Registro**: Sistema de autenticação de usuários.
- **Dashboard (Admin)**: Gerenciamento dos produtos.



## ⚙️ Instruções de Instalação

> Requisitos:
- PHP 8.x
- Composer
- MySQL
- Laravel 10+
- XAMPP ou outro servidor local

1. **Clone o repositório:**
```bash
git clone https://github.com/guilhermebores/NecromanticaStore1.git


2. Acesse o diretório do projeto:
cd NecromanticaStore1

3. Instale as dependências do Laravel via Composer:
composer install

4. Crie o arquivo .env:
cp .env.example .env

5. Gere a chave da aplicação:
php artisan key:generate

6. Configure o banco de dados no arquivo .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

7. Rode as migrações para criar as tabelas:
php artisan migrate

▶️ Como Rodar o Projeto

1. Suba o servidor local:
php artisan serve

2. Acesse no navegador:
http://127.0.0.1:8000

🧩 Estrutura do Banco de Dados
As tabelas principais são:

users: armazena os dados dos usuários registrados.

products: armazena os produtos da loja (nome, descrição, preço, imagem).

cart_items: controla os itens adicionados ao carrinho pelo usuário.

As migrações se encontram em database/migrations.

🛠️ Tecnologias Utilizadas
PHP 8.x

Laravel 10+

Blade (Template Engine)

MySQL

HTML5 / CSS3

JavaScript

Bootstrap

🎩 Autor
Desenvolvido por Guilherme Berge
Repositório: github.com/guilhermebores/NecromanticaStore1

