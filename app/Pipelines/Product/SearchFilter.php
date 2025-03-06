<?php

namespace App\Pipelines\Product;

use Closure;

class SearchFilter
{
    public function handle($query, Closure $next)
    {
        if (request('search')) {
            $query->searchable(['name', 'description']);
        }

        return $next($query);
    }
}
