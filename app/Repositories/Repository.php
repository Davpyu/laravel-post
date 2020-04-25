<?php

namespace App\Repositories;

use App\Repositories\Contracts\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Repository implements Contract
{
    public function getCacheKey(string $cache, string $key)
    {
        return "${cache}." . strtoupper($key);
    }

    public function forgetCache(array $cache)
    {
        $count = count($cache);
        for ($i = 0; $i < $count; $i++) {
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
