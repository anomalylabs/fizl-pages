<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Command\CreatePageViewCommand;
use Anomaly\FizlPages\Page\Command\LoadHeadersToPageCommand;
use Anomaly\FizlPages\Page\Command\LoadPageHeadersCommand;
use Anomaly\FizlPages\Page\Command\LoadPageView404Command;
use Anomaly\FizlPages\Page\Command\LoadPageViewCommand;
use Anomaly\FizlPages\Page\Event\PageCreated;
use Anomaly\FizlPages\Page\Event\PageHeadersLoaded;
use Anomaly\FizlPages\Page\Event\PageRendered;
use Anomaly\FizlPages\Page\Event\PageViewCreated;
use Anomaly\FizlPages\Support\CommanderTrait;
use Laracasts\Commander\Events\DispatchableTrait;
use Laracasts\Commander\Events\EventListener;

/**
 * Class PageListener
 *
 * @package Anomaly\FizlPages
 */
class PageListener extends EventListener
{
    use CommanderTrait, DispatchableTrait;

    /**
     * @param PageCreated $event
     */
    public function whenPageCreated(PageCreated $event)
    {
        $page = $event->getPage();

        $this->execute(new LoadPageViewCommand($page));
        $this->execute(new LoadPageHeadersCommand($page));

        $this->dispatchEventsFor($page);
    }

    /**
     * @param PageHeadersLoaded $event
     */
    public function whenPageHeadersLoaded(PageHeadersLoaded $event)
    {
        $page = $event->getPage();

        if (!$page->getHeaders()->getValue('routable', true)) {
            $this->execute(new LoadPageView404Command($page));
        }

        $this->dispatchEventsFor($page);
    }

} 