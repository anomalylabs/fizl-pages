<?php

return [
    /**
     * This is the base path for content where all namespaces live
     */
    'base_path'              => base_path('content'),
    /**
     * Home default uri is "home" but can be changed to a custom uri.
     */
    'home'                   => 'home',
    /**
     * Date format
     */
    'date_format'            => 'm/d/Y g:ia',
    /**
     * Page sorting is done by the PageHeaderSorter by default, which uses page header values
     * automatically, however you want want to sort by other page criteria. All you have to do
     * is bind a page sorter class to a sort by key. The sorter has to implement the PageSorter
     * interface which expects a sortBy(Page $page, $key), that receives the page object and sort
     * by key giving you an opportunity to define the page value used to sort.
     */
    'page_sorters'           => [
        'title' => 'Anomaly\FizlPages\PageFinder\Sorter\TitleSorter',
    ],
    /**
     * Experimental
     */
    'page_header_decorators' => [
        'date' => 'Anomaly\FizlPages\Page\Component\Header\Decorator\Date'
    ],
    /**
     * Extension parsers. @todo - explain
     */
    'extension_parsers'      => [
        'md' => 'Anomaly\FizlPages\Parser\PageParser',
    ],
    /**
     * View composers allows you to modify the view object before the page is rendered.
     * This gives you an opportunity to attach data.
     */
    'composers'              => [
        'Anomaly\FizlPages\View\Composer\ConfigViewComposer' => '*',
    ],
];