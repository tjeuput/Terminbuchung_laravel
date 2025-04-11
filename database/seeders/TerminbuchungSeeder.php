<?php

namespace Database\Seeders;
use App\Models\Behandler;
use App\Models\TerminArt;
use App\Models\Versicherung;
use App\Models\Zeitfenster;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminbuchungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Behadler
        $drShaun = Behandler::create([
            'name' => 'Shaun Koss',
            'titel' => 'Prof. Dr',
            'fachgebiet' => 'Allgemeinmedizin',
            'ist_verfuegbar'=>true


        ]);

        $drMendez = Behandler::create(['name' => 'Gloria',
            'titel' => 'Dr.',
            'fachgebiet' => 'Sportmedizin',
            'ist_verfuegbar'=>true
        ]);

        // Termine

        TerminArt::create([
            'name' => 'Akute Beschwerde',
            'dauer' => 15,
            'ist_verfuegbar'=>true
        ]);

        TerminArt::create([
            'name' => 'Routineuntersuchung',
            'dauer' => 10,
            'ist_verfuegbar'=>true
        ]);

        TerminArt::create([
            'name' => 'Vorsorgeuntersuchung',
            'dauer' => 10,
            'ist_verfuegbar'=>true
        ]);


        // Versicherungen
        Versicherung::create([
            'name' => 'Allianz',
            'typ' => 'privat',
        ]);

        Versicherung::create([
            'name' => 'DKV',
            'typ' => 'privat',
        ]);

        // Public insurance providers
        Versicherung::create([
            'name' => 'AOK',
            'typ' => 'gesetzlich',
        ]);

        Versicherung::create([
            'name' => 'Techniker Krankenkasse',
            'typ' => 'gesetzlich'
        ]);
        $this->erzeugeZeitfenster($drShaun->id, 14);
        $this->erzeugeZeitfenster($drMendez->id, 14);
    }

        /** Termine für die nächste zwei Wochen */

    private function erzeugeZeitfenster($behandlerId, int $anzahlDerTage){

        for ($tag = 0; $tag < $anzahlDerTage; $tag++) {
            $datum = Carbon::now()->addDays($tag);

            // WE überspringen
            if ($datum->isWeekend()) {
                continue;
            }


            // erzeugen Zeitfenster von 11 bis 17, 10 Min Interval

            for($stunde = 11; $stunde <17; $stunde++ ){

                for($minute=0; $minute < 60; $minute +=10){
                    if($stunde === 12 ){
                        continue;
                    }

                    $startZeit = sprintf("%02d:%02d", $stunde, $minute);

                    $endZeit =($minute === 50) ?
                        sprintf("%02d:%02d", $stunde + 1, 0) :
                        sprintf("%02d:%02d", $stunde, $minute + 10);

                    // 20% Belegung

                    $ist_verfuegbar=(rand(1,100)<=80);

                    Zeitfenster::create([
                        'behandler_id'=> $behandlerId,
                        'datum'=>$datum->format('Y-m-d'),
                        'start_zeit'=> $startZeit,
                        'end_zeit'=>$endZeit,
                        'ist_verfuegbar'=>$ist_verfuegbar,
                    ]);

                }
            }
        }


    }


}
