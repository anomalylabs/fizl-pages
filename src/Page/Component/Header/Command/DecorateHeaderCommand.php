<?php namespace Anomaly\FizlPages\Page\Component\Header\Command;

/**
 * Class DecorateHeaderCommand
 *
 * @package Anomaly\FizlPages\Page\Component\Header\Command
 */
class DecorateHeaderCommand 
{

    private $key;
    private $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return string
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