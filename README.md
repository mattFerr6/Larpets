# Larpets
## Introdução

O Larpets é uma plataforma que conecta tutores de animais de estimação a petsitters, facilitando o cuidado de animais de estimação quando os tutores não estão disponíveis.

## Instalação

Para começar a contribuir com a aplicação será necessário ter PHP e MySQL/MariaDB instalados. 
Com isso em mente, siga estas etapas:

1. Clone este repositório:

    ```bash
    git clone https://github.com/mattFerr6/Larpets.git
    ```

2. Execute o arquivo sql/setup.sql no SGBD de sua escolha:

    ```mysql
    -- insira isso linha de comando do mysql:
    source sql/setup.sql;
    ```

3. Navegue até o diretório do projeto e troque as credenciais em php/conexao_db.php:

    ```php
     $servername = "localhost"; // Insira suas credenciais aqui
     $username = "root";
     $password = "123";
     $database = "larpets";
    ```
5. Execute a aplicação:

    ```bash
    php -S localhost:1111
    ```

Nesse exemplo, aplicação estará disponível em http://localhost:1111.

## Uso

### Cadastro de Tutores e Petsitters

1. Acesse a aplicação pelo navegador.

2. Crie uma conta como tutor ou petsitter.

### Busca e Reserva

1. [...]

2. [...]

3. [...]

## Considerações gerais

Durante o desenvolvimento do projeto, a equipe enfrentou desafios em relação à implementação, mesmo buscando outras maneiras para realização total da implementação, tal como trocar de aplicação mobile para web, foi possível apenas realizar as funcionalidades de login e cadastro, dadas as restrições de tempo e conhecimento.
O código disponível no GitHub reflete o esforço dos membros da equipe, visando valorizar os feedback para orientar projetos futuros e melhorar nosso trabalho.
