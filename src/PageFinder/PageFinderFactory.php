<?php namespace Anomaly\FizlPages\PageFinder;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class PageFinderFactory
 *
 * @package Anomaly\FizlPages\PageFinder
 */
class PageFinderFactory implements \Anomaly\FizlPages\PageFinder\Contract\PageFinderFactory
{

    /**
     * @var string
     */
    protected $basePath;

    /**
     * @param $basePath
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * @param      $uri
     * @param null $namespace
     * @param int  $depth
     * @return Finder
     */
    public function create($uri, $namespace = null, $depth = 1)
    {
        $path = ($uri === '/') ? '' : $uri;

        $namespace = $namespace ? "{$namespace}/" : $namespace;

        $depth++;

        $finder = new Finder();

        $filter = function (SplFileInfo $file) use ($depth) {
            $include = true;
            if (substr_count($file->getRelativePathname(), '/') >= $depth and
                $file->getFilename() != 'index.md'
            ) {
                $include = false;
            }
            return $include;
        };

        $finder
            ->files()
            ->filter($filter)
            ->depth("< {$depth}")
            ->name('*.md')
            ->in(realpath("{$this->basePath}/{$namespace}pages/{$path}"));

        return $finder;
    }

} 