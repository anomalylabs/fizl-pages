<?php namespace Anomaly\FizlPages\Page\Contract;

/**
 * Interface PageCollection
 *
 * @package Anomaly\FizlPages\Page\Contract
 */
interface PageCollection
{

    public function put($key, $value);

    public function getByUri($uri);

} 