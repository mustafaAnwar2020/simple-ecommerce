<?php
namespace App\Enums;

enum StockTypes: string
{
   case IN = 'in';
   case OUT = 'out';

   public static function getAllValues(): array
   {
       return array_column(StockTypes::cases(), 'value');
   }
}
