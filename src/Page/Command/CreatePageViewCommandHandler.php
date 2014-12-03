<?php namespace Anomaly\FizlPages\Page\Command;

use Anomaly\FizlPages\Page\Event\PageViewCreated;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class CreatePageViewCommandHandler
 *
 * @package Anomaly\FizlPages\Page\Command
 */
class CreatePageViewCommandHandler
{

    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param CreatePageViewCommand $command
     * @return  View
     */
    public function handle(CreatePageViewCommand $command)
    {
        $page = $command->getPage();

        // Make sure we create the view once
        if (!$page->getView()) {

            try {
                // Attempt to make default view
                $page->setView($this->factory->make($page->getPath()));

            } catch (\InvalidArgumentException $e) {

                // If not, try it as a index within the folder
                $index = $page->getPath() . '.index';

                if ($this->factory->exists($index)) {
                    $page->setView($this->factory->make($index));
                } else {
                    $page->setView($this->factory->make($page->getNamespace().'::errors.404'));
                }
            }

            $page->raise(new PageViewCreated($page));
        }

        return $page->getView();
    }

} 