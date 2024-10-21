<?php

namespace App\Http\Controllers\API\Front\Order;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Order\StoreOrderService;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Resources\Order\ListOrdersResource;


class OrderController extends Controller
{
    public function store(Request $request){
        $service = new StoreOrderService();

        return $service(
            Order::class,
            OrderProduct::class,
            StoreOrderRequest::class,
            $request,
            ListOrdersResource::class,
            'api.orders.success'
        );
    }
}
