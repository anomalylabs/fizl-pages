<?php namespace Anomaly\FizlPages\Contract;

use Anomaly\FizlPages\Page\Component\Path\Path;
use Anomaly\FizlPages\Page\Contract\Page;
use Anomaly\FizlPages\Page\Contract\PageCollection;

interface Pages
{
    /**
     * @param string $sortBy
     * @param bool   $descending
     * @return $this
     */
    public function sortBy($sortBy, $descending = true);

    /**
     * @param int $depth
     */
    public function depth($depth = 1);

    /**
     * @param string $namespace
     * @return Page
     */
    public function in($namespace = null);

    /**
     * @param string $uri
     * @return Page
     */
    public function find($uri = '/');

    /**
     * @param string $uri
     * @return PageCollection
     */
    public function get($uri = '/');

    /**
     * @param string $uri
     * @param null   $namespace
     * @param array  $data
     * @return string
     */
    public function render($uri = '/');

}