<?php namespace Anomaly\FizlPages\Page\Contract;

use Anomaly\FizlPages\Page\Component\Header\HeaderCollection;
use Illuminate\Contracts\View\View;

interface Page
{

    /**
     * @return array
     */
    public function getData();

    /**
     * @return mixed
     */
    public function getNamespace();


    /**
     * @return HeaderCollection
     */
    public function getHeaders();

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
     * @param $event
     * @return mixed
     */
    public function raise($event);

}