<?php namespace Anomaly\FizlPages;

use Anomaly\Lexicon\Parser\ParserResolver;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;


/**
 * Class PagesServiceProvide
 *
 * @package Anomaly\FizlPages
 */
class PagesServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(
            'Anomaly.FizlPages.Page.Event.*',
            'Anomaly\FizlPages\Page\PageListener'
        );
    }

    public function register()
    {
        $this->package('anomaly/fizl-pages', null, __DIR__);

        $this->registerThirdPartyProviders();
        $this->registerBindings();
        $this->registerViewComposers();
        $this->registerViewNamespaces();
        $this->registerParsers();

    }

    protected function registerThirdPartyProviders()
    {
        $this->app->register('Laracasts\Commander\CommanderServiceProvider');
    }

    protected function registerBindings()
    {
        $this->app->bind(
            'Anomaly\FizlPages\Contract\Pages',
            'Anomaly\FizlPages\Pages'
        );
        $this->app->bind(
            'Anomaly\FizlPages\Page\Contract\Page',
            'Anomaly\FizlPages\Page\Page'
        );
        $this->app->bind(
            'Anomaly\FizlPages\Page\Contract\PageFactory',
            'Anomaly\FizlPages\Page\PageFactory'
        );
        $this->app->bind(
            'Anomaly\FizlPages\Page\Component\Header\HeaderInterface',
            'Anomaly\FizlPages\Page\Component\Header\Header'
        );
        $this->app->bind(
            'Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection',
            'Anomaly\FizlPages\Page\Component\Header\HeaderCollection'
        );
        $this->app->bind(
            'Anomaly\FizlPages\Page\Component\Header\Contract\HeaderFactory',
            'Anomaly\FizlPages\Page\Component\Header\HeaderFactory'
        );
        $this->app->bind(
            'Anomaly\FizlPages\Cache\Contract\Cache',
            'Anomaly\FizlPages\Cache\Cache'
        );
    }

    protected function registerViewComposers()
    {
        $this->app->resolving(
            'view',
            function (Factory $view) {
                $view->composers(config('fizl-pages::composers', []));
            }
        );

    }

    protected function registerViewNamespaces()
    {
        $this->app->resolving(
            'view',
            function (Factory $view) {
                foreach (config('fizl-pages::namespaces', []) as $key => $value) {
                    if (is_numeric($key)) {
                        $namespace = $value;
                        $dir       = config('fizl-pages::base_path') . '/' . $value;
                    } else {
                        $namespace = $key;
                        $dir       = $value;
                    }
                    $view->addNamespace($namespace, $dir);
                }
            }
        );
    }

    protected function registerParsers()
    {
        $this->app->resolving(
            'Anomaly\Lexicon\Parser\ParserResolver',
            function (ParserResolver $parserResolver) {
                $parserResolver->addParsers(
                    config(
                        'fizl-pages::extension_parsers',
                        [
                            'md' => 'Anomaly\FizlPages\Parser\PageParser',
                        ]
                    )
                );
            }
        );
    }
    
}