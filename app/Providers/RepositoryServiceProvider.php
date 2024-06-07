<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $interfacesPath = app_path('Repositories/Interfaces');

        $interfaces = File::allFiles($interfacesPath);

        foreach ($interfaces as $interface) {
            $interfaceName = basename($interface, '.php');
            $interfaceClass = "App\\Repositories\\Interfaces\\{$interfaceName}";

            $repositoryName = str_replace('Interface', '', $interfaceName);

            $repositoryClass = "App\\Repositories\\Eloquent\\Eloquent{$repositoryName}";

            if (class_exists($repositoryClass)) {
                $this->app->bind($interfaceClass, $repositoryClass);
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
