<?php namespace Anomaly\FizlPages\Page\Component\Uri;

use Anomaly\FizlPages\Page\Component\Path\Path;

/**
 * Class Uri
 *
 * @package Anomaly\FizlPages\Uri
 */
class Uri implements \Anomaly\FizlPages\Page\Component\Uri\Contract\Uri
{

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var string
     */
    protected $namespace;

    /**
     * @param        $uri
     * @param string $namespace
     */
    public function __construct($uri = '', $namespace = Path::DEFAULT_NAMESPACE)
    {
        $this->uri       = $uri;
        $this->namespace = $namespace;
    }

    /**
     * @return string
     */
    public function toPath()
    {
        return str_replace('/', '.', $this->namespace . '::pages.' . $this->toString());
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function toString()
    {
        if ($this->uri == '' or $this->uri == '/') {
            $this->uri = config('fizl-pages::home');
        }

        return $this->uri;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

}