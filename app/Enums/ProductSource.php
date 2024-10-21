<?php
namespace App\Enums;

enum ProductSource: string
{
   case API = 'api';
   case EXCEL = 'excel';
   case MANUAL = 'manual';

   public static function getAllValues(): array
   {
       return array_column(ProductSource::cases(), 'value');
   }
}
