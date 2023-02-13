<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'arcid',
        'rule',
        'acType',
        'adep',
        'ades',
        'eet',
        'dof',
        'flevel',
        'speed',
        'route',
        'remark'
    ];
}
