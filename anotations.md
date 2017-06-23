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
