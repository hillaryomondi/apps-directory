<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class SuApplication extends Model
{
    use Searchable;
    protected $fillable = [
        'name',
        'url',
        'description',
        'enabled',
        'department_id',

    ];

    protected $searchable = [
        'id',
        'name',
        'url',
        'description',
    ];
    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/su-applications/'.$this->getKey());
    }
    public function department() {
        return $this->belongsTo('App\Department', 'department_id');
    }
    public function toSearchableArray(){
        $array = collect($this->only($this->searchable))->toArray();
        return array_merge($array, [
            //relationships
            'department' => $this->department->display_name,
        ]);
    }
}
