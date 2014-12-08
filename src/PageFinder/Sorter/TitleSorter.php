<?php namespace Anomaly\FizlPages\PageFinder\Sorter;

use Anomaly\FizlPages\Page\Contract\Page;
use Anomaly\FizlPages\PageFinder\Contract\PageSorter;

/**
 * Class TitleSorter
 *
 * @package Anomaly\FizlPages\PageFinder\Sorter
 */
class TitleSorter implements PageSorter
{

    /**
     * @param Page $page
     * @return string
     */
    public function sortBy(Page $page, $key)
    {
        return $page->getTitle();
    }

} 