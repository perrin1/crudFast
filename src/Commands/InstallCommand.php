<?php
namespace Perrin\CrudFast\Commands;
// namespace Src\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
class InstallCommand extends Command
{
    protected $signature = 'crudfast:install {modelName}';
    protected $description = 'Create CRUD scaffolding for a given model';

    public function handle()
    {
        $modelName = $this->argument('modelName');


        // Création du modèle
        $this->call('make:model', ['name' => $modelName]);

        // Création de la migration
        $this->call('make:migration', ['name' => 'create' .$modelName. 's_table']);

        // Création du contrôleur
        $this->call('make:controller', ['name' => $modelName . 'Controller']);

        // Création des vues
        $this->createViews($modelName);

        // Configuration des routes pour CRUD
        // Ajoutez votre logique pour configurer les routes ici
    
        // Configuration des routes pour CRUD
        $routeContent = <<<PHP
            // Routes spécifiques pour $modelName
            // Route pour afficher le formulaire de création
            Route::get('/{$modelName}/create', [{$modelName}Controller::class, 'create'])->name('{$modelName}.create');

            // Route pour afficher un {$modelName} spécifique
            Route::get('/{$modelName}/{{$modelName}}', [{$modelName}Controller::class, 'show'])->name('{$modelName}.show');

            // Route pour enregistrer un nouvel {$modelName}
            Route::post('/{$modelName}', [{$modelName}Controller::class, 'store'])->name('{$modelName}.store');

            // Route pour afficher le formulaire de modification d'un {$modelName}
            Route::get('/{$modelName}/{{$modelName}}/edit', [{$modelName}Controller::class, 'edit'])->name('{$modelName}.edit');

            // Route pour mettre à jour un {$modelName} existant
            Route::put('/{$modelName}/{{$modelName}}', [{$modelName}Controller::class, 'update'])->name('{$modelName}.update');

            // Route pour supprimer un {$modelName}
            Route::delete('/{$modelName}/{{$modelName}}', [{$modelName}Controller::class, 'destroy'])->name('{$modelName}.destroy');
            // Fin des routes spécifiques pour $modelName
        PHP;

        // Ajouter les routes uniquement si elles n'existent pas déjà
        $routeFile = base_path('routes/web.php');

        if (!file_exists($routeFile)) {
            file_put_contents($routeFile, '<?php' . PHP_EOL);
        }

        if (strpos(file_get_contents($routeFile), $routeContent) === false) {
            file_put_contents($routeFile, $routeContent, FILE_APPEND);
        }

        $this->info("CRUD Fast for $modelName has been installed successfully!");
    }


    protected function createViews($modelName)
    {
        $viewsPath = resource_path('views/crudfast/' . $modelName);

        // Créez le répertoire pour les vues s'il n'existe pas déjà
        if (!File::exists($viewsPath)) {
            File::makeDirectory($viewsPath, 0755, true);
        }

        // Liste des fichiers de vue à copier
        $views = [
            'create.blade.php',
            'index.blade.php',
            'edit.blade.php',
            'show.blade.php',
        ];

        // Copiez les fichiers de vue dans le répertoire approprié
        foreach ($views as $view) {
            $stubPath = __DIR__ . "/stubs/views/$view";
            $destinationPath = $viewsPath . '/' . $view;

            // Copiez le fichier de vue s'il n'existe pas déjà
            if (!File::exists($destinationPath)) {
                File::copy($stubPath, $destinationPath);
            }
        }
    }
}