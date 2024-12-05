<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class outstanding_balances extends Model
{

    public $timestamps = false;
    
    protected $fillable = [
        'userID',
        'payTab'
    ];

    public function user()
    {
        return $this->belongsTo(users::class, 'UserID', 'UserID');
    }
}
