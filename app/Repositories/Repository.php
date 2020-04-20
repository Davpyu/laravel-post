<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Repository implements RepositoryInterface
{
    public function getCacheKey(string $cache, string $key)
    {
        return "$cache." . strtoupper($key);
    }

    public function forgetCache(array $cache)
    {
        for ($i = 0; $i < count($cache); $i++) {
            if (Cache::has($cache[$i])) {
                Cache::forget($cache[$i]);
            }
        }
        return $this;
    }

    public function getTTL(int $ttl)
    {
        return Carbon::now()->addMinutes($ttl);
    }
}
