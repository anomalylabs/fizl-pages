<?php namespace Anomaly\FizlPages;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class PagesRouteServiceProvider
 *
 * @package Anomaly\FizlPages
 */
class PagesRouteServiceProvider extends ServiceProvider
{

    public function boot(Router $router)
    {
        $router->any('/{any?}', 'Anomaly\FizlPages\Http\Controller\PageController@page')->where('any', '(.*)');
    }

    public function register()
    {

    }

} 