<?php

return [
    /**
     * This is the base path for content where all namespaces live
     */
    'base_path'         => base_path('content'),
    'home'              => 'home',
    'page_sorters' => [
        'uri' => 'Anomaly\FizlPages\PageFinder\Sorter\UriSorter',
        'date' => 'Anomaly\FizlPages\PageFinder\Sorter\DateSorter',
    ],
    'page_header_decorators' => [
        'date' => 'Anomaly\FizlPages\Page\Component\Header\Decorator\Date'
    ],
    'extension_parsers' => [
        'md' => 'Anomaly\FizlPages\Parser\PageParser',
    ],
    'composers'         => [
        'Anomaly\FizlPages\View\Composer\ConfigViewComposer' => '*',
    ],
];