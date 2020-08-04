<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ticket extends Model
{
    use Searchable;
    protected $fillable = [
        'reference_number',
        'title',
        'description',
        'resolved',
        'reporter_name',
        'reporter_email',
        'created_by',
        'su_application_id',

    ];

    protected $searchable = [
        'id',
        'reference_number',
        'title',
        'description',
        'reporter_name',
        'reporter_email',


    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/tickets/'.$this->getKey());
    }

    public function suApplication(){
        return $this->belongsTo(SuApplication::class, 'su_application_id', 'id');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function toSearchableArray()

    {
        return array_merge(collect($this->only($this->searchable))->toArray(), [
            "application_name" => $this->suApplication->name,
            'creator_name' => $this->creator ? $this->creator->name : null,
        ]);
    }

}
