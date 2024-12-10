<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class itineraries extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'itineraryID';
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
}
