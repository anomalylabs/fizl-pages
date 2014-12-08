<?php namespace Anomaly\FizlPages\PageFinder\Sorter;

use Anomaly\FizlPages\Page\Contract\Page;
use Anomaly\FizlPages\PageFinder\Contract\PageSorter;

/**
 * Class PageHeaderSorter
 *
 * @package Anomaly\FizlPages\PageFinder\Sorter
 */
class PageHeaderSorter implements PageSorter
{

    /**
     * @param Page $page
     * @param      $key
     * @return mixed
     */
    public function sortBy(Page $page, $key)
    {
        return $page->get($key);
    }

} 