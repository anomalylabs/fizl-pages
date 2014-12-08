<?php namespace Anomaly\FizlPages\PageFinder\Contract;

/**
 * Interface PageFinderFactory
 *
 * @package Anomaly\FizlPages\PageFinder\Contract
 */
interface PageFinderFactory
{

    public function create($uri, $namespace = null, $depth = 1);

} 