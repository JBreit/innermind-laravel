<?php

namespace Innermind\Support\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

abstract class RouteServiceProvider extends ServiceProvider
{
    protected $router;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router)
    {
        $this->router = $router;

        $this->registerMiddleware();

        $this->mapWebRoutes();
    }

    /**
     * Registers any custom middleware.
     *
     * @todo add MiddlewareGroup functionality
     *
     * @return void
     */
    protected function registerMiddleware()
    {
        foreach($this->app['config']['middleware'] as $key => $middleware) {
            $this->router->aliasMiddleware($key, $middleware);
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $this->pathToRoutes = str_replace('\\', '/', $this->pathToRoutes);

        $dir = new \DirectoryIterator(base_path($this->pathToRoutes));
 
        foreach ($dir as $fileinfo) {

            $this->registerRouteUnless(
                $fileinfo->isDot(),
                $this->pathToRoutes.DIRECTORY_SEPARATOR.$fileinfo->getFileName()
            );
        }
    }

    protected function registerRouteUnless($condition, $routeFilePath)
    {
        if ($condition) return;

        $this->router->group([
            'namespace' => $this->namespace, 
        ], function ($router) use ($routeFilePath) {
            require base_path($routeFilePath);
        });
    }
}