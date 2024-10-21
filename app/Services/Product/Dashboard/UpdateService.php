<?php

namespace App\Services\Product\Dashboard;

use App\Models\ProductImage;
use App\Models\ProductOption;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class UpdateService extends BaseService
{
    public function __invoke($model, $request, $updateRequest, $id, $resource, $successResponse, $errorResponse, $relations)
    {
        $ingredients = [];
        $validation = new $updateRequest();

        $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());

        if ($validator->fails()) {
            return $this->errorResponse('validation error', 400, $validator->errors());
        }

        DB::beginTransaction();

        $item = $model::with($relations)->findOrFail($id);
        $item->update($request->all());

        foreach ($request->ingredients as $ingredient) {
            $ingredients[$ingredient['id']] = ['stock' => $ingredient['stock']];
        }

        $item->ingredients()->sync($ingredients, false);

        $existingImageIds = ProductImage::where('product_id', $item->id)
            ->pluck('id')
            ->toArray();

        $deleteIds = array_diff($existingImageIds, array_column($request->images, 'id'));

        ProductImage::whereIn('id', $deleteIds)->delete();

        foreach ($request->images  ?? [] as $image) {
            $image['product_id'] = $item->id;
            $productImage = ProductImage::updateOrCreate(['id' => @$image['id']], $image);
            $productImage->addMedia($image['image'])->toMediaCollection(get_class($item));
        }

        DB::commit();

        $response = $resource::make($item);

        return $this->successResponse($response,  __($successResponse));
    }
}
