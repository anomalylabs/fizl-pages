<?php namespace Anomaly\FizlPages\Contract;

use Anomaly\FizlPages\Page\Component\Path\Path;
use Anomaly\FizlPages\Page\Contract\Page;

interface Pages
{

    /**
     * @param       $uri
     * @param null  $namespace
     * @param array $data
     * @return Page
     */
    public function getPage($uri, $namespace = null, array $data = []);

    /**
     * @param       $uri
     * @param null  $namespace
     * @param array $data
     * @return string
     */
    public function render($uri, $namespace = null, array $data = []);

    /**
     * @param        $uri
     * @param null   $namespace
     * @param int    $depth
     * @param string $orderBy
     * @param bool   $descending
     * @return mixed
     */
    public function getPages(
        $uri,
        $namespace = null,
        $depth = 1,
        $orderBy = 'uri',
        $descending = false
    );

}