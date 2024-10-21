<?php
namespace App\Enums;

enum StockUnit: string
{
   case G = 'g';
   case KG = 'kg';

   public static function getAllValues(): array
   {
       return array_column(StockUnit::cases(), 'value');
   }
}
