<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Zeitfenster extends Model
{
    use HasFactory;

    protected $table = 'zeitfenster';

    protected $fillable = [
        'behandler_id',
        'datum',
        'start_zeit',
        'end_zeit',
        'ist_verfuegbar'

    ];

    protected $cast = [
        'datum' => 'date',
        'start_zeit' => 'datetime',
        'end_zeit' => 'datetime',
        'ist_verfuegbar' => 'boolean'
    ];

    /** Jeder Zeitfenster, der zu dem Behandler gehört */

    public function behandler(): BelongsTo
    {
        return $this->belongsTo(Behandler::class, 'behandler_id');
    }
}
