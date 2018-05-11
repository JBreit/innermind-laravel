<?php

namespace Innermind\App\Providers;

use Innermind\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Innermind\App\Apis';

    protected $pathToRoutes = 'Innermind\App\Routes';
}