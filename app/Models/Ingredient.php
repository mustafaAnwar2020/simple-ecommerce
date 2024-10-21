<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\FilterTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends BaseModel
{
    use HasFactory, Translatable, FilterTrait ;

    protected $table = 'ingredients';

    protected $fillable = [
        'id'
    ];

    public $translatedAttributes  = [
        'name',
    ];

    protected $translationForeignKey = 'ingredient_id';

    public static function filterColumns(): array
    {
        return [
            'created_at',
            'translations.name',
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
     * Get the stock associated with the Ingredient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function stock(): HasOne
    {
        return $this->hasOne(Stock::class, 'ingredient_id');
    }
    /**
     * The products that belong to the Ingredient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'ingredient_product', 'ingredient_id', 'product_id')->withPivot('stock');
    }
}
