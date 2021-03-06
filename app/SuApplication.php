<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class SuApplication extends Model
{
    use Searchable;
    protected $fillable = [
        'name',
        'description',
        'enabled',
        'department_id',
        'tags',
        'url',
        'private',
    ];

    protected $searchable = [
        'id',
        'name',
        'description',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $casts = [
        'tags' => "array"
    ];

    protected $appends = ['resource_url','formatted_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/su-applications/'.$this->getKey());
    }
    public function getFormattedUrlAttribute() {
        $parts = parse_url($this->url);
        if (!isset($parts['host'])) return "";
        if (!isset($parts['path'])) {
            $path = [];
        } else {
            $path = explode("/",$parts['path']);
        }
        if (sizeof($path)) {
            array_splice($path,0,1);
        }
        $merged = array_merge([$parts["host"]],$path);
        return implode(" > ",$merged);
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
    public function roles(){
        return $this->belongsToMany(Role::class, 'application_role', 'su_application_id', 'role_id');
    }
    public function toSearchableArray()
    {
        //['name', 'display_name','tags']
        //[department.display_name, department.description]
        //when merged ['name', 'display_name','tags',department.display_name, department.description]
        return array_merge(collect($this->only($this->searchable))->toArray(),[
            'department_name' => $this->department->name,
            'department_description' => $this->department->description,
            'tags' => $this->tags ? collect($this->tags)->toJson() : '[]'
        ]);

    }
}
