<?php

namespace spec\Anomaly\FizlPages\Page\Component\Path;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Anomaly\FizlPages\Page\Component\Path\Path');
    }

    function it_transforms_path_to_uri()
    {
        $this->beConstructedWith('yin.yang');
        $this->toUri()->shouldReturn('yin/yang');
    }

    function it_transforms_namespaced_path_to_uri()
    {
        $this->beConstructedWith('foo.bar::yin.yang');
        $this->toUri()->shouldReturn('yin/yang');
    }

    function it_removes_index_when_transforming_to_uri()
    {
        $this->beConstructedWith('foo.bar::yin.yang.index');
        $this->toUri()->shouldReturn('yin/yang');
    }
    
    function it_transforms_path_to_namespace()
    {
        $this->beConstructedWith('foo.bar::yin.yang');
        $this->toNamespace()->shouldReturn('foo.bar');
    }

    function it_transforms_to_default_namespace()
    {
        $this->beConstructedWith('yin.yang');
        $this->toNamespace('yin.yang')->shouldReturn('default');
    }

}
