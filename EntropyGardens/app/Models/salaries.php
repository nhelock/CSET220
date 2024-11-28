<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salaries extends Model
{
    protected $primaryKey = 'salaryID';
    public $timestamps = false;
    protected $fillable = [
        'userID',
        'salary'
    ];
}
