<?php namespace Anomaly\FizlPages\Parser;

use Anomaly\FizlPages\Cache\Contract\Cache;
use Anomaly\FizlPages\Page\Component\Header\Command\PushHeadersIntoCollectionCommand;
use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\Page\Component\Header\Header;
use Anomaly\FizlPages\Support\CommanderTrait;
use Anomaly\Lexicon\Parser\ParserInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Class HeaderMetaParser
 *
 * @package Anomaly\FizlPages\Parser
 */
class PageHeaderParser implements ParserInterface
{
    use CommanderTrait;

    /**
     * @var Yaml
     */
    protected $yaml;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @var HeaderCollection
     */
    protected $headers;

    /**
     * @param Yaml  $yaml
     * @param Cache $cache
     */
    public function __construct(Yaml $yaml, Cache $cache, HeaderCollection $headers)
    {
        $this->yaml    = $yaml;
        $this->cache   = $cache;
        $this->headers = $headers;
    }

    /**
     * @param      $string
     * @param null $path
     * @return string
     */
    public function parse($string, $path = null)
    {
        $headers = [];

        $parts = preg_split('/[\n]*[-]{3}[\n]/', $string, 3);

        if (count($parts) == 3) {
            $string  = $parts[0] . "\n" . $parts[2];
            $headers = $this->yaml->parse($parts[1]);
        }

        $this->execute(new PushHeadersIntoCollectionCommand($headers, $this->headers));

        $shortPath = str_replace('.md', '', str_replace(config('fizl-pages::base_path') . '/', '', $path));

        $pathParts = explode('/', $shortPath);

        if (count($pathParts) == 3) {
            $cacheKey = Header::CACHE_PREFIX . $pathParts[0] . '::pages.' . $pathParts[2];
            $this->cache->put($cacheKey, $headers);
        }

        return $string;
    }

    /**
     * @param      $key
     * @param null $default
     */
    public function getValue($key, $default = null)
    {
        return $this->headers->getValue($key, $default);
    }

}