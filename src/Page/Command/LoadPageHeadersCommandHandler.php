<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Cache\Contract\Cache;
use Anomaly\FizlPages\Page\Component\Header\Header;
use Anomaly\FizlPages\Page\Component\Header\HeaderCollection;
use Anomaly\FizlPages\Page\Event\PageHeadersLoaded;
use Anomaly\FizlPages\Support\CommanderTrait;

/**
 * Class LoadPageHeadersCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class LoadPageHeadersCommandHandler
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
     * @param LoadPageHeadersCommand $command
     * @return \Anomaly\FizlPages\Page\Contract\Page
     */
    public function handle(LoadPageHeadersCommand $command)
    {
        $page = $command->getPage();

        if ($view = $page->getView() and !$page->isMissing()) {
            $view->render();
        }

        $cacheKey = $page->getPath() . '.headers';

        $headers = $this->cache->get($cacheKey) ?: [];

        foreach($headers as $key => $value) {
            $headers[$key] = new Header($key, $value);
        }

        $page->setHeaders(new HeaderCollection($headers));

        //$this->execute(new PushHeadersIntoCollectionCommand($headers, $page->getHeaders()));

        $page->raise(new PageHeadersLoaded($page));

        return $page;
    }

} 