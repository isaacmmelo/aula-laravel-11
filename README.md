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
- [Banco de Dados e Migrations](#migrationsbd)
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
O Laravel Breeze é um pacote de autenticação para o framework Laravel. Ele oferece uma implementação simples e completa de funcionalidades de autenticação, como login, registro, redefinição de senha, verificação de e-mail e confirmação de senha.

Para instalar o Breeze primeiro é necessário instalar o composer e executar o seguinte comando, que irá baixar o breeze para seu composer local:
```bash
composer require Laravel/breeze
```
Depois é necessário executar o seguinte comando para instalar o breeze no seu projeto:

```bash
php artisan breeze:install blade --dark --pest
```
> [!NOTE]
> Este comando irá instalar o breeze com o blade, tema escuro e o pacote de testes. Caso queira com outras configurções, execute o comando sem os parâmetros após o :install

Após a instalção do breeze no seu projeto, iremos executar o seguinte comando para criar o banco de dados e as tabelas necessárias:

```bash
php artisan migrate
```

> [!NOTE]
> Tenha certeza que o banco de dados está inicializado e com as configurações no .env corretas, de acordo com o tópico anterior.

Após a execução das migrations, ao abrir o site, poderá ver que temos a opção de login e registro, o que significa que o Breeze está instalado corretadamente.
<br/>
<img width=400px src="readmeImages/breezeOk.png" alt="Breeze instalado">
<br/>
Agora você pode testar o Breeze e criar novos usuários.

## 💽 Banco de Dados e Migrations <a name="migrationsbd"></a>

As [migrations](https://laravel.com/docs/11.x/migrations) são uma parte fundamental do Laravel, e são responsáveis por definir e alterar o esquema do banco de dados. Com o comando `php artisan migrate` podemos criar o banco de dados e as tabelas necessárias para o nosso projeto.

As migrations são arquivos PHP que contém as instruções para criar e alterar o banco de dados. Eles estão localizados na pasta [database/migrations](database/migrations) do nosso projeto. Quando executamos o comando de migrate, o Laravel irá ler todos os arquivos de migrations e executá-los na ordem em que estão armazenados.

Cada arquivo de migrations possui uma data e hora de criação, e eles são armazenados no banco de dados na tabela `migrations`. Com isso, o Laravel pode controlar quais arquivos de migrations já foram executados e quais ainda não foram.

Com as migrations, podemos criar e alterar o banco de dados de forma controlada, e compartilhar o esquema do banco de dados com a equipe de desenvolvimento, sem preocupações de diferenças nos ambientes.

Podemos ver alguns comandos do artisan reslocinados a migration ao digitar `php artisan list` e ir na seação do comando migrate:

```
 migrate
  migrate:fresh             Deleta todas as tabelas e cria novamente
  migrate:install           Cria o repositorio de migrations
  migrate:refresh           Reseta e roda todas as migrations novamente
  migrate:reset             Faz um rollback e roda novamente todas as migrations
  migrate:rollback          Volta a última migration executada
  migrate:status            Mosta o status de cada migration
```

### Criando tabelas com Migrate
Para [criar tabelas(https://laravel.com/docs/11.x/migrations#creating-tables)] no Laravel, primeiro precisamos criar uma nova migrate. Para isso, basta digitar o comando:
```bash
php artisan make:migration create_articles_table
```
Após isso, uma migrate será criada na pasta [database/migrations](database/migrations) do nosso projeto. Abrindo o arquivo podemos ver a estrutura de uma migrate, com duas funções:

#### Função UP
Esta função será executada todas as vezes que utilizarmos o comando ´php artisan:migrate´ e ela irá criar a tabela no banco de dados.

Nesta função, podemos adicionar os campos da tabela, como por exemplo o assunto, texto, etc.

Para ver todos os tipos de campos para colunas, acesse o link: [Tipos de Colunas](https://laravel.com/docs/11.x/migrations#available-column-types)

Podemos também adicionar modificadores de colunas, como o unique e nullable. Para ver todos os tipos de modificadores acesso o link: [Modificadores de Colunas](https://laravel.com/docs/11.x/migrations#modifying-columns)

E para criar [chaves estrateiras](https://laravel.com/docs/11.x/migrations#foreign-key-constraints), utilizamos o próprio migration, como por exemplo o id de usuário presente no código abaixo.
```php
public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            #Aqui podemos adicionar os campos da tabela, como por exemplo o assunto, texto, etc.
            $table->id();
            $table->timestamps();
            $table->string('título',100)->index()->unique();
            #Utilizamos $table->tipo do campo, logo apos o nome, tamanho e após isso as especificações do campo.
            $table->text('texto',1000)->nullable();
            $table->integer('autor')->index()->nullable();
            #Podemos também definir o relacionamento com a tabela de usuários
            $table->foreign('autor')->references('id')->on('users')->onDelete('set null');
        });
    }
```

### Função Down
Esta função será executada quando o comando ´php artisan migrate:rollback´ for executado. Ela irá apagar a tabela no banco de dados.
```php
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
```

### Atualizando tabelas com Migrate
Para [atualizar tabelas](https://laravel.com/docs/11.x/migrations#updating-tables, podemos criar uma nova migrate e alterar uma tabela existente.
```bash
php artisan make:migration update_articles_table
```
Nela, basta adicionarmos o que queremos alterar na tabela.
```php
public function up(): void {
    Schema::table('articles', function (Blueprint $table) {
        $table->string('tags')->nullable();
        $table->softDeletes();
    });
}
```
Não podemos esquecer da função de down para deletar a tabela em um rollback:
```php
public function down(): void {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('tags');
            $table->dropSoftDeletes();
        });
    }
```
> [!NOTE]
> Para o soft delete funcionar, deve também adicionar a configuração de soft delete no modelo, como abordaremos logo abaixo.

Após finalizar a criação das migrations, podemos executar o comando ´php artisan migrate´ para executar as migrations e criar as novas tabelas no banco de dados.
<br/>
<img width=400px src="readmeImages/migrationsOkArticles.png" alt="Migrations executadas">
<br/>
Se tudo foi feito corretamente a tabela de Articles irá aparecer no seu banco de dados.

### Seeders e Factory

Os [seeders](https://laravel.com/docs/11.x/seeding) são utilizados para popular o banco de dados com dados de teste ou dados de exemplo. Eles são arquivos PHP que contém uma classe com o método `run()`, onde é definido o que deve ser populado no banco de dados. Como exemplo temos o arquivo [DatabaseSeeder](database/seeders/DatabaseSeeder.php).  Os seeders são executados com o comando `php artisan db:seed`. Ele irá executar todos os seeders que estiverem na pasta [database/seeders](database/seeders) do projeto.

As [factories](https://laravel.com/docs/11.x/eloquent-factories#main-content) são utilizadas para criar modelos de forma mais rápida. Elas são definidas em arquivos PHP na pasta [database/factories](database/factories) do projeto. Elas são utilizadas pelo comando `factory()` do Laravel, que permite criar modelos de forma mais rápida e eficiente.

Abrindo o arquivo de [UserFactory](database/factories/UserFactory.php), podemos ver as configurações definidas para o factory criar os dados de forma automática.

Exemplo de uso de um factory para criar 1000 usuários de uma vez:

```bash
php artisan thinker #Este comando irá entrar no utilitário Thinker do laravel
\App\Models\User::factory()->count(100)->create(); #Após isso execute o comando para criar os 1000 usuários utilizando factory
```
Após rodar o comando a tabela deve ser populada com os registros
<br/>
<img width=400px src="readmeImages/factory1000Ok.png" alt="Migrations executadas">
<br/>

## 📚 Model, View e Controller (MVC) <a name = "mvc"></a>


MVC é um padrão arquitetural que separa uma aplicação em três camadas: Model, View e Controller.

- Model: É a camada responsável por tratar os dados da aplicação. Ela é responsável por manipular os dados, como adicionar, atualizar, excluir e recuperar dados do banco de dados. No Laravel, os models são criados em [app/Models](app/Models). No projeto o model [User](app/Models/User.php) é um exemplo de um model.

- View: É a camada responsável por tratar a interface do usuário. Ela é responsável por exibir os dados na tela. No Laravel, as views são criadas em [resources/views](resources/views).

- Controller: É a camada responsável por controlar a lógica da aplicação. Ela é responsável por receber as requisições do usuário, manipular os dados e passar os dados para a view. No Laravel, os controllers são criados em [app/Http/Controllers](app/Http/Controllers). O controller [UserController](app/Http/Controllers/UserController.php) é um exemplo de um controller.

### Criando e configurando modelos

Para [criar modelos](https://laravel.com/docs/11.x/eloquent#generating-model-classes), basta utilizarmos o comando `php artisan make:model NomeDoModelo`.

````bash
php artisan make:model Article
````
Com este comando criamos o modelo de [Artigos](app/Models/Article.php);

> [!TIP]
> Durante a criação dos modelos, podemos passar outros parâmetros para que o laravel crie automaticamente outros arquivos relacionados ao mesmo modelo, por exemplo:
> ´php artisan make:model Article -mcf´
> Este comando criará o Model, Migration, Controle e factory

```php
class Article extends Model
{
    use HasFactory, SoftDeletes; # Adicionamos o SoftDeletes para que o laravel utilize a exclusão lógica automaticamente

    # Definimos as colunas que serão preenchidas automaticamente pelo Laravel durante o cadastro
    protected $fillable = ['título', 'texto', 'autor'];

}
```
Adicionando o *SoftDeletes* e os campos *fillable*, o nosso model está pronto para ser usado. 

Após isso, o Eloquent do laravel consegue fazer todas as operações do banco de dados automaticamente.

> [!NOTE]
> Para o soft delete funcionar, deve também adicionar o campo ***$table->SoftDeletes()*** na migration referente ao modelo.

### Criando e configurando controles

Para [criar controles](https://laravel.com/docs/11.x/controllers#creating-controllers), basta utilizarmos o comando `php artisan make:controller NomeDoController`.

````bash
php artisan make:controller Admin/ArticleController
````

Com este comando criamos o controller de [Artigos](app/Http/Controllers/Admin/ArticleController.php);
````php
class ArticleController extends Controller
{
    # Implementa função que retorna a View Index
    public function index() {

    }

    # Implementa função que retorna a View Create
    public function create() {

    }

    # Implementa função que salva os dados
    public function store(Request $request) {

    }
}
````
A implementação das funções acimas será feita no tópico [Construindo o CRUD de usuários](#crud).

### Criando e configurando views

Por fim, para [criar views](https://laravel.com/docs/11.x/views#creating-views), basta utilizarmos o comando `php artisan make:view NomeDaView`, a view será criada em [resources/views](resources/views).

Por padrão, em um CRUD simples utilizamos 04 views:
````bash
php artisan make:View admin/articles/index
php artisan make:View admin/articles/show
php artisan make:View admin/articles/edit
php artisan make:View admin/articles/create
````
A implementação das views será feita no tópico [Construindo o CRUD de usuários](#crud).

## 🚅 Rotas <a name = "routes"></a>

No Laravel, as [rotas](https://laravel.com/docs/11.x/routing) são responsáveis por direcionar as solicitações HTTP para as ações apropriadas dentro da aplicação. Elas estabelecem a conexão entre URLs específicas e os controladores que processam essas solicitações.

As rotas são implementadas em [routes/web.php](routes/web.php).

Para criar uma rota, passamos `ROUTE::método(rota, função)->nome`, por exemplo:
````php
# Cria uma rota chamada saudação, que retorna a frase Hello World
Route::get('/saudacao', function () {
    return 'Hello World';
});
````
<br/>
<img width=400px src="readmeImages/HelloWorld.png" alt="Route Hello World">
<br/>

Podemos também chamar um controlle dentro de uma rota, o que é a abordagem mais comum:

````php
Route::get('/saudacao', [ArticleController::class, 'index'])->name('saudacao');
````
No [controller](app/Http/Controllers/Admin/ArticleController.ph) implementamos o retorno da rota:

````php
public function index() {
    return 'Hello World';
}
````
<br/>
<img width=400px src="readmeImages/HelloWorld2.png" alt="Route Hello World Controller">
<br/>

Uma outra opção é retornar uma view, implementamos no [controller](app/Http/Controllers/Admin/ArticleController.php): 

````php
public function index() {
    return view('admin.articles.index');
}
````
E na [view](resources/views/admin/articles/index.blade.php), implementamos o que deseamos mostrar para o usuário:

````html
<div>
    <h1 class="text-3xl">Retorno da view pelo controller</h1>
</div>
````
<br/>
<img width=400px src="readmeImages/HelloWorld3.png" alt="Retorno da view pelo controller">
<br/>

## ⛏️ Construindo o CRUD de usuários <a name = "crud"></a>

CRUD (Create, Read, Update, Delete) é um conjunto de operações básicas de gerenciamento de dados. São elas:

- **Create (Criar)**: é a operação de inserção de novos registros no banco de dados.
- **Read (Ler)**: é a operação de visualização dos dados existentes no banco de dados.
- **Update (Atualizar)**: é a operação de alteração dos dados existentes no banco de dados.
- **Delete (Excluir)**: é a operação de remoção de dados existentes no banco de dados.

No nosso caso, para criar o CRUD de usuários, implementaremos todas essas operações, que são:

- **Create (Criar)**: é a operação de inserção de novos usuários no banco de dados.
- **Read (Ler)**: é a operação de visualização dos usuários existentes no banco de dados.
- **Update (Atualizar)**: é a operação de alteração dos dados dos usuários existentes no banco de dados.
- **Delete (Excluir)**: é a operação de remoção de usuários existentes no banco de dados.

Para cada operação, implementaremos uma rota, um controlador e uma view.

Começando, criaremos o controller de usuário:

````bash
php artisan make:Controller Admin/UserController
````

### Listando usuários

Para listagem dos usuários, começaremos com a implementação da rota, no arquivo [web.php](routes/web.php):

````php
# Criamos uma rota com método GET e que retorna o método index da classe UserController
Route::get('/users', [UserController::class, 'index'])->name('users');
````
Implementamos o método ***index*** no [Controle de Usuários](app/Http/Controllers/Admin/UserController.php):

````php
    public function index(){
        # Pesquisa no banco de dados todos os usuários cadastrados
        $users = User::all();
        
        #Retorna uma view, com a variável com os dados dentro de um vetor utilizando o compact
        return view('admin.users.index', compact('users'));
    }
````
Agora criamos a [view de index](resources/views/admin/users/index.blade.php) para mostrar os usuários os dados selecionados do banco de dados:

No controller retornamos para a view a variável users, que contém os dados do banco de dados, assim podemos usar ela para mostrar os dados na view.

````html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
</head>

<body>
    <h1>Usuários</h1>

    <table>
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <!-- Loop para mostrar os dados dos usuários utilizado forelse, caso não tenha dados, mostra uma mensagem -->
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="#">#</a>
                </td>
            @empty
                <tr>
                    <td colspan="100">Nenhum registro encontrado</td>
                </tr>
        @endforelse
        </tbody>
    </table>

</body>

</html>
````
Com isso temos a listagem de usuários, basta acessarmos a rota /users.

<br/>
<img width=400px src="readmeImages/listaUsers.png" alt="lista usuários">
<br/>

Mas temos um problema, cadastramos 1.000 usuários utilizando factory, isso é um problema no carregamento, devemos fazer uma paginação. Para quem trabalho com PHP puro, sabe o quão complicaod é fazer, mas no laravel, isso é bem simples, vejamos:

### Paginação de resultados

Para a paginação, precisamos alterar o método de coleta de dados no [Controle de Usuários](app/Http/Controllers/Admin/UserController.php):

Atualmente temos:
````php
    $users = User::all();
````
Trocamos por:
````php
    #O laravel já trabalha a paginação automaticamente, nesse caso cada página terá 20 registros
    $users = User::paginate(20);
````
E acrescentamos os links de paginação na nossa [view de index](resources/views/admin/users/index.blade.php), logo após a tabela que mostra os dados:

````html
</table>

{{ $users->links() }}

</body>
````
Assim, temos:

<br/>
<img width=400px src="readmeImages/listaUsersPaginado.png" alt="Lista usuários paginados">
<br/>

### Adicionando usuários

Para adicionar novos usuários, iremos precisar de duas novas [rotas](app/Http/routes.php):

````php
# A primeira rota é acessada através da URL /users/create e chama o método create da classe UserController, ela irá mostrar o formulário de adição
Route::get('users/create', [UserController::class, 'create'])->name('user.create');
# A segunda rota é do tipo post e recebe a requisição POST do formulário e chama o método store da classe UserController para salvar os usuários
Route::post('users', [UserController::class, 'store'])->name('user.store');
````
Após criar as rotas, devemos criar o formulário, iremos utilizar a view de [adicionar usuário](resources/views/admin/users/create.blade.php):

````html
<h1>Adicionar Usuário</h1>
<!-- Para chamarmos rotas cadastradas, utilizamos o helper route() e colocamos o nome da rota, definido no arquivo web.php -->
<form action="{{ route('user.store') }}" method="post">

    <!-- O comando @csrf faz com que o formulário seja protegido, criando um token de segurança para envio do formulário -->
    @csrf
    <input type="text" name="name" id="" placeholder="Nome">
    <input type="text" name="email" id="" placeholder="E-mail">
    <input type="password" name="password" id="" placeholder="Senha">

    <button type="submit">Enviar</button>

</form>
````

E também adicionar um link para dicionar novo usuário no [index](resources/views/admin/users/index.blade.php) de usuários:

````html
<a href="{{ route('user.create') }}">Adicionar Usuário</a>
````



### Atualizando usuários

### Exibindo detalhes e deletando usuário


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


> [!NOTE]
> Useful information that users should know, even when skimming content.

> [!TIP]
> Helpful advice for doing things better or more easily.

> [!IMPORTANT]
> Key information users need to know to achieve their goal.

> [!WARNING]
> Urgent info that needs immediate user attention to avoid problems.

> [!CAUTION]
> Advises about risks or negative outcomes of certain actions.
