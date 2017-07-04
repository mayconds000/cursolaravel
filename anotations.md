# Laravel 
course of udemy
Teatcher Edwin Diaz

## MVC
- Model - Deals with database
- View - Deals with the HTML
- Controller - The middle-man

## Criando um projeto laravel pela linha de comando
depois no terminal basta digitar
`php composer.phar create-project --prefer-dist laravel/laravel project1 5.2.29`

## criar um virtualo host 
Comandos para abilitar modulos no apache
`sudo a2enmod {module}`

Comando para desabilitar modulos no apache
`sudo a2dismod {module}` 

Comando para abilitar sites no apache
`sudo a2ensite {nameofyoursite.conf}`

Comando para desabilitar sites no apache

`sudo a2dissite {nameofyoursite.conf}`

### permitindo acesso a pasta
com o código abaixo consigo ter acesso ao pasta antes estava dando erro 403 forbiden access
```
<Directory "path/to/folder"> 
  Options Indexes FollowSymLinks
  AllowOverride All
  Require all granted
</Directory>
```

## ROUTES
routes live in Http folder

## Params
```php
// Passando um parametro para url
Route::get('/post/{id}', function($id) {
  return "This is post number ". $id;
});

// Passando Multiplos parametros para url
Route::get('/post/{id}/{$name}', function($id, $name) {
  return "This is post number ". $id . " - " . $name;
})

// Nomeando uma rota como admin.home
Route::get('/admin/posts/example',array('as' =>'admin.home' ,function () {
    $url = route('admin.home');
    return "this url is ". $url;
    // print "this url is http://cms.dev/admin/posts/example"
}));

```

Para verificar todas as rotas com o artisan basta no terminal dentro da pasta do projeto rodar o seguinte comando `php artisan route:list`

## CONTROLLERS
## Namespaces
Are a way of encapsulating items. For example, in any operating system directories serve to group related fiels, and act as a namespace for the files within them.

in the PHP World, namespaces solve two problems.

1. Name collisions between code you create, and internal PHP classes/functions/constants or third-party classes/functions/constants.
2. Ability to Alias(or shorten) Extra_Long_Names designed to alleviate the first problem, improving readability of source code.

### Create controller in artisan
`php artisan make:controller NameOfController`

Podemos criar um controller para fazer um crud para isso temos que utilizar o **resource**
`php artisan make:controller --resource NameOfController`

### How utilize the controller
```php
/**
* Estou dizendo que sempre que chamar um get na url '/post'
* eu vou utilizar o PostsController no método index
**/
 Route::get('/post', 'PostsController@index');
```

### Passing datas to controller
```php
/**
* Etou pegando o id na url
**/
 Route::get('/post/{$id}', 'PostsController@index');


 //Controller
 /*
 Aqui é o método dentro do controller que recebe um parametro com o mesmo nome da variavel que vai na url
 */
  public function index($id)
    {
        return "its working and the number is ". $id;
    }
```

### Resources
Mapping all urls to routes and your methods respectivaly
```php
Route::resource('/posts', 'PostsController');
```


## VIEWS
lives on `resources/views`

For response a request just create a method in Controller where return a view. Example:

```php
//Controller

public function method() {
  return view('view');
}
```

With this call a view.blade.php

### Passing data to views

## BLADE
`@yield('content')` presents just a bloque of content defined in a @section

`@extends('dir.page')` extend the page of a directory

`@section` open  a section and for close just put `@endsection` or `@stop`

`@if` and `@endif`
`@foreach` and `@endforeach`

## MIGRATIONS
### Generating Migrations
```php artisan make:migration create_user_table``` 
The new migration will be placed in your `database/migrations` directory.

The `--table` and `--create` options may also be used to indicate the name of the table and whether the migration will be creating a new table. These options simply pre-fill the generated migration stub file with the specified table:

```
php artisan make:migration create_users_table --create=users

php artisan make:migration add_votes_to_users_table --table=users
```

If you would like to specify a custom output path for the generated migration, you may use the  `--path` option when executing the `make:migration` command. The given path should be relative to your application's base path.

### Migration Structure
A migration class contains two moethods: `up` and `down`. The `up` method is used to add new tables, columns, or indexes to your database, while the `down` method shoul simply reverse the operations performed by the `up` method.

### SCHEMA BUILDER
###  Creating Tables
To create a new database table, use the `create` method on the `Schema` facade. The `create` method accepts two arguments. The first is the name of the table, while the second is a `Closure` which reveives a `Blueprint` object that may be used to define the new table:

```php
Schema::create('users', function (Blueprint $table) {
  $table->increments('id');
});
```
#### Checking For Table / Column Existence
You may easily check for the existence of a table or column using the `hasTable` and `hasColumn` methods:

```php

if(Schema::hasTable('users')) {
  //
}

if(Schema::hasColumn('users', 'email')) {
  //
}
```

#### Connection & Storage Engine
if you want to perform a schema operation on a database connection that is not your default connection, use the `connection` method:

```php
Schema::connection('foo')->create('users', function (Blueprint $table) {
    $table->increments('id');
});
```
You may use the `engine` property on the schema builder to define the table's storage engine:

