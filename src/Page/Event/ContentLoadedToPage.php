<?php namespace Anomaly\FizlPages\Page\Event;

use Anomaly\FizlPages\Page\PageInterface;

/**
 * Class ContentLoadedToPage
 *
 * @package Anomaly\FizlPages\Page\Event
 */
class ContentLoadedToPage 
{
    /**
     * @var PageInterface
     */
    protected $page;

    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * @return PageInterface
     */
    public function getPage()
    {
        return $this->page;
    }

} 