<?php

return [
    /**
     * This is the base path for content where all namespaces live
     */
    'base_path'         => base_path('content'),
    /**
     * Namespaces are folders within the base path. Pages are also queried by namespace.
     */
    'namespaces'        => [
        'default'
    ],
    'home'              => 'home',
    'extension_parsers' => [
        'md' => 'Anomaly\FizlPages\Parser\PageParser',
    ],
    'composers'         => [
        'Anomaly\FizlPages\View\Composer\ConfigViewComposer' => '*',
    ],
];