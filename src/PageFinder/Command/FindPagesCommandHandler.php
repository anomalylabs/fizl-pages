<?php namespace Anomaly\FizlPages\PageFinder\Command;

use Anomaly\FizlPages\Page\Contract\PageCollection;
use Anomaly\FizlPages\Page\Contract\PageFactory;
use Anomaly\FizlPages\PageFinder\Contract\PageFinderFactory;
use Anomaly\FizlPages\PageFinder\Event\PagesFound;
use Laracasts\Commander\Events\DispatchableTrait;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class FindPagesCommandHandler
 *
 * @package Anomaly\FizlPages\PageFinder\Command
 */
class FindPagesCommandHandler
{
    use DispatchableTrait;

    /**
     * @var PageFinderFactory
     */
    protected $pageFinderFactory;

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var PageCollection
     */
    protected $pages;

    /**
     * @param PageFinderFactory $pageFinderFactory
     * @param PageFactory       $pageFactory
     * @param PageCollection    $pages
     */
    public function __construct(
        PageFinderFactory $pageFinderFactory,
        PageFactory $pageFactory,
        PageCollection $pages
    ) {
        $this->pageFinderFactory = $pageFinderFactory;
        $this->pageFactory       = $pageFactory;
        $this->pages             = $pages;
    }

    public function handle(FindPagesCommand $command)
    {
        $uri       = $command->getUri();
        $namespace = $command->getNamespace();

        $finder = $this->pageFinderFactory->create($uri, 1, $namespace);

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {

            $uri = $file->getRelativePathname();

            if ($file->getFilename() == 'index.md') {
                $uri = $file->getRelativePath();

                dd($uri);
            }

            $uri = str_replace('.md', '', $uri);

            $page = $this->pageFactory->create($uri, $namespace);

            $this->dispatchEventsFor($page);

            $this->pages->put($uri, $page);
        }

        $this->pages->raise(new PagesFound($this->pages));

        return $this->pages;
    }

} 