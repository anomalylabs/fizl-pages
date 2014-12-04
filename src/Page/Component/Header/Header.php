<?php namespace Anomaly\FizlPages\Page\Component\Header;

use Laracasts\Commander\Events\EventGenerator;

/**
 * Class Header
 *
 * @package Anomaly\FizlPages\Page\Component\Header
 */
class Header implements \Anomaly\FizlPages\Page\Component\Header\Contract\Header
{
    use EventGenerator;

    /**
     * Cache prefix
     */
    const CACHE_PREFIX = 'page.headers.';

    /**
     * @var string
     */
    protected $key;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param $key
     * @param $value
     */
    public function __construct($key, $value)
    {
        $this->key   = $key;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

} 