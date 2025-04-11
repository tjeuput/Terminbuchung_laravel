<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Terminart extends Model
{
    use HasFactory;

    protected $table= 'terminart';

    protected $fillable= [
        'name',
        'dauer',
        'ist_verfuegbar'
    ];
}
