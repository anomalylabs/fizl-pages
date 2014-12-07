<?php namespace Anomaly\FizlPages\PageFinder\Sorter;

use Anomaly\FizlPages\Page\Contract\Page;
use Anomaly\FizlPages\PageFinder\Contract\PageSorter;
use Carbon\Carbon;

/**
 * Class DateSorter
 *
 * @package Anomaly\FizlPages\PageFinder\Sorter
 */
class DateSorter implements PageSorter
{

    /**
     * @param Page $page
     * @return string
     */
    public function sortBy(Page $page)
    {
        $sortBy = null;
        $date = $page->get('date');

        if ($date instanceof Carbon) {
            $sortBy = $date->toDateTimeString();
        }

        return $sortBy;
    }
}