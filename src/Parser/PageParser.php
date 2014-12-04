<?php namespace Anomaly\FizlPages\Parser;

use Anomaly\Lexicon\Parser\LexiconParser;
use Laracasts\Commander\Events\EventGenerator;

/**
 * Class PageParser
 *
 * @package Anomaly\FizlPages\Parser
 */
class PageParser
{
    use EventGenerator;

    /**
     * @var PageHeaderParser
     */
    protected $headers;

    /**
     * @var MarkdownParser
     */
    protected $markdown;

    /**
     * @var LexiconParser
     */
    protected $lexicon;

    /**
     * @param PageHeaderParser $headers
     * @param MarkdownParser   $markdown
     * @param LexiconParser    $lexicon
     */
    public function __construct(
        PageHeaderParser $headers,
        MarkdownParser $markdown,
        LexiconParser $lexicon
    ) {
        $this->headers  = $headers;
        $this->markdown = $markdown;
        $this->lexicon  = $lexicon;
    }

    public function parse($string, $path = null)
    {
        $string = $this->headers->parse($string, $path);
        $string = $this->markdown->parse($string, $path);

        if ($this->headers->getValue('lexicon', false)) {
            $string = $this->lexicon->parse($string, $path);
        }

        return $string;
    }

} 