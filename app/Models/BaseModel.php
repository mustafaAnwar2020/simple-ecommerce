<?php

namespace App\Models;

use App\Traits\TimeTrait;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use TimeTrait;

}
