<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'deleted_at', 
    ];
}
