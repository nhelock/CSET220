<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'roleID',
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'password',
        'DOB',
        'isRegistered'
    ];
}
