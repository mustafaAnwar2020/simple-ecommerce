<?php

namespace App\Services\CRUDServices;

use App\Services\BaseService;
use Illuminate\Support\Facades\Validator;


class StoreService extends BaseService
{
    public function __invoke($model, $request, $storeRequest, $resource, $translated, $successResponse)
    {
        $validation = new $storeRequest();

        $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());

        if ($validator->fails()) {
            return $this->errorResponse('validation error', 400, $validator->errors());
        }

        $item = $model::create($request->all());

        if ($request->has('image')) {
            $item->addMedia($request->image)->toMediaCollection(get_class($item));
        }


        $response = $resource::make($item);

        return $this->successResponse($response,  __($successResponse));
    }
}
