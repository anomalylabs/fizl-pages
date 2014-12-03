<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\Page\Component\Path\Path;
use Anomaly\FizlPages\Page\Event\PageCreated;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Laracasts\Commander\Events\EventGenerator;

/**
 * Class PageFactory
 *
 * @package Anomaly\FizlPages\Page
 */
class PageFactory implements \Anomaly\FizlPages\Page\Contract\PageFactory
{
    /**
     * @var Page
     */
    protected $page;

    /**
     * @var HeaderCollection
     */
    protected $headers;

    /**
     * @var ViewFactory
     */
    protected $view;

    /**
     * @param HeaderCollection $headers
     */
    public function __construct(HeaderCollection $headers, ViewFactory $view)
    {
        $this->headers = $headers;
        $this->view    = $view;
    }

    /**
     * @return Page
     */
    public function create($path, array $data = [])
    {
        $page = new Page(new Path($path), $data, $this->headers, $this->view);
        $page->raise(new PageCreated($page));
        return $page;
    }

} 