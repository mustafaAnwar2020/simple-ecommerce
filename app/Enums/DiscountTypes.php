<?php
namespace App\Enums;

enum DiscountTypes: string
{
   case FIXED = 'fixed';
   case PERCENT = 'percent';

   public static function getAllValues(): array
   {
       return array_column(DiscountTypes::cases(), 'value');
   }
}
