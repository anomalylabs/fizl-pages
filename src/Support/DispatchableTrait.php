<?php namespace Anomaly\FizlPages\Support;

use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Commander\Events\DispatchableTrait as Dispatcher;


/**
 * Class DispatchableTrait
 *
 * @package Anomaly\FizlPages\Support
 */
trait DispatchableTrait
{
    use EventGenerator, Dispatcher;

    /**
     * @param $event
     */
    public function dispatch($event)
    {
        $this->raise($event);
        $this->dispatchEventsFor($this);
    }

} 