<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    protected $fillable = [
        'file_path',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    public function bug(){
        return $this->belongsTo('App\Bug');
    }

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/screenshots/'.$this->getKey());
    }
}
