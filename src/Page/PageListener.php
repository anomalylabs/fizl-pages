<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Command\CreatePageViewCommand;
use Anomaly\FizlPages\Page\Command\LoadHeadersToPageCommand;
use Anomaly\FizlPages\Page\Event\PageCreated;
use Anomaly\FizlPages\Page\Event\PageRendered;
use Anomaly\FizlPages\Page\Event\PageViewCreated;
use Anomaly\FizlPages\Support\CommanderTrait;
use Laracasts\Commander\Events\EventListener;

/**
 * Class PageListener
 *
 * @package Anomaly\FizlPages
 */
class PageListener extends EventListener
{
    use CommanderTrait;

    /**
     * @param PageCreated $event
     */
    public function whenPageCreated(PageCreated $event)
    {
        $this->execute(new CreatePageViewCommand($event->getPage()));
        $this->execute(new LoadHeadersToPageCommand($event->getPage()));
    }

} 