<?php namespace Anomaly\FizlPages\Cache;

use Anomaly\FizlPages\Support\KeyTrait;
use Illuminate\Cache\CacheManager;
use Illuminate\Cache\StoreInterface;

/**
 * Class CacheRepository
 *
 * @package Anomaly\FizlPages\Cache\CacheRepository
 */
class Cache implements \Anomaly\FizlPages\Cache\Contract\Cache
{
    use KeyTrait;

    /**
     * @var StoreInterface
     */
    protected $cache;

    /**
     *
     */
    const PREFIX_HEADERS = 'page.headers';

    /**
     * @param CacheManager $cache
     */
    public function __construct(CacheManager $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param $key
     * @param $value
     */
    public function forever($key, $value)
    {
        $this->cache->forever($this->key($key), $value);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->cache->get($this->key($key));
    }

    /**
     * @param      $key
     * @param      $value
     * @param null $expiresAt
     */
    public function put($key, $value, $expiresAt = null)
    {
        $this->cache->forever($this->key($key), $value);
    }

    /**
     * @param $key
     */
    public function forget($key)
    {
        $this->cache->forget($this->key($key));
    }

    /**
     *
     */
    public function flush()
    {
        $this->cache->flush();
    }
}