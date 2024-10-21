<?php
namespace App\Enums;

enum MimeTypes: string
{
   case MP4 = 'mp4';
   case PNG = 'png';
   case JPG = 'jpg';
   case JPEG = 'jpeg';
   case WEBP = 'webp';

   public static function getAllValues(): array
   {
       return array_column(MimeTypes::cases(), 'value');
   }
}
