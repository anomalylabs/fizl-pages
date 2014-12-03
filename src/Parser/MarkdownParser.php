<?php namespace Anomaly\FizlPages\Parser;

use Anomaly\Lexicon\Parser\ParserInterface;
use cebe\markdown\MarkdownExtra;

/**
 * Class MarkdownParser
 *
 * @package Anomaly\FizlPages\Parser
 */
class MarkdownParser implements ParserInterface
{
    /**
     * @var MarkdownExtra
     */
    private $parser;

    /**
     * @param MarkdownExtra $parser
     */
    public function __construct(MarkdownExtra $parser)
    {
        $this->parser = $parser;
    }

    public function parse($string, $path = null)
    {
        return $this->parser->parse($string);
    }

}