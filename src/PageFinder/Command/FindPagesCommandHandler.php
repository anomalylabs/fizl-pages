<?php namespace Anomaly\FizlPages\PageFinder\Command;

use Anomaly\FizlPages\Page\Command\CreatePageCommand;
use Anomaly\FizlPages\Page\Contract\PageCollection;
use Anomaly\FizlPages\Page\Contract\PageFactory;
use Anomaly\FizlPages\PageFinder\Contract\PageFinderFactory;
use Anomaly\FizlPages\PageFinder\Event\PagesFound;
use Anomaly\FizlPages\Support\CommanderTrait;
use Laracasts\Commander\Events\DispatchableTrait;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class FindPagesCommandHandler
 *
 * @package Anomaly\FizlPages\PageFinder\Command
 */
class FindPagesCommandHandler
{
    use CommanderTrait, DispatchableTrait;

    /**
     * @var PageFinderFactory
     */
    protected $pageFinder;

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var PageCollection
     */
    protected $pages;

    /**
     * @param PageFinderFactory $pageFinder
     * @param PageFactory       $pageFactory
     * @param PageCollection    $pages
     */
    public function __construct(
        PageFinderFactory $pageFinder,
        PageFactory $pageFactory,
        PageCollection $pages
    ) {
        $this->pageFinder = $pageFinder;
        $this->pages             = $pages;
    }

    public function handle(FindPagesCommand $command)
    {
        $uri       = $command->getUri();
        $depth     = $command->getDepth();
        $namespace = $command->getNamespace();

        $finder = $this->pageFinder->create($uri, $namespace, $depth);

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {

            $uri = $file->getRelativePathname();

            if ($file->getFilename() == 'index.md') {
                $uri = $file->getRelativePath();
            }

            $uri = str_replace('.md', '', $uri);

            $page = $this->execute(new CreatePageCommand($uri, $namespace));

            $this->pages->put($uri, $page);

            $this->dispatchEventsFor($page);
        }

        $this->pages->raise(new PagesFound($this->pages));

        return $this->pages;
    }

} 