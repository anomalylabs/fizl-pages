<?php namespace Anomaly\FizlPages\Page\Contract;

use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Illuminate\Contracts\View\View;
use Symfony\Component\Finder\SplFileInfo;

interface Page
{
    /**
     * @return string|null
     */
    public function getNamespace();

    /**
     * @param HeaderCollection $headers
     * @return void
     */
    public function setHeaders(HeaderCollection $headers);

    /**
     * @return View
     */
    public function getView();

    /**
     * @param View $view
     * @return void
     */
    public function setView(View $view);

    /**
     * @return string
     */
    public function getPath();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return void
     */
    public function setContent($content);

    /**
     * @return string
     */
    public function getIndexPath();

    /**
     * @return string
     */
    public function getMissingPath();

    /**
     * @param  boolean $missing
     * @return void
     */
    public function setMissing($missing);

    /**
     * @return boolean
     */
    public function isMissing();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param $event
     * @return mixed
     */
    public function raise($event);

    /**
     * @return array
     */
    public function toArray();

    /**
     * @param string $key
     * @param null   $default
     * @return mixed
     */
    public function get($key, $default = null);

}