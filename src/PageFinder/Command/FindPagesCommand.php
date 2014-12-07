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
     * @param null $orderBy
     * @param int  $descending
     * @param null $limit
     */
    public function __construct(
        $uri,
        $namespace = null,
        $depth = 1,
        $orderBy = null,
        $descending = 0,
        $limit = null
    ) {
        $this->uri        = $uri;
        $this->namespace  = $namespace;
        $this->orderBy    = $orderBy;
        $this->limit      = $limit;
        $this->depth      = $depth;
        $this->descending = $descending;
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