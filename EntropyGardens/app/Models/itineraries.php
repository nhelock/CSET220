<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class itineraries extends Model
{
    protected $fillable = [
        'userID',
        'date',
        'morningMed',
        'afternoonMed',
        'nightMed',
        'breakfast',
        'lunch',
        'dinner'
    ];
    public $timestamps = false; 
}
