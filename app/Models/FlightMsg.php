<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightMsg extends Model
{
    use HasFactory;
    protected $fillable = [
        'flightId',
        'msgTxt',
    ];
}
