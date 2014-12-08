<?php namespace Anomaly\FizlPages\Page\Contract;

/**
 * Interface PageFactory
 *
 * @package Anomaly\FizlPages\Page\Contract
 */
interface PageFactory
{

    /**
     * @param       $uri
     * @param null  $namespace
     * @param array $data
     * @return mixed
     */
    public function create($uri, $namespace = null);

} 