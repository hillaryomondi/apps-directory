<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    protected $fillable = [
        'name',
        'guard_name',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

//    protected $hidden = ['permissions_matrix'];
    protected $appends = ['resource_url','permissions_matrix'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/roles/'.$this->getKey());
    }
    public function getPermissionsMatrixAttribute() {
        $role = $this;
        $permissions = Permission::where('guard_name',$this->guard_name)->get()->map(function($item,$key) use (&$role) {
            $item->checked = !!$role->permissions()->where("name", "=", $item->name)->first();
            $item->display_name = str_replace("."," ", ucwords($item->name, " -.\t\r\n\f\v"));
            return $item;
        });
        return collect($permissions)->groupBy('permission_group');
    }
}
