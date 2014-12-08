<?php namespace Anomaly\FizlPages\Page\Command;

/**
 * Class CheckPageExistsCommand
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class CheckPageExistsCommand
{
    /**
     * @var string
     */
    protected $uri;

    /**
     * @var string|null
     */
    protected $namespace;

    /**
     * @param $uri
     * @param $namespace
     */
    public function __construct($uri, $namespace)
    {
        $this->uri       = $uri;
        $this->namespace = $namespace;
    }

    /**
     * @return string|null
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }
} 