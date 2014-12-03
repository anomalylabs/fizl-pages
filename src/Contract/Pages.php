<?php namespace Anomaly\FizlPages\Contract;

use Anomaly\FizlPages\Page\Component\Path\Path;
use Anomaly\FizlPages\Page\Contract\Page;

interface Pages
{

    /**
     * @param        $uri
     * @param array  $data
     * @param string $namespace
     * @return Page
     */
    public function getPage($uri, array $data = [], $namespace = Path::DEFAULT_NAMESPACE);

    /**
     * @param        $uri
     * @param array  $data
     * @param string $namespace
     * @return string
     */
    public function render($uri, array $data = [], $namespace = Path::DEFAULT_NAMESPACE);

}