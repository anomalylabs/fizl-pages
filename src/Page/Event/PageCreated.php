<?php namespace Anomaly\FizlPages\Page\Event;

use Anomaly\FizlPages\Page\Page;

/**
 * Class PageCreated
 *
 * @package Anomaly\FizlPages\Page\Event
 */
class PageCreated 
{

    /**
     * @var Page
     */
    protected $page;

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