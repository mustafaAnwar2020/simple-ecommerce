<?php

namespace App\Http\Controllers\API\Dashboard\Ingredient;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\API\Base\BaseController;
use App\Http\Requests\Ingredient\StoreIngredientRequest;
use App\Http\Requests\Ingredient\UpdateIngredientRequest;
use App\Services\Ingredient\Dashboard\IngredientStoreService;
use App\Http\Resources\Ingredient\Dashboard\EditIngredientResource;
use App\Http\Resources\Ingredient\Dashboard\ListIngredientResource;
use App\Http\Resources\Ingredient\Dashboard\ShowIngredientResource;

class IngredientController extends BaseController
{
    protected $model = Ingredient::class;
    protected $listResource = ListIngredientResource::class;
    protected $showResource = ShowIngredientResource::class;
    protected $editResource = EditIngredientResource::class;
    protected $storeRequest = StoreIngredientRequest::class;
    protected $updateRequest = UpdateIngredientRequest::class;
    protected $translated = ['name'];
    protected $relations = [];
    protected string $savedResponse = 'api.ingredients.saved';
    protected string $updatedResponse = 'api.ingredients.updated';
    protected string $deletedResponse = 'api.ingredients.deleted';
    protected string $successResponse = 'api.ingredients.success';
    protected string $errorResponse = 'api.ingredients.error';


    public function store(Request $request)
    {
        $service = new IngredientStoreService();

        return $service(
            $this->model,
            $this->storeRequest,
            $request,
            $this->showResource,
            $this->successResponse
        );
    }
}
