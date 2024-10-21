<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\Permission\Traits\HasRoles;

class Admin extends User
{
    use FilterTrait, HasRoles;

    protected $table = 'users';

    protected $guard = 'admin';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($admin) {
            $admin->guard_name = 'admin';
        });

        static::addGlobalScope('admin', function ($builder) {
            $builder->where('guard_name', 'admin');
        });
    }


    public static function filterColumns(): array
    {
        return [
            AllowedFilter::exact('country_id'),
            'created_at',
            'name',
            'last_name',
            'email',
            'phone',
            'active',
        ];
    }

    public static function sortColumns(): array
    {
        return [
            'created_at',
            'id',
        ];
    }
}
