<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    protected $fillable = [
        'userID',
        'groupName'
    ];
}
