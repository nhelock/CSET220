<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rosters extends Model
{
    protected $fillable = [
        'date',
        'userID_Doctor',
        'userID_CG1',
        'userID_CG2',
        'userID_CG3',
        'userID_CG4'
    ];
    public $timestamps = false; 
}