<?php namespace Anomaly\FizlPages\Page\Component\Header\Contract;

/**
 * Interface HeaderCollection
 *
 * @package Anomaly\FizlPages\Page\Component\Header\Contract
 */
interface HeaderCollection
{

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function put($key, $value);

    /**
     * @param $key
     * @return mixed
     */
    public function getValue($key, $default = null);

    /**
     * @param $event
     * @return mixed
     */
    public function raise($event);

} 