<?php namespace Anomaly\FizlPages\PageFinder\Contract;

use Anomaly\FizlPages\Page\Contract\Page;

/**
 * Interface PageSorter
 *
 * @package Anomaly\FizlPages\PageFinder\Contract
 */
interface PageSorter
{

    /**
     * @param Page $page
     * @return string
     */
    public function sortBy(Page $page);

} 