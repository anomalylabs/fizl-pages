<?php namespace Anomaly\FizlPages\Page\Command;

/**
 * Class CreatePageCommand
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class CreatePageCommand 
{

    private $uri;
    private $namespace;

    public function __construct($uri, $namespace)
    {
        $this->uri = $uri;
        $this->namespace = $namespace;
    }

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

} 