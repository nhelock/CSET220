<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prescriptions extends Model
{
    protected $primaryKey = 'userID';
    public $timestamps = false;
    protected $fillable = [
        'userID',
        'date',
        'comment',
        'morningMed',
        'afternoonMed',
        'nightMed'
    ];
}
