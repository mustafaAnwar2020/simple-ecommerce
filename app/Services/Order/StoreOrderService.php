<?php

namespace App\Services\Order;

use App\Enums\StockTypes;
use App\Enums\StockUnit;
use App\Models\Ingredient;
use App\Models\Product;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Traits\ProductDiscountTrait;
use Illuminate\Support\Facades\Validator;


class StoreOrderService extends BaseService
{
    use ProductDiscountTrait;

    public function __invoke($model, $relationModel, $storeRequest, $request, $resource, $successResponse)
    {
        $validation = new $storeRequest();

        $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());

        if ($validator->fails()) {
            return $this->errorResponse('validation error', 400, $validator->errors());
        }

        DB::beginTransaction();

        $productsData = $this->createOrderProducts($request);

        $order = $model::create([
            'total' => $productsData['total'],
        ]);

        foreach ($productsData['data'] as &$data) {
            $data['order_id'] = $order->id;
        }

        $relationModel::insert($productsData['data']);

        $this->updateStocks($request);

        DB::commit();

        $response = $resource::make($order);

        return $this->successResponse($response,  __($successResponse));
    }

    private function createOrderProducts($request): array
    {
        $total = 0;

        $dataArray = [];

        foreach ($request->products as $product) {
            $productModel = Product::find($product['product_id']);

            $totalAfterDiscount = $this->calculateDiscount(
                $productModel->discount_type,
                $productModel->discount,
                $productModel->price
            ) * $product['quantity'];

            $total += $totalAfterDiscount;

            $dataArray[] = $this->buildOrderProductDataArray($productModel, $product['quantity'], $totalAfterDiscount);
        }

        return ['total' => $total, 'data' => $dataArray];
    }

    private function updateStocks($request)
    {
        foreach ($request->products as $product) {

            $ingredients = Ingredient::with([
                'products' => function ($q) use ($product) {
                    $q->where('product_id', $product['product_id']);
                }
            ])
                ->whereHas('products', function ($q) use ($product) {
                    $q->where('product_id', $product['product_id']);
                })
                ->get();

            foreach ($ingredients as $ingredient) {
                $ingredient->stock()->create([
                    'stock' => $ingredient->products->first()->pivot->stock,
                    'stock_type' => StockTypes::OUT->value,
                    'unit' => StockUnit::G->value,
                ]);
            }
        }
    }

    private function buildOrderProductDataArray($productModel, $quantity, $totalAfterDiscount): array
    {
        return [
            'product_id' => $productModel->id,
            'quantity' => $quantity,
            'price' => $productModel->price,
            'cost' => $productModel->cost,
            'discount' => $productModel->discount,
            'discount_type' => $productModel->discount_type,
            'paid_total' => $totalAfterDiscount,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
