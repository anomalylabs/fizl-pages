<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Page\Contract\Page;

/**
 * Class LoadPageViewIndexCommand
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class LoadPageViewIndexCommand 
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