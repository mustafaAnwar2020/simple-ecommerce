<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductImage extends BaseModel implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'is_main',
    ];
}
