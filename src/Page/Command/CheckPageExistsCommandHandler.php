<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Page\PageFactory;
use Illuminate\Contracts\View\Factory;

/**
 * Class CheckPageExistsCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class CheckPageExistsCommandHandler 
{
    /**
     * @var Factory
     */
    protected $view;
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @param Factory $view
     */
    public function __construct(Factory $view, PageFactory $pageFactory)
    {
        $this->view = $view;
        $this->pageFactory = $pageFactory;
    }

    public function handle(CheckPageExistsCommand $command)
    {
        $page = $this->pageFactory->create($command->getUri(), $command->getNamespace());

        if (!$exist = $this->view->exists($page->getPath())) {
            $exist = $this->view->exists($page->getIndexPath());
        }

        return $exist;
    }

} 