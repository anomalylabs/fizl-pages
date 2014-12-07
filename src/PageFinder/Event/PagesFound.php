<?php namespace Anomaly\FizlPages\PageFinder\Event;

use Anomaly\FizlPages\Page\Contract\PageCollection;

/**
 * Class PagesFound
 *
 * @package Anomaly\FizlPages\PageFinder\Event
 */
class PagesFound 
{

    /**
     * @var PageCollection
     */
    protected $pages;

    /**
     * @param PageCollection $pages
     */
    public function __construct(PageCollection $pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return PageCollection
     */
    public function getPages()
    {
        return $this->pages;
    }

} 