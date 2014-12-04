<?php namespace Anomaly\FizlPages\PageFinder;

use Anomaly\FizlPages\Page\Component\Path\Path;
use Anomaly\FizlPages\Page\Component\Uri\Uri;
use Anomaly\FizlPages\Page\PageCollection;
use Anomaly\FizlPages\Page\PageCollectionFactory;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class PageFinder
 *
 * @package Anomaly\FizlPages\PageFinder
 */
class PageFinder
{
    /**
     * @var Finder
     */
    protected $finder;
    /**
     * @var PageCollectionFactory
     */
    private $collectionFactory;

    /**
     * @param Finder $finder
     */
    public function __construct(Finder $finder, PageCollectionFactory $collectionFactory)
    {
        $this->finder = $finder;
        $this->collectionFactory = $collectionFactory;
    }

    public function find($uri, $depth = 1, $namespace = Path::DEFAULT_NAMESPACE)
    {
        return $this->getCollection($uri, $depth, $namespace);
    }

    protected function getCollection($path, $depth = 1, $namespace = Path::DEFAULT_NAMESPACE)
    {
        if ($path === '/') {
            $path = '';
        }

        $basePath = config('fizl-pages::base_path');

        $filter = function (SplFileInfo $file) use ($depth) {
            $include = true;
            if (substr_count($file->getRelativePathname(), '/') >= $depth and
                $file->getFilename() != 'index.md'
            ) {
                $include = false;
            }
            return $include;
        };

        $depth++;

        $iterator = $this->finder
            ->files()
            ->filter($filter)
            ->depth("< {$depth}")
            ->name('*.md')
            ->in("{$basePath}/{$namespace}/pages/{$path}");

        $uris = [];

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            $uri = $file->getRelativePathname();

            if ($file->getFilename() == 'index.md') {
                $uri = $file->getRelativePath();
            }

            $uri = str_replace('.md', '', $uri);

            $uris[] = $uri;
        }

        return $this->collectionFactory->create($uris);
    }

} 