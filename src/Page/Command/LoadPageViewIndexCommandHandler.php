<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Page\Event\PageViewIndexLoaded;
use Illuminate\Contracts\View\Factory;

/**
 * Class LoadPageViewIndexCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class LoadPageViewIndexCommandHandler 
{

    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param LoadPageViewIndexCommand $command
     * @return \Anomaly\FizlPages\Page\Contract\Page
     */
    public function handle(LoadPageViewIndexCommand $command)
    {
        $page = $command->getPage();

        $page->setView($this->factory->make($page->getIndexPath()));

        $page->raise(new PageViewIndexLoaded($page));

        return $page;
    }

} 