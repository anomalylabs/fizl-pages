<?php namespace Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Component\Header\Command\DecorateHeaderCommand;
use Anomaly\FizlPages\Page\Component\Header\Contract\Header;
use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\Page\Component\Path\Contract\Path;
use Anomaly\FizlPages\Page\Contract\Page as PageContract;
use Anomaly\FizlPages\Support\CommanderTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
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
     * @var HeaderCollection
     */
    protected $headers;

    /**
     * @var string
     */
    protected $uri;

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
     * @var string|null
     */
    protected $namespace;

    /**
     * @param                  $uri
     * @param HeaderCollection $headers
     * @param null             $namespace
     * @param array            $data
     */
    public function __construct(
        $uri,
        $namespace = null
    ) {
        $this->uri       = $uri;
        $this->namespace = $namespace;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return string|null
     */
    public function getNamespacePrefix()
    {
        if ($namespace = str_replace(['/', '.'], '_', $this->getNamespace())) {
            $namespace .= '.';
        }
        return $namespace;
    }

    /**
     * @param HeaderCollection $headers
     */
    public function setHeaders(HeaderCollection $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return HeaderCollection
     */
    protected function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        $uri = str_replace('/', '.', $this->getUri());
        return "fizl::{$this->getNamespacePrefix()}pages.{$uri}";
    }

    /**
     * @return \Illuminate\Contracts\View\View|null
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
        return $this->getPath() . '.index';
    }

    /**
     * @return string
     */
    public function getMissingPath()
    {
        return "fizl::{$this->getNamespacePrefix()}errors.404";
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

    /**
     * @return string
     */
    public function getTitle()
    {
        $segments = explode('/', $this->getUri());
        $last = $segments[count($segments)-1];
        return $this->get('title', str_replace(['-', '-'], ' ', Str::title($last)));
    }

    /**
     * @param Header $header
     */
    public function addHeader(Header $header)
    {
        if ($headers = $this->getHeaders()) {
            $headers->put($header->getKey(), $header);
        }
    }

    /**
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $value = $default;

        if ($headers = $this->getHeaders()) {
            $value = $headers->getValue($key, $default);
        }

        return $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        $method = 'get'. Str::studly($key);

        if (method_exists($this, $method)) {
            return $method();
        }

        return $this->get($key);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'title' => $this->getTitle(),
            'uri' => $this->getUri(),
            'path' => $this->getPath(),
            'namespace' => $this->getNamespace(),
            'headers' => $this->getHeaders()->toArray(),
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function __toString()
    {
        return $this->toJson();
    }
}