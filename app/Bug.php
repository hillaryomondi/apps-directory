<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Bug extends Model
{
    use Searchable;
    protected $fillable = [
        'reference_number',
        'title',
        'description',
        'resolved',
        'created_by',
        'resolved_by',
        'resolved_at',

    ];

    protected $searchable = [
        'id',
        'reference_number',
        'title',
        'description',
        'resolved',
        'created_by',
        'resolved_by',
        'resolved_at',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'resolved_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/bugs/'.$this->getKey());
    }


    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function toSearchableArray(){
        $array = collect($this->only($this->searchable))->toArray();
        return array_merge($array);
        //list of relationships to be searched
    }
}
