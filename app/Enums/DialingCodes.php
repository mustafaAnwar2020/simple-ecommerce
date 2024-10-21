<?php
namespace App\Enums;

enum DialingCodes: string
{
   case KSA = '+20';

   public static function getAllValues(): array
   {
       return array_column(DialingCodes::cases(), 'value');
   }
}
