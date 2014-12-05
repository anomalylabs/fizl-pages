<?php namespace spec\Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Component\Header\Header;
use Anomaly\FizlPages\Page\Component\Header\HeaderCollection;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageSpec extends ObjectBehavior
{

    public function let(HeaderCollection $headers)
    {
        $this->beConstructedWith(
            $uri = 'foo/bar',
            $headers
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Anomaly\FizlPages\Page\Page');
    }

    function it_gets_uri()
    {
        $this->getUri()->shouldBe('foo/bar');
    }

    function it_gets_namespace(HeaderCollection $headers)
    {
        $this->beConstructedWith(
            $uri = 'foo/bar',
            $headers,
            'namespace'
        );

        $this->getNamespace()->shouldBe('namespace');
    }

    function it_gets_namespace_prefix(HeaderCollection $headers)
    {
        $this->beConstructedWith(
            $uri = 'foo/bar',
            $headers,
            'namespace'
        );

        $this->getNamespacePrefix()->shouldBe('namespace.');
    }

    function it_gets_data(HeaderCollection $headers)
    {
        $this->beConstructedWith(
            $uri = 'foo/bar',
            $headers,
            'namespace',
            ['key' => 'value']
        );

        $this->getData()->shouldBe(['key' => 'value']);
    }

    function it_gets_headers()
    {
        $this
            ->getHeaders()
            ->shouldImplement('Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection');
    }

    function it_gets_path()
    {
        $this->getPath()->shouldBe('fizl::pages.foo.bar');
    }

    function it_gets_namespaced_path(HeaderCollection $headers)
    {
        $this->beConstructedWith(
            $uri = 'foo/bar',
            $headers,
            'namespace'
        );

        $this->getPath()->shouldBe('fizl::namespace.pages.foo.bar');
    }

    function it_gets_index_path()
    {
        $this->getIndexPath()->shouldBe('fizl::pages.foo.bar.index');
    }

    function it_gets_namespaced_index_path(HeaderCollection $headers)
    {
        $this->beConstructedWith(
            $uri = 'foo/bar',
            $headers,
            'namespace'
        );

        $this->getIndexPath()->shouldBe('fizl::namespace.pages.foo.bar.index');
    }

    function it_gets_missing_path()
    {
        $this->getMissingPath()->shouldBe('fizl::errors.404');
    }

    function it_gets_namespaced_missing_path(HeaderCollection $headers)
    {
        $this->beConstructedWith(
            $uri = 'foo/bar',
            $headers,
            'namespace'
        );

        $this->getMissingPath()->shouldBe('fizl::namespace.errors.404');
    }

    function it_sets_and_gets_view(View $view)
    {
        $this->setView($view);
        $this->getView()->shouldImplement('Illuminate\Contracts\View\View');
    }

    function it_sets_and_gets_content()
    {
        $this->setContent('<h1>Hello</h1>');
        $this->getContent()->shouldBe('<h1>Hello</h1>');
    }

    function it_sets_and_checks_if_its_missing()
    {
        $this->setMissing(true);
        $this->isMissing()->shouldBe(true);
    }

    function it_gets_a_header_value(HeaderCollection $headers)
    {
        $headers->getValue('headerKey', null)->willReturn('headerValue');

        $this->beConstructedWith(
            $uri = 'foo/bar',
            $headers
        );

        $this->get('headerKey')->shouldBe('headerValue');
    }
}
