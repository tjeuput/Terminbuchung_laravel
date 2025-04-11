<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Behandler extends Model
{
    use HasFactory;

    protected $table = 'behandler';

    protected $fillable = [
        'name',
        'titel',
        'fachgebiet',
        'ist_verfuegbar'
    ];

    /** Ein Behandler
     * kann mehrere Zeitfenster haben
     */

    public function zeitfenster() : HasMany {
        return $this->hasMany(Zeitfenster::class, 'behandler_id');
    }
}
