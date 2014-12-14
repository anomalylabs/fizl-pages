<?php namespace Anomaly\FizlPages;

use Anomaly\FizlPages\Page\Command\CheckPageExistsCommand;
use Anomaly\FizlPages\Page\Command\CreatePageCommand;
use Anomaly\FizlPages\Page\Command\RenderPageCommand;
use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\PageFinder\Command\FindPagesCommand;
use Anomaly\FizlPages\PageFinder\Command\SortPagesCommand;
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
     * @var string|null
     */
    protected $sortBy;

    /**
     * @var bool
     */
    protected $descending = true;

    /**
     * @var int
     */
    protected $depth = 1;

    /**
     * @var string|null
     */
    protected $namespace;

    /**
     * @param string $sortBy
     * @param bool   $descending
     * @return $this
     */
    public function sortBy($sortBy, $descending = true)
    {
        $this->sortBy     = $sortBy;
        $this->descending = $descending;
        return $this;
    }

    /**
     * @param int $depth
     */
    public function depth($depth = 1)
    {
        $this->depth = $depth;
        return $this;
    }

    /**
     * In namespace
     *
     * @param null $namespace
     * @return $this
     */
    public function in($namespace = null)
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * @param        $uri
     * @param array  $data
     * @param string $namespace
     * @return string
     */
    public function render($uri = '/')
    {
        $page = $this->find($uri);
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
    public function find($uri = '/')
    {
        $page = $this->execute(new CreatePageCommand($uri, $this->namespace));
        $this->dispatchEventsFor($page);
        return $page;
    }

    /**
     * @param        $uri
     * @param null   $namespace
     * @param int    $depth
     * @param string $sortBy
     * @param bool   $descending
     * @return mixed
     */
    public function get($uri = '/')
    {
        /** @var HeaderCollection $pages */
        $pages = $this->execute(
            new FindPagesCommand(
                $uri,
                $this->namespace,
                $this->depth
            )
        );

        $this->execute(new SortPagesCommand($pages, $this->sortBy, $this->descending, config('fizl-pages::page_sorters')));

        $this->dispatchEventsFor($pages);

        return $pages;
    }

    /**
     * @param string $uri
     * @return boolean
     */
    public function exists($uri = '/')
    {
        return $this->execute(new CheckPageExistsCommand($uri, $this->namespace));
    }

}
