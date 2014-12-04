<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Page\Event\PageViewLoaded;
use Anomaly\FizlPages\Support\CommanderTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class LoadPageViewCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class LoadPageViewCommandHandler
{
    use CommanderTrait;

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
     * @param LoadPageViewCommand $command
     * @return  View
     */
    public function handle(LoadPageViewCommand $command)
    {
        $page = $command->getPage();

        // Make sure we create the view once
        if (!$page->getView()) {

            try {
                // Attempt to make default view
                $page->setView($this->factory->make($page->getPath()));

            } catch (\InvalidArgumentException $e) {

                // If not, try it as a index within the folder
                if ($this->factory->exists($page->getIndexPath())) {
                    $this->execute(new LoadPageViewIndexCommand($page));
                } else {
                    $this->execute(new LoadPageView404Command($page));
                }
            }

            $page->raise(new PageViewLoaded($page));
        }

        return $page;
    }

} 