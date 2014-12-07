<?php namespace Anomaly\FizlPages\Page;

/**
 * Class PageHelper
 *
 * @package Anomaly\FizlPages\Page
 */
class PageHelper
{

    public static function filePathToViewPath($filePath)
    {
        $basePath = preg_quote(config('fizl-pages::base_path'), '/');

        preg_match("/{$basePath}\/([a-zA-Z0-9\/\_\-]+)\.(\w+)$/", $filePath, $match);

        return 'fizl::' . str_replace('/', '.', $match[1]);
    }

}