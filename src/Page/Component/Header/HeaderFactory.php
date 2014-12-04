<?php namespace Anomaly\FizlPages\Page\Component\Header;

use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\Page\Component\Header\Event\HeaderCreated;

/**
 * Class HeaderFactory
 *
 * @package Anomaly\FizlPages\Page\Component\Header
 */
class HeaderFactory implements \Anomaly\FizlPages\Page\Component\Header\Contract\HeaderFactory
{

    /**
     * @param $key
     * @param $value
     * @return Header
     */
    public function create($key, $value)
    {
        $header = new Header($key, $value);
        $header->raise(new HeaderCreated($header));
        return $header;
    }

}