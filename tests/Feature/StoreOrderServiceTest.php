<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Services\Order\StoreOrderService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Resources\Order\ListOrdersResource;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreOrderServiceTest extends TestCase
{


    protected $storeOrderService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->storeOrderService = new StoreOrderService();
    }
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testOrderCreation()
    {

        $request = new Request([
            'products' => [
                ['product_id' => 1, 'quantity' => 2],
            ],
        ]);

        $order = $this->storeOrderService->__invoke(
            Order::class,
            OrderProduct::class,
            StoreOrderRequest::class,
            $request,
            ListOrdersResource::class,
            'api.orders.success'
        );

        $this->assertDatabaseHas('order_products', ['product_id' => 1, 'quantity' => 2]);
    }

    public function testStockUpdate()
    {

        $request = new Request([
            'products' => [
                ['product_id' => 1, 'quantity' => 2],
            ],
        ]);

        $order = $this->storeOrderService->__invoke(
            Order::class,
            OrderProduct::class,
            StoreOrderRequest::class,
            $request,
            ListOrdersResource::class,
            'api.orders.success'
        );

        $this->assertDatabaseHas('order_products', ['product_id' => 1, 'quantity' => 2]);
        $this->assertDatabaseHas('stocks', ['stock' => 20, 'stock_type' => 'out']);
    }

    public function testOrderValidation()
    {
        $data = [
            'products' => [
                ['id' => 1, 'quantity' => 2],
            ],
        ];

        $validator = Validator::make($data, [
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|int|min:1',
        ]);

        $this->assertFalse($validator->fails());
    }

    public function testOrderWithMissingProducts()
    {
        $data = [

            'products' => [],
        ];

        $validator = Validator::make($data, [
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|int|min:1',
        ]);

        $this->assertTrue($validator->fails());
    }


    public function testOrderWithInvalidData()
    {
        $data = [
            'user_id' => 1,
            'products' => [
                ['id' => 999, 'quantity' => 2], // Invalid product ID
            ],
        ];

        $validator = Validator::make($data, [
            'user_id' => 'required|exists:users,id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|int|min:1',
        ]);

        $this->assertTrue($validator->fails());
    }
}
