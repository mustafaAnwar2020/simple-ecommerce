<?php

namespace App\Http\Controllers\API\Dashboard\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Product\Dashboard\StoreService;
use App\Http\Controllers\API\Base\BaseController;
use App\Services\Product\Dashboard\UpdateService;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\Dashboard\EditProductResource;
use App\Http\Resources\Product\Dashboard\ListProductResource;
use App\Http\Resources\Product\Dashboard\ShowProductResource;

class ProductController extends BaseController
{
    protected $model = Product::class;
    protected $listResource = ListProductResource::class;
    protected $showResource = ShowProductResource::class;
    protected $editResource = EditProductResource::class;
    protected $storeRequest = StoreProductRequest::class;
    protected $updateRequest = UpdateProductRequest::class;
    protected $translated = ['name', 'description','slug'];
    protected $relations = ['images' ,'ingredients'];
    protected string $savedResponse = 'api.product.saved';
    protected string $updatedResponse = 'api.products.updated';
    protected string $deletedResponse = 'api.products.deleted';
    protected string $successResponse = 'api.products.success';
    protected string $errorResponse = 'api.products.error';


    public function store(Request $request)
    {
        $service = new StoreService();

        return $service(
            $this->model,
            $this->storeRequest,
            $request,
            $this->showResource,
            $this->successResponse
        );
    }

    public function update(Request $request, $id)
    {
        $service = new UpdateService();

        return $service(
            $this->model,
            $request,
            $this->updateRequest,
            $id,
            $this->showResource,
            $this->successResponse,
            $this->errorResponse,
            $this->relations,
        );
    }
}
