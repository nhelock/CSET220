<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class family_Information extends Model
{
    protected $fillable = [
        'userID',
        'familyCode',
        'emergencyContact',
        'relation',
        'isRegistered'
    ];
}
