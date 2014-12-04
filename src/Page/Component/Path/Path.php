<?php namespace Anomaly\FizlPages\Page\Component\Path;

/**
 * Class Path
 *
 * @package Anomaly\FizlPages\Page\Component\Path
 */
class Path implements \Anomaly\FizlPages\Page\Component\Path\Contract\Path
{
    /**
     * Default namespace
     */
    const DEFAULT_NAMESPACE = 'default';

    /**
     * @var
     */
    protected $path = '';

    /**
     * @param $path
     */
    public function __construct($path = '')
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function toUri()
    {
        $uri = $this->path;
        // Clean uri
        if (preg_match('/::pages\.([a-zA-Z0-9_\.]+)$/', $uri, $match)) {
            $uri = $match[1];
        }
        // replace periods with slashes
        return str_replace('.', '/', $uri);
    }

    /**
     * @return string
     */
    public function toNamespace()
    {
        $namespace = static::DEFAULT_NAMESPACE;
        if (preg_match('/^([a-zA-Z0-9_\.]+)::/', $this->path, $match)) {
            $namespace = $match[1];
        }
        return $namespace;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

}