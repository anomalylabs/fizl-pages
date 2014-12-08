<?php namespace Anomaly\FizlPages\PageFinder\Command;

/**
 * Class FindPagesCommand
 *
 * @package Anomaly\FizlPages\PageFinder\Command
 */
class FindPagesCommand
{

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var null|string
     */
    protected $namespace;

    /**
     * @var null|string
     */
    protected $orderBy;

    /**
     * @var null|int
     */
    protected $limit;

    /**
     * @var int
     */
    protected $depth;

    /**
     * @var int
     */
    protected $descending;

    /**
     * @param      $uri
     * @param null $namespace
     * @param int  $depth
     */
    public function __construct(
        $uri,
        $namespace = null,
        $depth = 1
    ) {
        $this->uri       = $uri;
        $this->namespace = $namespace;
        $this->depth     = $depth;
    }

    /**
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @return int
     */
    public function getDescending()
    {
        return $this->descending;
    }

    /**
     * @return null|int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return null|string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return null|string
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @return null|string
     */
    public function getUri()
    {
        return $this->uri;
    }

} 