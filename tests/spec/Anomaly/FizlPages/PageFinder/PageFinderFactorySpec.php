<?php namespace spec\Anomaly\FizlPages\PageFinder;

use PhpSpec\Laravel\LaravelObjectBehavior;
use Symfony\Component\Finder\Finder;

class PageFinderFactorySpec extends LaravelObjectBehavior
{

    function let(Finder $finder)
    {
        $this->beConstructedWith(new Finder(), realpath(__DIR__ . '/../../../../content'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Anomaly\FizlPages\PageFinder\PageFinderFactory');
    }

    function it_creates_finder()
    {
        $this->create('/')->shouldHaveType('Symfony\Component\Finder\Finder');
    }

}
