<?php
namespace App\Traits;

trait TimeTrait
{

    public function getCreatedAtDateAttribute(){
        return $this->created_at?->format('Y M d');
    }

    public function getCreatedAtDateTimeAttribute(){

        return $this->created_at?->format('Y M d H:i:s');
    }
}

