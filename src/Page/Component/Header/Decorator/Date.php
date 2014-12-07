<?php namespace Anomaly\FizlPages\Page\Component\Header\Decorator;

use Anomaly\FizlPages\Page\Component\Header\Contract\Decorator;
use Carbon\Carbon;

/**
 * Class Date
 *
 * @package Anomaly\FizlPages\Page\Component\Header\Decorator
 */
class Date implements Decorator
{


    /**
     * @var Carbon
     */
    protected $carbon;

    /**
     * @param Carbon $carbon
     */
    public function __construct(Carbon $carbon)
    {
        $this->carbon = $carbon;
    }

    /**
     * @param $value
     * @return Carbon
     */
    public function decorate($value)
    {
        return $this->carbon->createFromFormat('m/d/Y', $value);
    }
}