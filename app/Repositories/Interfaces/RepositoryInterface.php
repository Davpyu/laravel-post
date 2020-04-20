<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    public function getCacheKey(string $cache, string $key);
    public function getTTL(int $ttl);
    public function forgetCache(array $cache);
}
