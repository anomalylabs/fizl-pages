<?php namespace Anomaly\FizlPages\PageFinder\Command;

use Anomaly\FizlPages\Page\Contract\Page;

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



        $pages->sortBy(function(Page $page) {

            }, SORT_REGULAR, $command->isDescending());

    }

    protected function toSorter($sortBy)
    {

    }

} 