<?php

namespace App\Services\Ingredient\Dashboard;

use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class IngredientStoreService extends BaseService
{
    public function __invoke($model, $storeRequest, $request, $resource, $successResponse)
    {

        $validation = new $storeRequest();

        $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());

        if ($validator->fails()) {
            return $this->errorResponse('validation error', 400, $validator->errors());
        }

        DB::beginTransaction();
        $item = $model::create($request->all());

        $item->stock()->create([
            'stock'=>$request->stock,
            'unit'=>$request->unit,

    ]);

        DB::commit();

        $response = $resource::make($item);

        return $this->successResponse($response,  __($successResponse));
    }
}
