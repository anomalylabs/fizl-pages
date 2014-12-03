<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Cache\Contract\Cache;
use Anomaly\FizlPages\Page\Component\Header\Command\PushHeadersIntoCollectionCommand;
use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderFactory;
use Anomaly\FizlPages\Page\Component\Header\Header;
use Anomaly\FizlPages\Page\Event\HeadersLoadedToPage;
use Anomaly\FizlPages\Support\CommanderTrait;

/**
 * Class LoadHeadersToPageCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class LoadHeadersToPageCommandHandler
{
    use CommanderTrait;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @param Cache $cache
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param LoadHeadersToPageCommand $command
     * @return \Anomaly\FizlPages\Page\Contract\Page
     */
    public function handle(LoadHeadersToPageCommand $command)
    {
        $page = $command->getPage();

        $page->render();

        $cacheKey = Header::CACHE_PREFIX . $page->getPath();

        $headers = $this->cache->get($cacheKey) ?: [];

        $this->execute(new PushHeadersIntoCollectionCommand($headers, $page->getHeaders()));

        $page->raise(new HeadersLoadedToPage($page));

        return $page;
    }

} 