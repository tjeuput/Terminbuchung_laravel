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

    protected $casts = [
        'dauer' => 'integer' // Dauer in Minuten

    ];

    /**
     * Beziehung zu unterstützten Versicherungen
     */
    public function versicherungen(): BelongsToMany
    {
        return $this->belongsToMany(Versicherung::class, 'terminart_versicherung');
    }

    /**
     * Beziehung zu unterstützten Behandlern
     */
    public function behandler(): BelongsToMany
    {
        return $this->belongsToMany(Behandler::class, 'behandler_terminart');
    }

    /**
     * Nur aktive Terminarten zurückgeben
     */


    /**
     * Gibt zurück, ob eine Terminart für eine bestimmte Versicherung verfügbar ist
     */
    public function istVerfuegbarFuerVersicherung($versicherungId): bool
    {
        return $this->versicherungen()
            ->where('versicherungen.id', $versicherungId)
            ->exists();
    }
}
