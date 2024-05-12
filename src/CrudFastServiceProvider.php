<?php

namespace Perrin;


use Perrin\crudfast\InstallCommand;
use Perrin\crudfast\UninstallCommand;
use Illuminate\Support\ServiceProvider;


class CrudFastServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Enregistrement de la commande install
        $this->app->singleton('command.crudfast.install', function ($app) {
            return new InstallCommand();
        });

        // Enregistrement de la commande uninstall
        $this->app->singleton('command.crudfast.uninstall', function ($app) {
            return new UninstallCommand();
        });

        // Enregistrement des commandes
        $this->commands([
            'command.crudfast.install',
            'command.crudfast.uninstall',
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Code à exécuter lors du démarrage de l'application
    }
}
