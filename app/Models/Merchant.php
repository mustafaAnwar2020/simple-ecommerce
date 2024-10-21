<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Spatie\Permission\Traits\HasRoles;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Merchant extends User
{
    use FilterTrait, HasRoles;

    protected $table = 'merchants';

    public static function filterColumns(): array
    {
        return [
            AllowedFilter::exact('user_id'),
            'created_at',
            'user.name',
            'user.last_name',
            'user.email',
            'user.phone',
            'user.active',
        ];
    }

    public static function sortColumns(): array
    {
        return [
            'created_at',
            'id',
        ];
    }

    /**
     * Get the user that owns the Merchant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
