<?php namespace Anomaly\FizlPages\Page\Component\Uri\Contract;

/**
 * Interface Uri
 *
 * @package Anomaly\FizlPages\Page\Component\Uri\Contract
 */
interface Uri
{

    public function toPath();

    public function toString();

    public function getNamespace();

} 