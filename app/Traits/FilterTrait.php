<?php

namespace App\Traits;

use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

trait FilterTrait
{
    abstract public static function filterColumns();

    abstract public static function sortColumns();

    public static function setFilters()
    {
        return QueryBuilder::for(static::class)
            ->allowedFilters(static::filterColumns())
            ->allowedSorts(static::sortColumns());
    }

    public function scopeNull(Builder $query, string $column): Builder
    {
        return $query->whereNull($column);
    }
}
