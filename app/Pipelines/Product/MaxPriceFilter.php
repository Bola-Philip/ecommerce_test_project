<?php

namespace App\Pipelines\Product;

use Closure;

class MaxPriceFilter
{
    public function handle($query, Closure $next)
    {
        if (request('max_price')) {
            $query->where('price', '<=', request('max_price'));
        }

        return $next($query);
    }
}
