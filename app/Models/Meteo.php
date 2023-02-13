<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meteo extends Model
{
    use HasFactory;
    protected $fillable = [
        'ad_code',
        'observation',
        'met_text',
    ];
}