```php
Schema::create('users', function (Blueprint $table) {
    $table->engine('InnoDB');
    
    $table->increments('id');
});
```

### Renaming / Dropping Tables
To rename an existing database table, use the `rename` method:
```php
Schema::rename($from, $to);
```

To Drop an existing table, you may use the `drop` or `dropIfExists` mehtods:
```php
Schema::drop('users');

Schema::dropIfExists('users');
```
#### Renaming Tables With Foreign Keys
Before renaming a table, you should verify that any foreign key constrains on the table have an explicit name in your migration files instead of letting laravel assign a convention based name. Otherwise, the foreign key constraint name will refer to the old table name.

### Runing Migrations
for run migrations just
`php artisan migrate`

### Rollback in last migration
just `php artisan migrate:rollback`

### Columns
for change the column just
```php
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->integer('is_admin')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('is_admin');
        });
    }

```

### Reset in all tables
with this rollback in all tables of the databases
`php artisan migrate:reset`


### Refresh
trigger the reset an run migrate again
`php artisan migrate:refresh`

### Migrations Status
`php artisan migrate:status`

## RAW SQL QUERIES
### Insert
```php
Route::get('/insert', function() {
  
  DB::insert('insert into posts(title, content) values(?,?)',
  ['PHP with Laravel', 'Laravel is the best thing that has happened to PHP']);

});
```

### Select | Read
```php
function displayTitle($elm) {
  echo $elm->title;
}

Route::get('/read', function() {
  $results = DB::select('select * from posts where id = ?', [1]);
  //Return a array

  array_map("displayTitle", $results);
  
});
```

### Delete
```php
Route::get('/delete', function() {
  $deleted = DB::delete('delete from posts where id=?',[1]);
  return $deleted;
});

```

### Update
```php
Route::get('/update', function() {
  $updated = DB::update('update posts set title=? where id=?',['Updated title', 1]);

  return $updated;
});
```

## DATABASE - ELOQUENT / ORM
### Create a new model
`php artisan make:model Post` if utilize the flag `-m` make a migration too

### Get all records
```php
use App\Post; // impor a model


Route::get('/read', function() {

  $posts = Post::all();  //return Array

  foreach($posts as $post) {
    return $post->title;
  }

});
```

### Find a record
```php
Route::get('/find', function() {
  $post = Post::find(2);  //return Object
  return $post->title;
});
```

### Find with conditions
```php
Route::get('/findwhere', function() {
  $post = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();
  return $post;
});
```

### Basic insert
```php
Route::get('/basicinsert', function() {

  $post = new Post;
  $post->title = 'New Eloquent title insert';
  $post->content = 'Wow eleoquent is really cool, look at this content';

  $post->save();

});
```

### Insert or Update
```php
Route::get('/basicinsert', function() {

  $post = Post::find(4);
  $post->title = 'Updated the title';
  $post->content = 'Wow eleoquent is really cool, look at this content';

  $post->save();

});
```

### Creating data and configuring mass assignment
```php
  
```

### Update with eloquent
```php
Route::get('/update', function() {
  Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'New PHP title', 'content'=>'I love web development']);
});
```

### Delete
```php
Route::get('/delete', function() {
  $post = Post::find(2); // id 2
  $post->delete();
});

//OR
Route::get('/delete', function() {
  Post::destroy(3); //id 3
});

// Delete multiples rows

Route::get('/delete', function() {
  Post::destroy([4,5]);
});
```

### Soft Deleting / Trashing

```php
  //migrantion
  use Illuminate\Database\Migrations\Migration;

class AddDeletedAtColumnToPostsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //

            $table->dropColumn('deleted_at');
        });
    }
}

  //route
  Route::get('/softdelete', function() {
  Post::find(1)->delete();
});
```

### Retrieve deleted with treshed
```php
Route::get('/readsoftdelete', function() {
  // $post = Post::find(1);
  // return $post;
  $post = Post::withTrashed()->where('id', 1)->get();
  return $post;

});

//OR
Route::get('/readsoftdelete', function() {
  // $post = Post::find(1);
  // return $post;
  $post = Post::onlyTrashed()->where('is_admin', 0)->get();
  return $post;

});

```


## DATABASE - TINKER

## DATABASE - ELOQUENTE ONE TO ONE RELATIONSHIP CRUD

## DATABASE - ELOQUENT ONE TO MANY RELATIONSHIP CRUD

## DATABASE - ELOQUENT MANY TO MANY RELATIONSHIP CRUD

## DATABASE - ELOQUENT POLYMORPHIC MANY TO MANY RELATIONSHIP CRUD

## FORMS AND VALIDATION

## FORMS - PACKAGES AND VALIDATION

## DATABASE - SOME MORE MODEL MANIPULATION

## FORMS - UPLOADING FILES

## FORM - LOGIN

## MIDDLEWARE - SECURITY / PROTECTION

## LARAVEL SESSIONS

## LARAVEL - SENDING EMAIL / API

## GIT AND GITHUB - VERSION CONTROL

## APPLICATION

## APPLICATION - POSTS
## APPLICATION - CATEGORIES
## APPLICATION - MEDIA
## APPLICATION - COMMENTS

## EXTRA FEATURES