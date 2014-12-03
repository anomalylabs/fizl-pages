<?php namespace Anomaly\FizlPages\Support;

/**
 * Class KeyTrait
 *
 * @package Anomaly\FizlPages\Support
 */
trait KeyTrait
{

    public function key($key)
    {
        return __NAMESPACE__ . '.' . $key;
    }

} 