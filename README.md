# crudFast

 crud-fast est un package laravel qui vous permet d'automatiser certain de vos commande artisan dans votre programation avec laravel. Entre autre  nous avons ces commandes : 

- `php artisan make:model  NomDuModel`
- `php artisan make:controller MonModelController`
- `php artisan make:migration create_example_table`
- `Route::resource('home', 'HomeController');`
- `......`
Ce package a été créer dans l'optique de reduire le nombre de commande usuel à taper dans un projet laravel et aussi facciliter les vues usuels qu'on a l'habitude de créer quand il nous revient de faire un CRUD rapide sur un model <br>
La prochaine étape serait  de :
` configurer les migrations par un prompte`  , 
`faire le contenue par defaut des vues` et 
`mettre en place le necessaire dans le controleure` permettant à l'utiliateur d'être deux plus rappide qu'auparavant 

Ce package vous crée :


- `les Controllers`
- `les Migrations`
- `les Vues`
    - `create.blade.php `
    - `edit.blade.php `
    - `show.blade.php `
    - `index.blade.php `

# Comment installer et exécuter ce package

préalablement il faut etre dans un environnement du langage `php` avec un de ces framworkes (laravel de preferences)

```bash
composer require perrin/crud-fast:dev-main
```

# Comment utiliser ce package

- ` Mise en place d'un exemple  `

```bash
php artisan crudfast:install  Exemple
```

- ` D'ésinstalation d'un exemple  `


```bash
php artisan crudfast:install  Exemple
```

### NB: 
Dans votre `web.php` n'oublier pas d'importé la classe de vôtre controller prélablement créer

# Comment contribuer au projet

c'est un package open source donc vous pouvez contribuer et ajouter votre pierr à l'édifice 

# Test 

```bash
composer require perrin/crud-fast:dev-main
```

<p align="center"><img src="/art/composer.jpg" alt="composer img"></p>

 
- ` Installation `

```bash
php artisan crudfast:install  Persone
```

<p align="center"><img src="/art/install.jpg" alt="install img"></p>

- ` Désinstalation  `

```bash
php artisan crudfast:uninstall  Persone
```
<p align="center"><img src="/art/uninstall.jpg" alt="uninstall img"></p>


## Conclusion
Ce package vous permet d'allez plus vite dans vos mise en place de CRUD ou autre creation de MVC. Suis à la version 1.0 et d'autre ameliorations viendront


Je vous laisse appliquer 📖

