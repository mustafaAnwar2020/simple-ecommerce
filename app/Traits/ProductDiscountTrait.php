<?php

namespace App\Traits;

trait ProductDiscountTrait
{
    /**
     * @param $discountType
     * @param  $discount
     * @param  $price
     * @return float
     */

    public function calculateDiscount($discountType, $discount, $price) : float
    {
        $price_after_discount = 0;
        if ($discountType == "fixed") {
            $price_after_discount = $price - $discount;
        } else {
            $price_after_discount = $price - (($price * $discount) / 100);
        }

        return $price_after_discount;
    }
}
