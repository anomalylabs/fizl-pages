<?php namespace Anomaly\FizlPages\PageFinder\Command;

use Anomaly\FizlPages\Page\PageCollection;

/**
 * Class SortPagesCommand
 *
 * @package Anomaly\FizlPages\PageFinder\Command
 */
class SortPagesCommand 
{

    /**
     * @var PageCollection
     */
    protected $pageCollection;

    /**
     * @var string
     */
    protected $sortBy;

    /**
     * @var bool
     */
    protected $descending;

    public function __construct(PageCollection $pageCollection, $sortBy = 'uri', $descending = false)
    {
        $this->pageCollection = $pageCollection;
        $this->sortBy = $sortBy;
        $this->descending = $descending;
    }

    /**
     * @return boolean
     */
    public function isDescending()
    {
        return $this->descending;
    }

    /**
     * @return PageCollection
     */
    public function getPageCollection()
    {
        return $this->pageCollection;
    }

    /**
     * @return string
     */
    public function getSortBy()
    {
        return $this->sortBy;
    }

} 