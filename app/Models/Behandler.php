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
    /**
     * Beziehung zu unterstützten Terminarten
     */
    public function terminarten()
    {
        return $this->belongsToMany(Terminart::class, 'behandler_terminart');
    }

    /**
     * Prüft, ob der Behandler zu einer bestimmten Zeit verfügbar ist
     */
    public function istVerfuegbar($datum): bool
    {
        return $this->zeitfenster()
            ->where('datum', $datum)
            ->where('verfuegbar', true)
            ->exists();
    }


}
