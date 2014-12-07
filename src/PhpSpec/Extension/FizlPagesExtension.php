<?php namespace Anomaly\FizlPages\PhpSpec\Extension;

use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\ServiceContainer;

/**
 * Class FizlPagesExtension
 *
 * @package Anomaly\FizlPages\PhpSpec
 */
class FizlPagesExtension implements ExtensionInterface
{

    /**
     * @param ServiceContainer $container
     */
    public function load(ServiceContainer $container)
    {
        dd($container->get('laravel')->app);
    }

}
