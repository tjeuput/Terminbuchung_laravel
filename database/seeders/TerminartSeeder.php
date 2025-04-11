<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $terminarten = [
            [
                'name' => 'Allgemeine Konsultation',
                'beschreibung' => 'Allgemeine ärztliche Untersuchung',
                'dauer' => 10,
                'ist_verfuegbar' => true,
            ],
            [
                'name' => 'Vorsorgeuntersuchung',
                'beschreibung' => 'Regelmäßige Gesundheitsvorsorge',
                'dauer' => 10,
                'ist_verfuegbar' => true,
            ],
            [
                'name' => 'Akute Beschwerden',
                'beschreibung' => 'Behandlung akuter Gesundheitsprobleme',
                'dauer' => 10,
                'ist_verfuegbar' => true,
            ],
            [
                'name' => 'Folgerezept',
                'beschreibung' => 'Folgerezept für bestehende Medikation',
                'dauer' => 10,
                'ist_verfuegbar' => true,
            ],
        ];
    }
}
