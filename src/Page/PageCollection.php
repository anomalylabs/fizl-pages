<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Contract\Page as FizlPage;
use Anomaly\FizlPages\PageFinder\Command\SortPagesCommand;
use Anomaly\FizlPages\Support\CommanderTrait;
use Illuminate\Support\Collection;
use Laracasts\Commander\Events\EventGenerator;

/**
 * Class PageCollection
 *
 * @package Anomaly\FizlPages\Page
 */
class PageCollection extends Collection implements \Anomaly\FizlPages\Page\Contract\PageCollection
{
    use EventGenerator;

    /**
     * @param $uri
     * @return FizlPage
     */
    public function getByUri($uri)
    {
        return $this->get($uri);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $pages = [];
        /** @var FizlPage $page */
        foreach ($this->items as $uri => $page) {
            $pages[$uri] = $page->toArray();
        }
        return $pages;
    }

} 