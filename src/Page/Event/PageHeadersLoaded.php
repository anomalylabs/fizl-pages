<?php namespace Anomaly\FizlPages\Page\Event;

use Anomaly\FizlPages\Page\Page;

/**
 * Class PageHeadersLoaded
 *
 * @package Anomaly\FizlPages\Page\Event
 */
class PageHeadersLoaded
{
    /**
     * @var Page
     */
    protected $page;

    /**
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * @return Page
     */
    public function getPage()
    {
        return $this->page;
    }

}