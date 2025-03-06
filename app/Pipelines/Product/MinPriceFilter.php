<?php

namespace App\Pipelines\Product;

use Closure;

class MinPriceFilter
{
    public function handle($query, Closure $next)
    {
        if (request('min_price')) {
            $query->where('price', '>=', request('min_price'));
        }

        return $next($query);
    }
}
