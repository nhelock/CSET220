<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'roleName',
        'accessLevel'
    ];
}
