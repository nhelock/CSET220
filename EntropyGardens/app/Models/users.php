<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
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

    public function balance()
    {
        return $this->hasOne(outstanding_balances::class, 'UserID', 'UserID');
    }
}
