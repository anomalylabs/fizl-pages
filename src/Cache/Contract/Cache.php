<?php namespace Anomaly\FizlPages\Cache\Contract;

/**
 * Interface Cache
 *
 * @package Anomaly\FizlCore\Cache\Contract
 */
interface Cache
{

    /**
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param $key
     * @param $value
     * @param $expiresAt
     * @return mixed
     */
    public function put($key, $value, $expiresAt = null);

    /**
     * @param          $key
     * @param callable $closure
     * @return mixed
     */
    public function forever($key, $value);


    /**
     * @param $key
     * @return void
     */
    public function forget($key);

    /**
     * @return void
     */
    public function flush();

} 