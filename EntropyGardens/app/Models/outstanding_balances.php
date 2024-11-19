<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class outstanding_balances extends Model
{
    protected $fillable = [
        'userID',
        'payTab'
    ];
}
