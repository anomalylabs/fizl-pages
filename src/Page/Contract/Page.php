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
    public function render();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return void
     */
    public function setContent($content);

    /**
     * @param $event
     * @return mixed
     */
    public function raise($event);

}