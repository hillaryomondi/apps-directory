<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Department extends Model
{
    use Searchable;
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'enabled',
    ];

    protected $searchable = [
        'id',
        'name',
        'display_name',
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
        return url('/departments/'.$this->getKey());
    }
    public function toSearchableArray()
    {
        return collect($this->only($this->searchable))->toArray();
    }
}
