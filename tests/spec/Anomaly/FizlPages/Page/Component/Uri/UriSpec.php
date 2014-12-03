<?php

namespace spec\Anomaly\FizlPages\Page\Component\Uri;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UriSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Anomaly\FizlPages\Page\Component\Uri\Uri');
    }

    function it_should_transform_to_path()
    {
        $this->beConstructedWith('foo/bar');
        $this->toPath()->shouldReturn('default::pages.foo.bar');
    }

    function it_gets_uri_and_namespace()
    {
        $this->beConstructedWith('foo/bar', 'baz');
        $this->toString()->shouldReturn('foo/bar');
        $this->getNamespace()->shouldReturn('baz');
    }
    
}
