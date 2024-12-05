<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class outstanding_balances extends Model
{
    protected $primaryKey = 'userID';
    public $timestamps = false;
    protected $fillable = [
        'userID',
        'payTab',
        'last_updated'
    ];
}
