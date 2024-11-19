<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salaries extends Model
{
    protected $fillable = [
        'userID',
        'salary'
    ];
}
