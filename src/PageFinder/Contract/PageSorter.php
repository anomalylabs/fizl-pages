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
     * @param Page   $page
     * @param string $key
     * @return mixed
     */
    public function sortBy(Page $page, $key);

} 