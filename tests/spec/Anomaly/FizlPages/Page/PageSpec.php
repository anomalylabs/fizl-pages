<?php namespace spec\Anomaly\FizlPages\Page;

use Anomaly\FizlPages\Page\Component\Header\Header;
use Anomaly\FizlPages\Page\Component\Header\HeaderCollection;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use PhpSpec\Laravel\LaravelObjectBehavior;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageSpec extends LaravelObjectBehavior
{

    public function let(HeaderCollection $headers)
    {
        $this->laravel->app->register('Laracasts\Commander\CommanderServiceProvider');

        $this->beConstructedWith(
            'foo/bar',
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

    function it_sets_namespace()
    {
        $this->beConstructedWith(
            'foo/bar',
            'namespace'
        );

        $this->getNamespace()->shouldBe('namespace');
    }

    function it_gets_namespace_prefix()
    {
        $this->beConstructedWith(
            'foo/bar',
            'namespace'
        );

        $this->getNamespacePrefix()->shouldBe('namespace.');
    }

    function it_gets_path()
    {
        $this->getPath()->shouldBe('fizl::pages.foo.bar');
    }

    function it_gets_namespaced_path()
    {
        $this->beConstructedWith(
            'foo/bar',
            'namespace'
        );

        $this->getPath()->shouldBe('fizl::namespace.pages.foo.bar');
    }

    function it_gets_index_path()
    {
        $this->getIndexPath()->shouldBe('fizl::pages.foo.bar.index');
    }

    function it_gets_namespaced_index_path()
    {
        $this->beConstructedWith(
            'foo/bar',
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
            'foo/bar',
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

    function it_gets_a_header_value()
    {
        $headers->getValue('headerKey', null)->willReturn('headerValue');

        $this->beConstructedWith(
            'foo/bar'
        );

        $this->get('headerKey')->shouldBe('headerValue');
    }
}
