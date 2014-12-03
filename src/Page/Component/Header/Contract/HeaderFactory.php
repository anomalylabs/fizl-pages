<?php namespace Anomaly\FizlPages\Page\Component\Header\Contract;


interface HeaderFactory
{

    /**
     * @param $key
     * @param $value
     * @return Header
     */
    public function create($key, $value);

}