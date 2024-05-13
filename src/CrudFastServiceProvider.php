<?php

namespace Perrin\CrudFast;



use Illuminate\Support\ServiceProvider;
use Perrin\CrudFast\Commands\InstallCommand;
use Perrin\CrudFast\Commands\UninstallCommand;


class CrudFastServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
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
}
