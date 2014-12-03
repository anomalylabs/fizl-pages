<?php namespace Anomaly\FizlPages\Page\Component\Header\Command;

use Anomaly\FizlPages\Page\Component\Header\HeaderCollection;
use Anomaly\FizlPages\Page\Component\Header\HeaderFactory;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class PushHeadersIntoCollectionCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Component\Header\Command
 */
class PushHeadersIntoCollectionCommandHandler
{
    use DispatchableTrait;

    /**
     * @var HeaderFactory
     */
    protected $headerFactory;

    public function __construct(HeaderFactory $headerFactory)
    {
        $this->headerFactory = $headerFactory;
    }

    /**
     * @param PushHeadersIntoCollectionCommand $command
     */
    public function handle(PushHeadersIntoCollectionCommand $command)
    {
        foreach ($command->getHeaders() as $key => $value) {
            $header = $this->headerFactory->create($key, $value);
            $command->getCollection()->put($key, $header);
            $this->dispatchEventsFor($header);
        }
    }

} 