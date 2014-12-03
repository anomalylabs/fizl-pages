<?php namespace Anomaly\FizlPages\Page\Component\Path\Contract;


interface Path
{

    public function toUri();

    public function toNamespace();

    public function toString();

} 