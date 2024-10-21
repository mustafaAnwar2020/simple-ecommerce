<?php

namespace App\Http\Controllers\API\Front\Home;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Services\Home\ProductsService;
use App\Http\Resources\Product\Front\ListProductResource;


class HomeController extends Controller
{
    public function products(){
        $service = new ProductsService();

        return $service(
            Product::class,
            ['ingredients'],
            ListProductResource::class,
            'api.products.success'
        );
    }
}
