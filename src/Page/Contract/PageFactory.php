<?php namespace Anomaly\FizlPages\Page\Contract;

/**
 * Interface PageFactory
 *
 * @package Anomaly\FizlPages\Page\Contract
 */
interface PageFactory
{

    /**
     * @param       $path
     * @param array $data
     * @return Page
     */
    public function create($path, array $data = []);

} 