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
    protected $descending = true;

    /**
     * @var array
     */
    protected $pageSorters = [];

    /**
     * @param PageCollection $pageCollection
     * @param null           $sortBy
     * @param bool           $descending
     * @param array          $pageSorters
     */
    public function __construct(
        PageCollection $pageCollection,
        $sortBy = null,
        $descending = true,
        array $pageSorters = []
    ) {
        $this->pageCollection = $pageCollection;
        $this->sortBy         = $sortBy;
        $this->descending     = $descending;
        $this->pageSorters = $pageSorters;
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

    /**
     * @return array
     */
    public function getPageSorters()
    {
        return $this->pageSorters;
    }

} 