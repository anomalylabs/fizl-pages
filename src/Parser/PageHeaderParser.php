<?php namespace Anomaly\FizlPages\Parser;

use Anomaly\FizlPages\Cache\Contract\Cache;
use Anomaly\FizlPages\Page\Component\Header\Command\PushHeadersIntoCollectionCommand;
use Anomaly\FizlPages\Page\Component\Header\Contract\HeaderCollection;
use Anomaly\FizlPages\Page\PageHelper;
use Anomaly\FizlPages\Support\CommanderTrait;
use Anomaly\Lexicon\Parser\ParserInterface;
use Carbon\Carbon;
use Symfony\Component\Finder\SplFileInfo;
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

        $file = new SplFileInfo($path, '', '');

        $date = Carbon::createFromTimestamp($file->getMTime());

        $dateFormat = config('fizl-pages::date_format', 'm/d/Y g:ia');

        $headers['date_modified'] = $date->toDateTimeString();

        if (isset($headers['date'])) {
            try {
                $headers['date'] = Carbon::createFromFormat($dateFormat, $headers['date'])->toDateTimeString();
            } catch (\InvalidArgumentException $e) {
                $headers['date'] = $headers['date_modified'];
                //dd($e->getMessage());
            }
        } else {
            $headers['date'] = $headers['date_modified'];
        }

        $this->execute(new PushHeadersIntoCollectionCommand($headers, $this->headers));

        $viewPath = PageHelper::filePathToViewPath($path);

        $cacheKey = "{$viewPath}.headers";
        $this->cache->put($cacheKey, $headers);

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