<?php

namespace App\Http;


use App\Http\Interfaces\CacheInterface;
use Illuminate\Cache\Repository;

class Cache implements CacheInterface
{
    /** @var Repository */
    protected $cacheRepo;

    public function __construct(Repository $repository)
    {
        $this->cacheRepo = $repository;
    }

    /**
     * Store a mixed type value in cache for a certain amount of seconds.
     * Allowed values are primitives and arrays.
     *
     * @param string $key
     * @param mixed $value
     * @param int $duration Duration in seconds
     * @return mixed
     */
    public function set(string $key, $value, int $duration)
    {
        $this->cacheRepo->put($key, $value, $duration);
    }

    /**
     * Retrieve stored item.
     * Returns the same type as it was stored in.
     * Returns null if entry has expired.
     *
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->cacheRepo->get($key);
    }
}