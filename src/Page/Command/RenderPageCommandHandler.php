<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Page\Event\PageRendered;

/**
 * Class RenderPageCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class RenderPageCommandHandler 
{

    /**
     * @param LoadPageView404Command $command
     * @return \Anomaly\FizlPages\Page\Contract\Page
     */
    public function handle(RenderPageCommand $command)
    {
        $page = $command->getPage();

        if ($view = $page->getView()) {
            $page->setContent($view->render());
        }

        $page->raise(new PageRendered($page));

        return $page;
    }

} 