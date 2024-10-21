<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'order_number',
        'total',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->user_id = auth('sanctum')->id();
            $order->order_number = mt_rand(100000, 999999);
        });

        static::created(function ($order) {

            $admin = User::where('guard_name', 'admin')->first();
            $stockTotals = DB::table('stocks')
                ->select(
                    'ingredient_id',
                    DB::raw("
                        SUM(CASE
                            WHEN unit = 'kg' AND stock_type = 'in' THEN stock * 1000
                            WHEN unit = 'g' AND stock_type = 'in' THEN stock
                            ELSE 0
                        END) AS total_in_stock_in_grams,

                        SUM(CASE
                            WHEN unit = 'kg' AND stock_type = 'out' THEN stock * 1000
                            WHEN unit = 'g' AND stock_type = 'out' THEN stock
                            ELSE 0
                        END) AS total_out_stock_in_grams,

                        SUM(CASE
                            WHEN unit = 'kg' AND stock_type = 'in' THEN stock * 1000
                            WHEN unit = 'g' AND stock_type = 'in' THEN stock
                            ELSE 0
                        END) -
                        SUM(CASE
                            WHEN unit = 'kg' AND stock_type = 'out' THEN stock * 1000
                            WHEN unit = 'g' AND stock_type = 'out' THEN stock
                            ELSE 0
                        END) AS total_stock_in_grams,

                        CASE
                            WHEN
                                (
                                    SUM(CASE
                                        WHEN unit = 'kg' AND stock_type = 'in' THEN stock * 1000
                                        WHEN unit = 'g' AND stock_type = 'in' THEN stock
                                        ELSE 0
                                    END) -
                                    SUM(CASE
                                        WHEN unit = 'kg' AND stock_type = 'out' THEN stock * 1000
                                        WHEN unit = 'g' AND stock_type = 'out' THEN stock
                                        ELSE 0
                                    END)
                                ) <=
                                (
                                    SUM(CASE
                                        WHEN unit = 'kg' AND stock_type = 'in' THEN stock * 1000
                                        WHEN unit = 'g' AND stock_type = 'in' THEN stock
                                        ELSE 0
                                    END) * 0.5
                                )
                            THEN true
                            ELSE false
                        END AS is_below_half_stock
                    ")
                )
                ->groupBy('ingredient_id')
                ->get();

            foreach ($stockTotals as $stockTotal) {
                $stock = Stock::where('ingredient_id', $stockTotal->ingredient_id)->first();
                if(!$stock->stock_alert && $stockTotal->is_below_half_stock) {

                    Email::create([
                        'user_id' => $admin->id,
                        'subject' => 'Stock Alert for ingredient ' . $stock->ingredient->translate(app()->getLocale())->name,
                    ]);

                    $stock->stock_alert = true;
                    $stock->save();
                }
            }


        });

        static::addGlobalScope('order', function ($builder) {
            $builder->where('user_id', auth('sanctum')->id());
        });
    }

    /**
     * Get all of the orderProducts for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
