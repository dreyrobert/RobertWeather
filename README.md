# Robert Weather
Aplicativo que permite aos usuários consultar as condições climáticas em tempo real de qualquer município ao redor do mundo. Utilizando a API da WeatherStack, o aplicativo oferece uma interface amigável onde é possível também comparar as condições climáticas entre duas localidades diferentes, bem como revisitar as condições climáticas de municípios pesquisados anteriormente.

## 🚀 Começando

### 1. Dependências

Para executar o projeto, você precisa ter o seguinte instalado:

- [Git](https://git-scm.com);
- [PHP](https://www.php.net/downloads);
- [Composer](https://getcomposer.org/download/);
- [NPM](https://www.npmjs.com/package/npm);

### 2. Configuração

Feito a instalação das dependências, é necessário obter uma cópia do projeto. A forma recomendada é clonar o repositório para a sua máquina.

Para isso, rode:

```
git clone https://github.com/dreyrobert/RobertWeather.git && RobertWeather
```

Isso criará e trocará para a pasta com o código do projeto.

#### 2.1 PHP

Instale as dependências do PHP usando o comando abaixo:

```
composer install
```

#### 2.2 Banco de Dados

O banco de dados é o PostgreSQL. Para criar uma base usando esse SGBD, rode:

```
touch database/database.sqlite
```

#### 2.3 Node

Instale também as dependências do NodeJS executando:

```
npm install
```

#### 2.4 Laravel

Crie o arquivo `.env` a partir do arquivo `.env.example` gerado automaticamente pelo Laravel:

```
cp .env.example .env
```

Coloque seu código de acesso à API do Weather Stack em API_URL no arquivo .env

Criação as tabelas do banco de dados com as migrações esquemas:

```
php artisan migrate
```

Por fim execute o comando abaixo para a geração da chave de autenticação da aplicação:

```
php artisan key:generate
```

Gere os recursos JavaScript e CSS:

```
npm run dev
```

### 3. Utilizacão

#### 3.1 Rodando o projeto

Depois de seguir todos os passos de instalação, inicie o servidor do Laravel:

```
php artisan serve
```
Após isso a aplicação estará rodando na porta 8000 e poderá ser acessada em [localhost:8000](http://localhost:8000).