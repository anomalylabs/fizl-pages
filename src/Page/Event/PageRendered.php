<?php namespace Anomaly\FizlPages\Page\Event;

use Anomaly\FizlPages\Page\Contract\Page;

/**
 * Class PageRendered
 *
 * @package Anomaly\FizlPages\Page\Event
 */
class PageRendered 
{

    /**
     * @var Page
     */
    protected $page;

    /**
     * @param Page $page
     * @param      $content
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