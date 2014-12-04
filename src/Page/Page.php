<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\Page\Component\Path\Contract\Path;
use Anomaly\FizlPages\Page\Contract\Page as PageContract;
use Anomaly\FizlPages\Page\Event\PageRendered;
use Anomaly\FizlPages\Support\CommanderTrait;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Laracasts\Commander\Events\EventGenerator;

/**
 * Class Page
 *
 * @package Anomaly\FizlPages
 */
class Page implements PageContract
{
    use EventGenerator, CommanderTrait;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var HeaderCollection
     */
    protected $headers;

    /**
     * @var Path
     */
    protected $path;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var View|null
     */
    protected $view;

    /**
     * @var boolean
     */
    protected $missing = false;

    /**
     * Index
     */
    const INDEX = 'index';

    /**
     * Missing
     */
    const MISSING = 'errors.404';

    /**
     * @param Path   $path
     * @param array  $data
     * @param string $namespace
     */
    public function __construct(
        Path $path,
        array $data = [],
        HeaderCollection $headers
    ) {
        $this->path        = $path;
        $this->data        = $data;
        $this->headers     = $headers;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->path->toNamespace();
    }

    /**
     * @return HeaderCollection
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->path->toUri();
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path->toString();
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param View $view
     * @return void
     */
    public function setView(View $view)
    {
        $this->view = $view;
    }

    /**
     * @return string
     */
    public function getIndexPath()
    {
        return $this->getPath() . '.' . static::INDEX;
    }

    /**
     * @return string
     */
    public function getMissingPath()
    {
        return $this->getNamespace() . '::' . static::MISSING;
    }

    /**
     * @param  boolean $missing
     * @return void
     */
    public function setMissing($missing)
    {
        $this->missing = $missing;
    }

    /**
     * @return boolean
     */
    public function isMissing()
    {
        return $this->missing;
    }

}