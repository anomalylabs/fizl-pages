<?php namespace Anomaly\FizlPages;

use Anomaly\FizlPages\Page\Component\Path\Path;
use Anomaly\FizlPages\Page\Component\Uri\Uri;
use Anomaly\FizlPages\Page\Contract\PageFactory;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class Pages
 *
 * @package Anomaly\FizlPages
 */
class Pages implements \Anomaly\FizlPages\Contract\Pages
{
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
    public function render($uri, array $data = [], $namespace = Path::DEFAULT_NAMESPACE)
    {
        $page = $this->getPage($uri, $data, $namespace);

        $content = $page->render();

        $this->dispatchEventsFor($page);

        return $content;
    }

    /**
     * @param        $uri
     * @param array  $data
     * @param string $namespace
     * @return Page\Page
     */
    public function getPage($uri, array $data = [], $namespace = Path::DEFAULT_NAMESPACE)
    {
        $uri = new Uri($uri, $namespace);

        $page = $this->pageFactory->create($uri->toPath(), $data);

        $this->dispatchEventsFor($page);

        return $page;
    }

    public function getPages()
    {

    }

}