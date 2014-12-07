<?php namespace Anomaly\FizlPages\PageFinder\Contract;

/**
 * Interface PageFinderFactory
 *
 * @package Anomaly\FizlPages\PageFinder\Contract
 */
interface PageFinderFactory
{

    public function create($uri, $depth = 1, $namespace = null);

} 