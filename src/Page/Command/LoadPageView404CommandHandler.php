<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Page\Contract\Page;
use Anomaly\FizlPages\Page\Event\PageView404Loaded;
use Illuminate\Contracts\View\Factory;

/**
 * Class LoadPageView404CommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class LoadPageView404CommandHandler 
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
     * @param LoadPageView404Command $command
     * @return Page
     */
    public function handle(LoadPageView404Command $command)
    {
        $page = $command->getPage();

        $page->setView($this->factory->make($page->getMissingPath()));
        $page->setMissing(true);
        $page->raise(new PageView404Loaded($page));

        return $page;
    }

} 