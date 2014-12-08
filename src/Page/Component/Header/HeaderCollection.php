<?php namespace Anomaly\FizlPages\Page\Component\Header;

use Anomaly\FizlPages\Page\Component\Header\Contract\Header;
use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection as Headers;
use Illuminate\Support\Collection;
use Laracasts\Commander\Events\EventGenerator;

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
    public function getValue($key, $default = null)
    {
        $value = $default;
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
        return $this->getValue($key);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $headers = $this->items;
        foreach ($headers as &$value) {
            if ($value instanceof Header) {
                $value = $value->getValue();
            }
        }
        return $headers;
    }

}