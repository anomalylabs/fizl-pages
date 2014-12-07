<?php

namespace spec\Anomaly\FizlPages\PageFinder\Command;

use Anomaly\FizlPages\Page\Component\Header\HeaderCollection;
use Anomaly\FizlPages\Page\PageCollection;
use Anomaly\FizlPages\Page\PageFactory;
use Anomaly\FizlPages\PageFinder\Command\FindPagesCommand;
use Anomaly\FizlPages\PageFinder\PageFinderFactory;
use PhpSpec\Laravel\LaravelObjectBehavior;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Finder\Finder;

class FindPagesCommandHandlerSpec extends LaravelObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            new PageFinderFactory(new Finder(), __DIR__ . '/../../../../../content'),
            new PageFactory(new HeaderCollection()),
            new PageCollection()
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Anomaly\FizlPages\PageFinder\Command\FindPagesCommandHandler');
    }

    function it_gets_page_collection(FindPagesCommand $command)
    {
        $this->handle($command)->shouldHaveType('Anomaly\FizlPages\Page\PageCollection');
    }
}
