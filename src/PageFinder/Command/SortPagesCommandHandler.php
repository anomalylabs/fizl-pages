<?php namespace Anomaly\FizlPages\PageFinder\Command;

use Anomaly\FizlPages\Page\Contract\Page;
use Anomaly\FizlPages\PageFinder\Contract\PageSorter;
use Anomaly\FizlPages\PageFinder\Sorter\PageHeaderSorter;

/**
 * Class SortPagesCommandHandler
 *
 * @package Anomaly\FizlPages\PageFinder\Command
 */
class SortPagesCommandHandler
{

    protected $sorters = [
        'date' => 'Anomal'
    ];

    public function handle(SortPagesCommand $command)
    {
        $pages = $command->getPageCollection();
        $key   = $command->getSortBy();
        $sorters = $command->getPageSorters();

        if (is_string($key)) {

            if (array_key_exists($key, $sorters)) {
                $sorter = app()->make($sorters[$key]);
            } else {
                $sorter = new PageHeaderSorter();
            }

            $pages->sortBy(
                function (Page $page) use ($key, $sorter) {
                    /** @var PageSorter $sorter */
                    $sortBy = $sorter->sortBy($page, $key);
                    return $sortBy ?: $page->getUri();
                },
                SORT_REGULAR,
                $command->isDescending()
            );
        }
    }

} 