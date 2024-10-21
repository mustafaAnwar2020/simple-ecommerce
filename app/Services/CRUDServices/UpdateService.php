<?php

namespace App\Services\CRUDServices;

use App\Services\BaseService;
use Illuminate\Support\Facades\Validator;


class UpdateService extends BaseService
{
    public function __invoke($model, $request, $updateRequest, $id, $resource, $successResponse, $errorResponse, $relations)
    {

        $validation = new $updateRequest();

        $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());


        if (is_numeric($id)) {
            if ($validator->fails()) {
                return $this->errorResponse($errorResponse, 400, $validator->errors());
            }

            $item = $model::with($relations)->findOrFail($id);

            $item->update($request->all());
            if ($request->has('image')) {
                $item->clearMediaCollection(get_class($item));
                $item->addMedia($request->image)->toMediaCollection(get_class($item));
            }
            $response = $resource::make($item);

            return $this->successResponse($response, __($successResponse));
        }

        return $this->errorResponse('item not found', 400);
    }
}
