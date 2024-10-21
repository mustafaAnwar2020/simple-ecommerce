<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\FilterTrait;
use Spatie\QueryBuilder\AllowedFilter;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends BaseModel
{
    use HasFactory, Translatable, FilterTrait , SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'active',
        'sku',
        'barcode',
        'source',
        'cost',
        'price',
        'discount',
        'discount_type',
    ];

    public $translatedAttributes  = [
        'name',
        'slug',
        'description',
    ];

    protected $translationForeignKey = 'product_id';

    public static function filterColumns(): array
    {
        return [
            'created_at',
            'sku',
            'slug',
            AllowedFilter::exact('active'),
            AllowedFilter::exact('brand_id'),
            'translations.name',
            'categories.id',
            'translations.description',
        ];
    }

    public static function sortColumns(): array
    {
        return [
            'created_at',
            'active',
            'id',
        ];
    }

    public function MainImage()
    {
        return $this->hasOne(ProductImage::class, 'product_id')->where('is_main', 1);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    /**
     * The ingredients that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_product', 'product_id', 'ingredient_id')->withPivot('stock');
    }

    /**
     * Get the merchant that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
}
