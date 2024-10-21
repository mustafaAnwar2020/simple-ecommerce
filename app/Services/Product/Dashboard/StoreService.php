<?php

namespace App\Services\Product\Dashboard;

use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class StoreService extends BaseService
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

        foreach ($request->ingredients as $ingredient) {
            $item->ingredients()->attach($ingredient['id'], ['stock' => $ingredient['stock']]);
        }

        foreach ($request->images  ?? [] as $image) {
            $productImage = $item->images()->create($image);
            $productImage->addMedia($image['image'])->toMediaCollection(get_class($item));
        }

        DB::commit();

        $response = $resource::make($item);

        return $this->successResponse($response,  __($successResponse));
    }
}
