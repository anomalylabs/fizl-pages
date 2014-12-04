<?php namespace Anomaly\FizlPages\Page\Event;

use Anomaly\FizlPages\Page\Contract\Page;

/**
 * Class PageViewLoaded
 *
 * @package Anomaly\FizlPages\Page\Event
 */
class PageViewLoaded
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