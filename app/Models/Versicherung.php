<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Versicherung extends Model
{
    use HasFactory;

    protected $table = 'versicherung';

    protected $fillable = [
        'name',
        'typ',

    ];
}
