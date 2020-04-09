<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $fillable = [
        'name',
        'guard_name',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url', 'permission_group'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/permissions/'.$this->getKey());
    }
    public function getPermissionGroupAttribute() {
        $parts = explode(".", $this->name);
        if (sizeof($parts) > 1) {
            return $parts[1];
        } else {
            return $parts[0];
        }
    }
}
