<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends BaseModel
{
    use HasFactory, FilterTrait ;

    protected $table = 'stocks';

    protected $fillable = [
        'ingredient_id',
        'stock',
        'stock_alert',
        'stock_type',
        'unit',
    ];


    public static function filterColumns(): array
    {
        return [
            'created_at',
        ];
    }

    public static function sortColumns(): array
    {
        return [
            'created_at',
            'id',
        ];
    }

    /**
     * Get the ingredient that owns the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }
}
