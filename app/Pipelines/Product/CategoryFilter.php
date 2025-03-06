<?php

namespace App\Pipelines\Product;

use Closure;

class CategoryFilter
{
    public function handle($query, Closure $next)
    {
        if (request('category_id')) {
            $query->where('category_id', request('category_id'));
        }

        return $next($query);
    }
}
