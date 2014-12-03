<?php namespace Anomaly\FizlPages\Http\Controller;

use Anomaly\FizlPages\Contract\Pages;
use Illuminate\Routing\Controller;

/**
 * Class PageController
 *
 * @package Anomaly\FizlPages\Http\Controller
 */
class PageController extends Controller
{

    /**
     * @param $uri
     * @return mixed
     */
    public function page(Pages $pages, $uri)
    {
        return $pages->render($uri);
    }

} 