<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Versicherung;
class VersicherungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $versicherungen = [
            [
                'name' => 'AOK',
                'typ' => 'gesetzlich',
                'ist_aktiv' => true,
            ],
            [
                'name' => 'Techniker Krankenkasse',
                'typ' => 'gesetzlich',
                'ist_aktiv' => true,
            ],
            [
            'name' => 'Allianz Private Krankenversicherung',
            'typ' => 'privat',
            'ist_aktiv' => true,
        ]];

        foreach ($versicherungen as $versicherung){
            Versicherung::create($versicherung);
        }
    }
}
