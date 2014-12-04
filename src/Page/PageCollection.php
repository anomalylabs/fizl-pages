<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Contract\Page;
use Illuminate\Support\Collection;

/**
 * Class PageCollection
 *
 * @package Anomaly\FizlPages\Page
 */
class PageCollection extends Collection
{

    /**
     * @param $uri
     * @return Page
     */
    public function getByUri($uri)
    {
        return $this->get($uri);
    }

} 