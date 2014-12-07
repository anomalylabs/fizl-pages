<?php namespace Anomaly\FizlPages;

use Anomaly\FizlPages\Page\Command\RenderPageCommand;
use Anomaly\FizlPages\Page\Component\Path\Path;
use Anomaly\FizlPages\Page\Component\Uri\Uri;
use Anomaly\FizlPages\Page\Contract\PageFactory;
use Anomaly\FizlPages\PageFinder\Command\FindPagesCommand;
use Anomaly\FizlPages\PageFinder\Event\PagesFound;
use Anomaly\FizlPages\Support\CommanderTrait;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class Pages
 *
 * @package Anomaly\FizlPages
 */
class Pages implements \Anomaly\FizlPages\Contract\Pages
{
    use CommanderTrait;

    use DispatchableTrait;

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @param PageFactory $pageFactory
     */
    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    /**
     * @param        $uri
     * @param array  $data
     * @param string $namespace
     * @return string
     */
    public function render($uri, $namespace = null, array $data = [])
    {
        $page = $this->getPage($uri, $namespace, $data);
        $this->execute(new RenderPageCommand($page));
        $this->dispatchEventsFor($page);
        return $page->getContent();
    }

    /**
     * @param        $uri
     * @param array  $data
     * @param string $namespace
     * @return Page\Page
     */
    public function getPage($uri, $namespace = null, array $data = [])
    {
        $page = $this->pageFactory->create($uri, $namespace, $data);
        $this->dispatchEventsFor($page);
        return $page;
    }


    /**
     * @param        $uri
     * @param null   $namespace
     * @param int    $depth
     * @param string $orderBy
     * @param bool   $descending
     * @return mixed
     */
    public function getPages(
        $uri,
        $namespace = null,
        $depth = 1,
        $orderBy = 'uri',
        $descending = false,
        $limit = null
    ) {
        $pages = $this->execute(
            new FindPagesCommand(
                $uri,
                $namespace,
                $depth,
                $orderBy,
                $descending,
                $limit
            )
        );

        $this->dispatchEventsFor($pages);

        return $pages;
    }
}