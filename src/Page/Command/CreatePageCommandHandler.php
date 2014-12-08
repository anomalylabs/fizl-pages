<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Page\Contract\PageFactory;
use Anomaly\FizlPages\Page\Event\PageCreated;

/**
 * Class CreatePageCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class CreatePageCommandHandler 
{

    protected $pageFactory;

    /**
     * @param PageFactory $pageFactory
     */
    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    /**
     * @param CreatePageCommand $command
     * @return mixed
     */
    public function handle(CreatePageCommand $command)
    {
        $page = $this->pageFactory->create($command->getUri(), $command->getNamespace());
        $page->raise(new PageCreated($page));
        return $page;
    }

}