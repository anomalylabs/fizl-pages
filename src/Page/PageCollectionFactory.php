<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Contract\Pages;
use Anomaly\FizlPages\Page\Component\Path\Path;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class PageCollectionFactory
 *
 * @package Anomaly\FizlPages\Page
 */
class PageCollectionFactory 
{
    use DispatchableTrait;

    /**
     * @var PageCollection
     */
    private $pageCollection;
    /**
     * @var Pages
     */
    private $pages;

    /**
     * @param PageCollection $pageCollection
     * @param PageFactory    $pageFactory
     */
    public function __construct(PageCollection $pageCollection, Pages $pages)
    {
        $this->pageCollection = $pageCollection;
        $this->pages = $pages;
    }

    /**
     * @param array  $uris
     * @param array  $data
     * @param string $namespace
     * @return PageCollection
     */
    public function create(array $uris = [], array $data = [], $namespace = Path::DEFAULT_NAMESPACE)
    {
        foreach($uris as $uri) {
            $pageData = isset($data[$uri]) ? $data[$uri] : [];
            $page = $this->pages->getPage($uri, $pageData, $namespace);
            $this->pageCollection->put($uri, $page);
            $this->dispatchEventsFor($page);
        }
        return $this->pageCollection;
    }

} 