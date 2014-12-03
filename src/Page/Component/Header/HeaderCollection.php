<?php namespace Anomaly\FizlPages\Page\Component\Header;

use Illuminate\Support\Collection;
use Laracasts\Commander\Events\EventGenerator;
use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection as Headers;

/**
 * Class HeadersCollection
 *
 * @package Anomaly\FizlPages\Page\Component\Header
 */
class HeaderCollection extends Collection implements Headers
{
    use EventGenerator;

    /**
     * @param $key
     * @return null
     */
    public function getHeaderValue($key)
    {
        $value = null;

        if ($header = $this->get($key)) {
            $value = $header->getValue();
        }

        return $value;
    }

    /**
     * @param $key
     * @return null
     */
    public function __get($key)
    {
        return $this->getHeaderValue($key);
    }

}