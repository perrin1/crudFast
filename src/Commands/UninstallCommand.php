<?php

// namespace Src\Commands;
namespace Perrin\CrudFast\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UninstallCommand extends Command
{
    protected $signature = 'crudfast:uninstall {modelName}';
    protected $description = 'Remove CRUD scaffolding for a given model';

    public function handle()
    {
        $modelName = $this->argument('modelName');

        // Suppression du modèle
        $this->deleteModel($modelName);

        // Suppression de la migration
        $this->deleteMigration($modelName);

        // Suppression du contrôleur
        $this->deleteController($modelName);

        // Suppression des vues
        $this->deleteViews($modelName);

        // Suppression des routes
        $this->deleteRoutes($modelName);

        $this->info("CRUD for $modelName has been uninstalled successfully!");
    }

    protected function deleteModel($modelName)
    {
        // Supprimer le fichier du modèle
        $modelPath = app_path("{$modelName}.php");
        if (File::exists($modelPath)) {
            File::delete($modelPath);
        }
    }

    protected function deleteMigration($modelName)
    {
        // Supprimer le fichier de migration
        $migrationFileName = 'create_' . strtolower($modelName) . 's_table.php';
        $migrationPath = database_path("migrations/*{$migrationFileName}");
        $migrationFiles = glob($migrationPath);
        foreach ($migrationFiles as $migrationFile) {
            if (File::exists($migrationFile)) {
                File::delete($migrationFile);
            }
        }
    }

    protected function deleteController($modelName)
    {
        // Supprimer le fichier du contrôleur
        $controllerPath = app_path("Http/Controllers/{$modelName}Controller.php");
        if (File::exists($controllerPath)) {
            File::delete($controllerPath);
        }
    }

    protected function deleteViews($modelName)
    {
        // Supprimer le répertoire des vues
        $viewsPath = resource_path("views/crudfast/{$modelName}");
        if (File::exists($viewsPath)) {
            File::deleteDirectory($viewsPath);
        }
    }

    protected function deleteRoutes($modelName)
    {
        // Supprimer les routes spécifiques au modèle
        $routesContent = file_get_contents(base_path('routes/web.php'));
        $lines = explode("\n", $routesContent);
        $newLines = [];
        $inModelRoutes = false;
        foreach ($lines as $line) {
            if (strpos($line, "// Routes spécifiques pour $modelName") !== false) {
                $inModelRoutes = true;
                continue;
            }
            if ($inModelRoutes && strpos($line, "// Fin des routes spécifiques pour $modelName") !== false) {
                $inModelRoutes = false;
                continue;
            }
            if (!$inModelRoutes) {
                $newLines[] = $line;
            }
        }
        $newContent = implode("\n", $newLines);
        file_put_contents(base_path('routes/web.php'), $newContent);
    }
}
