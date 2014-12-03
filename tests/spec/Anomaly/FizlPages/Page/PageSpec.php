<?php

namespace spec\Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\Page\Component\Path\Contract\Path;
use Illuminate\Contracts\View\Factory as ViewFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageSpec extends ObjectBehavior
{

    public function let(Path $path, HeaderCollection $headers, ViewFactory $view)
    {
        $this->beConstructedWith($path, [], $headers, $view);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Anomaly\FizlPages\Page\Page');
    }


}
