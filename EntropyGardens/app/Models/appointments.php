<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'userID_Patient',
        'date',
        'userID_Doctor'
    ];
}
