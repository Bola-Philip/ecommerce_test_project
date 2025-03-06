<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SearchTrait
{
    public function scopeSearchable(Builder $builder,array $columns = ['name']): void
    {
        $search = request('search');

        if (! is_null($search)){
            $isFirstKey = false;

            foreach ($columns as $column){
                if (!$isFirstKey){
                    $builder->where($column, 'like', "%{$search}%");
                    $isFirstKey = true;
                }else {
                    $builder->orWhere($column, 'like', "%{$search}%");
                }
            }

        }
    }
}
