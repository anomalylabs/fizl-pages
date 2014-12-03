<?php

namespace spec\Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Illuminate\Contracts\View\Factory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageFactorySpec extends ObjectBehavior
{
    function let(HeaderCollection $headers, Factory $view)
    {
        $this->beConstructedWith($headers, $view);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Anomaly\FizlPages\Page\PageFactory');
    }

    function it_creates_a_page()
    {
        $this->create('en::home', ['foo' => 'bar'])->shouldImplement('\Anomaly\FizlPages\Page\Contract\Page');
    }
}
