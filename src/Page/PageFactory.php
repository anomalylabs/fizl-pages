<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\Page\Component\Path\Path;
use Anomaly\FizlPages\Page\Component\Uri\Uri;
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
     * @param       $uri
     * @param null  $namespace
     * @param array $data
     * @return Contract\Page|Page
     */
    public function create($uri, $namespace = null)
    {
        return new Page($uri, $namespace);
    }


} 