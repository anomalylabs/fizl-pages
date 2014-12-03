<?php namespace Anomaly\FizlPages\Page\Component\Header\Command;

use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;

/**
 * Class PushHeadersIntoCollectionCommand
 *
 * @package Anomaly\FizlPages\Page\Component\Header\Command
 */
class PushHeadersIntoCollectionCommand
{

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var HeaderCollection
     */
    protected $collection;

    /**
     * @param array $headers
     */
    public function __construct(array $headers = [], HeaderCollection $collection)
    {
        $this->headers = $headers;
        $this->collection = $collection;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return HeaderCollection
     */
    public function getCollection()
    {
        return $this->collection;
    }

} 