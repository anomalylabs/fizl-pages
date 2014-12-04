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
     * @var HeaderCollection
     */
    protected $headers;

    /**
     * @param HeaderCollection $headers
     */
    public function __construct(HeaderCollection $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return Page
     */
    public function create($path, array $data = [])
    {
        $page = new Page(new Path($path), $data, $this->headers);
        $page->raise(new PageCreated($page));
        return $page;
    }

} 