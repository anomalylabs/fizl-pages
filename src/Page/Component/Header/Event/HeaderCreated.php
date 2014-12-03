<?php namespace Anomaly\FizlPages\Page\Component\Header\Event;

use Anomaly\FizlPages\Page\Component\Header\Header;

/**
 * Class HeaderCreated
 *
 * @package Anomaly\FizlPages\Page\Component\Header\Event
 */
class HeaderCreated 
{

    /**
     * @var Header
     */
    protected $header;

    public function __construct(Header $header)
    {
        $this->header = $header;
    }

    /**
     * @return Header
     */
    public function getHeader()
    {
        return $this->header;
    }

} 