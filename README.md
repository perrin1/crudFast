# crudFast

 crud-fast est un package laravel qui vous permet d'automatiser certain de vos commande artisan dans votre programation avec laravel. Entre autre  nous avons ces commandes : 

- `php artisan make:model  NomDuModel`
- `php artisan make:controller MonModelController`
- `php artisan make:migration create_example_table`
- `Route::resource('home', 'HomeController');`
- `......`


## À savoir : 

Ce package vous crée :

- `les vues`
- `les Controllers`
- `les Views`
    - `create.blade.php `
    - `edit.blade.php `
    - `show.blade.php `
    - `index.blade.php `

## Setup du package

```bash
composer require perrin/crud-fast:dev-main
```

### instalation 

- ` Mise en place d'un exemple  `

```bash
php artisan crudfast:install  Exemple
```

- ` D'ésinstalation d'un exemple  `


```bash
php artisan crudfast:install  Exemple
```

## Conclusion
Ce package vous permet d'allez plus vite dans vos mise en place de crud ou autre creation de MVC. Suis à la version 1.0 est d'autre ameliorations viendront


Je vous laisse appliquer 📖

