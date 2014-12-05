<?php namespace Anomaly\FizlPages\PageFinder\Command;

/**
 * Class FindPagesCommand
 *
 * @package Anomaly\FizlPages\PageFinder\Command
 */
class FindPagesCommand 
{

    private $uri;
    private $namespace;
    private $orderBy;
    private $hidden;

    public function __construct($uri, $namespace, $orderBy, $hidden)
    {

        $this->uri = $uri;
        $this->namespace = $namespace;
        $this->orderBy = $orderBy;
        $this->hidden = $hidden;
    }

} 