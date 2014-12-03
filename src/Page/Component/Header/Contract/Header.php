<?php namespace Anomaly\FizlPages\Page\Component\Header\Contract;

/**
 * Interface Header
 *
 * @package Anomaly\FizlPages\Page\Component\Header\Contract
 */
interface Header
{
    /**
     * @return string
     */
    public function getKey();

    /**
     * @return mixed
     */
    public function getValue();

} 