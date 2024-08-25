<p align="center">
 <img width=200px height=200px src="readmeImages/LogoIsaac.jpeg" alt="Prof. Isaac mendes">
</p>
<h2 align="center">Laravel para iniciantes</h2>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)](#)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](#)

</div>

---

<p align="center"> Este tutorial é perfeito para você começar! Vamos guiá-lo passo a passo na criação de um projeto do zero. Utilizaremos o <a href='https://herd.Laravel.com/windows'>Laravel Breeze</a> como pacote inicial e implementaremos uma gestão completa de usuários no Laravel 11.
    <br> 
</p>

> [!IMPORTANT]
> Para elaboração deste tutorial foi utilizado a documentação oficial do Laravel e como inspiração o curso de Laravel 11 da Especializa TI, que pode ser acessado pelo link: [Playlist Laravel  11 - Especializa TI](https://www.youtube.com/playlist?list=PLVSNL1PHDWvThyUgAgJoulpg5kB7GpYqS).

## 📝 Conteúdo

- [Entendendo o Laravel](#Laravel)
- [Configurando o Ambiente](#ambiente)
- [Laravel Breeze](#breeze)
- [Banco de Dados e Migrations](#migrations)
- [Model, View e Controller (MVC)](#mvc)
- [Rotas](#routes)
- [Construindo o CRUD de usuários](#crud)
- [Validação](#validacao)
- [Blade Template](#blade)
- [Middlewares](#middlewares)
- [Autorizações - ACL](#acl)

## 🧐 Entendendo o Laravel <a name = "Laravel"></a>

[Laravel](https://Laravel.com/) é um framework PHP que facilita o desenvolvimento web com uma sintaxe elegante e expressiva. Ele oferece recursos como roteamento simples, injeção de dependência, migrações de banco de dados, e o Eloquent ORM para interagir com bancos de dados de forma intuitiva. Além disso, possui ferramentas integradas para autenticação, autorização, filas de trabalho e eventos em tempo real. O ecossistema Laravel inclui o Laravel Breeze para autenticação básica, Laravel Forge para gerenciamento de servidores, e Laravel Vapor para implantação serverless. Com uma [documentação](https://Laravel.com/docs/11.x) extensa e uma comunidade ativa, Laravel é uma excelente escolha para desenvolvedores que buscam produtividade e flexibilidade.

> [!IMPORTANT] 
> O Laravel é famoso por sua [documentação](https://Laravel.com/docs/11.x), ela é bem completa e te prepara para todo o processo de desenvolvimento. Todo o curso é baseado na documentação oficial do Laravel, os links de cada parte será deixado para conferências e acompanhamento.

Há três ferramentas que podem ser destacadas no Laravel: Eloquente Model, Artisan e Migrations.

### [Eloquente Model](https://Laravel.com/docs/11.x/eloquent)
O Eloquent é o ORM (Object-Relational Mapper) do Laravel, que facilita a interação com bancos de dados. Cada tabela do banco de dados tem um modelo correspondente que permite realizar operações como inserção, atualização, exclusão e consulta de registros de forma intuitiva. O Eloquent utiliza uma sintaxe expressiva, tornando o código mais legível e fácil de manter. Por exemplo, o código abaixo salva um registro no banco de dados:

```php
$article = Article::create(['title' => 'Traveling to Europe']);
```
### [Artisan Console](https://Laravel.com/docs/11.x/artisan)
O Artisan é a interface de linha de comando do Laravel, que oferece diversos comandos úteis para agilizar o desenvolvimento. Com o Artisan, você pode criar modelos, controladores, migrações, entre outros. Ele também permite executar tarefas como limpar o cache, rodar testes e agendar comandos. Um exemplo de comando Artisan para criar um modelo e logo após como iniciar um servidor local diretamente pelo artisan:
```bash
php artisan make:model NomeDoModelo

php artisan serve
```

### [Migrations](https://Laravel.com/docs/11.x/migrations)
As migrations no Laravel funcionam como um controle de versão para o banco de dados, permitindo que você defina e compartilhe a estrutura do banco de dados da aplicação. Elas são especialmente úteis para equipes de desenvolvimento, pois garantem que todos estejam usando a mesma versão do esquema do banco de dados. Abaixo um exemplo de uma tabela criada utilizando migrations:
```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->timestamps();
});
```




## 🔧 Configurando o Ambiente<a name = "ambiente"></a>

> [!TIP] 
> Será ensinado como configurar o ambiente utilizando o [Laravel Herd](https://herd.Laravel.com/) no Windowns. Há diversas formas de instalar e configurar o Laravel, e podem ser vistas na [documentação](https://Laravel.com/docs/11.x/installation). Algumas delas são descritas abaixo:
<br/><br/> [Utilize Docker personalizado](https://github.com/especializati/setup-Docker-Laravel)
<br/> O pessoal da <i>EspecializaTI<i> tem um setup complet de Docker para o lavarel, é só seguir as dicas e configurar o seu ambiente utilizando Docker.
<br/><br/>[Utilize Laravel Sail](https://Laravel.com/docs/11.x/sail)
<br/> O Laravel Sail é o ambiente padrão e oficial para desenvolver Laravel utilizando Docker, pode ser seguido o passo a passo da documentação.
<br/><br/>[PHP Composer](https://Laravel.com/docs/11.x/installation#creating-a-Laravel-project)
<br/>Método mais básico, utliza o compose para baixar e instalar o Laravel na sua máquina, e pode ser criado um server local utlizando a prória ferramenta Artisand do Laravel.
<br/><br/> [Utilize o Laravel Herd](https://herd.Laravel.com/windows)
<br/> O Heard é um abiente próprio do Laravel e tem como objetivo padronizar o ambiente de desenvolvimento. É de fácil instalação e configuração.

<br/>

### Laravel Herd no Windows, utilizando Docker para persistir os dados

Para download do Herd, prossiga até o site https://herd.Laravel.com/windows e faça o download do arquivo. <br/>
A instalação é padrão como qualquer outro aplicativo, e você não deverá ter muitos problemas.

> [!CAUTION] 
> No Windows, antes de instalar o Herd, tenha certeza de que não possui o PHP, Node e Composer instalados no seu computador. O Herd instala estas ferramentas automaticamente e configuram as variáveis de ambiente corretamente, portanto, caso já tenha instalado, poderá haver um conflito de versões.

#### Criação de projetos no Herd
Após a instalação do Laravel Herd, ele irá abrir na tela inicial, como a figura abaixo. Nela podemos ver os serviços instalados e iniciados, e também podemos começar as configurações dos sites que o Herd gerencia, clicando na opção ***Open Sites***.<br/>
<img width=400px src="readmeImages/Herd.png" alt="Tela inicial do Laravel Herd">
<br/><br/>
Na tela de *Sites*, imagem abaixo, podemos ver todos os sites atualmente gerenciados pelo Herd a esquerda e algumas opções de gerenciamento a direita. Para a criação de novos sites, devemos clicar no botão ***+Add***.
<br/>
<img width=400px src="readmeImages/HerdSites.png" alt="Tela de sites">
<br/>

#### Criando sites no Herd
Para criar sites, é necessário selecionar se é um projeto novo ou existente:
<br/>
<img width=400px src="readmeImages/HerdNewSite.png" alt="Tela de criação de sites">
<br/><br/>
Depois selecionar se irá utilizar alguns dos kits prontos do Laravel, ***Para este tutorial iremos inicial sem nenhum starter kit***:
<br/>
<img width=400px src="readmeImages/HerdNewSite2.png" alt="Tela de criação de sites">
<br/><br/>
Digite o nome do projeto:
<br/>
<img width=400px src="readmeImages/HerdNewSite3.png" alt="Tela de criação de sites">
<br/><br/>
Aguarde a criação do projeto:
<br/>
<img width=400px src="readmeImages/HerdNewSite4.png" alt="Tela de criação de sites">
<br/><br/>
Após a finalização irá aparecer uma tela de sucesso:
<br/>
<img width=400px src="readmeImages/HerdNewSite5.png" alt="Tela de criação de sites">
<br/><br/>
E agora podemos ver e gerenciar o site pelo Herd:
<br/>
<img width=400px src="readmeImages/HerdNewSiteDone.png" alt="Tela de sites">
<br/><br/>
Se abrirmos a URL especificada na tela anterior, teremos acesso ao nosso site.
<br/>
<img width=400px src="readmeImages/HerdNewSite.png" alt="Site funcional">

#### Criando um servidor local do MySQL com Docker
Para a persistência de dados, iremos utilizar um servidor MySQL utilizando Docker. Para isso, disponibilizei neste projeto um [arquivo composer do Docker](docker-compose.yml), com uma configuração simples para a criação de um container MySQL e Adminer, para a gestão do banco de dados.
> [!NOTE]
> O MySQL foi configurado para a porta 3310 (com intuito de evitar conflitos com outras instalações). O usuário padrão é *root* e a senha é *123*. Para acessar o adminer utilize a porta [8082](http://localhost:8082/).

Para criar o container utilize o comando:
```bash
Docker compose up -d
```
Para configurar o acesso do Laravel ao banco de dados, devemos atualizar as informações no arquivo [.env](.env):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3310
DB_DATABASE=Laravel
DB_USERNAME=root
DB_PASSWORD=123
```

## 🔏 Laravel Breeze <a name = "breeze"></a>

```bash
composer require Laravel/breeze

php artisan breeze:install

php artisan breeze:install blade --dark --pest

php artisan migrate
```

<br/>
<img width=400px src="readmeImages/breezeOk.png" alt="Breeze instalado">

## 💽 Banco de Dados e Migrations <a name="usage"></a>

lorem ispum

## 📚 Model, View e Controller (MVC) <a name = "mvc"></a>

lorem ispum

## 🚅 Rotas <a name = "routes"></a>

lorem ispum

## ⛏️ Construindo o CRUD de usuários <a name = "crud"></a>

lorem ispum

## 👍 Validação <a name = "validacao"></a>

lorem ispum

## 📜 Blade Template <a name = "blade"></a>

lorem ispum

## 📲 Middlewares <a name = "middlewares"></a>

lorem ispum

## 📛 Autorizações - ACL <a name = "acl"></a>

lorem ispum

## ✍️ Autor

- [@isaacmmelo](https://github.com/isaacmmelo) - Professor Especialista Isaac Mendes de Melo

-- tinker -> criar registros automaticos
\App\Models\User::factory()->count(100)->create();  
-- user controller
-- index users
-- pagination
-- novo usuario
    -- erro token
-- editar usuario
-- mostrar usuário
-- deletar usuario
    -- delete lógico
php artisan make:migration AddSoftDeleteUsers
Schema::table('users', function (Blueprint $table) {
$table->SoftDeletes();
});
Schema::table('users', function (Blueprint $table) {
$table->dropColumn('SoftDeletes');
});
php artisan migrate
go to model and update

-- validações
-- template
