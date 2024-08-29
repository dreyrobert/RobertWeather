# Robert Weather
Aplicativo que permite aos usuários consultar as condições climáticas em tempo real de qualquer município ao redor do mundo. Utilizando a API da WeatherStack, o aplicativo oferece uma interface amigável onde é possível também comparar as condições climáticas entre duas localidades diferentes, bem como revisitar as condições climáticas de municípios pesquisados anteriormente.

Neste projeto, utilizamos o Blade para renderizar as informações nas views. O Tailwind CSS foi empregado para estilizar os elementos do Front-End, facilitando a criação de uma interface moderna e responsiva.

No Back-End, implementamos um controller central, responsável por gerenciar as rotas principais do projeto, incluindo a conexão com a API externa e a manipulação dos dados no banco de dados.

A interface do usuário foi inicialmente projetada no [FIGMA](https://www.figma.com/design/s52ypYz5xxiNexnDVo7tRZ/Robert-Weather), a partir de um protótipo disponibilizado pela comunidade. Fiz adaptações no design para atender aos requisitos específicos do projeto.

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
git clone https://github.com/dreyrobert/RobertWeather.git
```

Isso criará a pasta com o código do projeto. Após isso, entre na pasta.

#### 2.1 PHP

Instale as dependências do PHP usando o comando abaixo:

```
composer install
```

#### 2.2 Node

Instale também as dependências do NodeJS executando:

```
npm install
```

#### 2.3 Laravel

Crie o arquivo `.env` a partir do arquivo `.env.example` gerado automaticamente pelo Laravel:

```
cp .env.example .env
```

Coloque seu código de acesso à API do Weather Stack em API_KEY no arquivo .env

Por fim execute o comando abaixo para a geração da chave de autenticação da aplicação:

```
php artisan key:generate
```

#### 2.4 Banco de Dados

O banco de dados é o PostgreSQL. Lembre de criar uma database para o projeto e a configurar no arquivo .env.

Criação das tabelas do banco de dados com as migrações esquemas:

```
php artisan migrate
```

#### Recursos Javascript e CSS

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