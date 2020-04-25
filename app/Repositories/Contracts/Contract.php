<?php

namespace App\Repositories\Contracts;

interface Contract
{
    public function getCacheKey(string $cache, string $key);
    public function getTTL(int $ttl);
    public function forgetCache(array $cache);
}
