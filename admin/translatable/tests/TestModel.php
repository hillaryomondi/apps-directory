<?php

namespace Strathmore\Translatable\Test;

use Strathmore\Translatable\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasTranslations;

    protected $table = 'test_models';
    protected $guarded = [];
    public $timestamps = false;

    public $translatable = ['translatable_name'];
}
