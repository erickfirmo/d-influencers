# d-influencers

Este repositório contém a implementação do projeto **d-influencers** com o uso de **Laradock** para facilitar o ambiente de desenvolvimento local.


O **Laravel** foi escolhido pelos seguintes motivos:

- **Desenvolvimento Rápido**
- **Comunidade Ativa**
- **Manutenção e Escalabilidade**
- **Segurança**
- **Facilidade de Testes**

## Instruções para rodar o ambiente localmente (Laradock)

Para rodar o ambiente localmente utilizando Laradock, siga as instruções abaixo:

### Pré-requisitos:
- Docker instalado na sua máquina.
- Docker Compose instalado na sua máquina.

### Clone o repositório
Clone o repositório para a sua máquina local:

    ```bash
    git clone https://github.com/erickfirmo/d-influencers.git
    cd d-influencers
    ```

### Suba o ambiente com Laradock

1. Navegue até a pasta `laradock` dentro do projeto:

    ```bash
    cd laradock
    ```

2. Copie o arquivo de configuração do ambiente:

    ```bash
    cp env-example .env
    ```

3. Construa e suba os containers com o Docker Compose:

    ```bash
    docker-compose up -d nginx mysql workspace
    ```

4. Se precisar acessar o container de workspace, use o comando:

    ```bash
    docker-compose exec workspace bash
    ```

## Configuração do Projeto

1. Copie o arquivo de configuração do ambiente:

    ```bash
    cp env-example .env
    ```

2. Gere a chave de aplicação do Laravel:

 ```bash
 php artisan key:generate
 ```

3. Configuração do banco de dados:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=nome_do_banco
    DB_USERNAME=root
    DB_PASSWORD=secret
    ```

Certifique-se de que o banco de dados foi criado no MySQL, ou crie-o manualmente.

4. Rodar as migrations
   
Após configurar o banco de dados, você precisará rodar as migrações do Laravel para criar as tabelas necessárias no banco de dados. Execute o comando:

    ```bash
    php artisan migrate --seed
    ```

Agora você pode acessar a aplicação Laravel diretamente em http://localhost


## Documentação dos Endpoints

A documentação completa dos endpoints da API pode ser acessada através do seguinte link: [Documentação da API](https://documenter.getpostman.com/view/39998257/2sAYBXBWPs).
