<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Cache\Contract\Cache;
use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderFactory;
use Anomaly\FizlPages\Page\Component\Header\Header;
use Anomaly\FizlPages\Page\Event\HeadersLoadedToPage;
use Anomaly\FizlPages\Support\CommanderTrait;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class LoadHeadersToPageCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class LoadHeadersToPageCommandHandler
{
    use CommanderTrait, DispatchableTrait;

    /**
     * @var Cache
     */
    protected $cache;
    /**
     * @var HeaderFactory
     */
    private $headerFactory;

    /**
     * @param Cache $cache
     */
    public function __construct(HeaderFactory $headerFactory, Cache $cache)
    {
        $this->cache         = $cache;
        $this->headerFactory = $headerFactory;
    }

    /**
     * @param LoadHeadersToPageCommand $command
     * @return \Anomaly\FizlPages\Page\PageInterface
     */
    public function handle(LoadHeadersToPageCommand $command)
    {
        $page = $command->getPage();

        $page->render();

        $cacheKey = Header::CACHE_PREFIX . $page->getPath();

        $headers = $this->cache->get($cacheKey) ?: [];

        foreach ($headers as $key => $value) {
            $header = $this->headerFactory->create($key, $value);
            $page->getHeaders()->put($key, $header);
            $this->dispatchEventsFor($header);
        }

        $page->raise(new HeadersLoadedToPage($page));

        return $page;
    }

} 