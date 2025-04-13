<?php

namespace App\Helpers;

use Carbon\Carbon;

class DatumFormatHelper
{
    /*
     * Formatirung das Datum auf (dd.mm.yyyy)
     * @param string/Carbon $date
     * @return string Formatierung (dd.mm.yyyy)
     * */

    public static function deDatum($date){

        if(!$date){
            return '';

        }

        if(!($date instanceof Carbon)){
            $date = Carbon::parse($date);
        }

        return $date->format('d.m.Y');
    }

    /**
     * Gibt den deutschen Namen des Wochentags zurück
     * @param string|Carbon $date
     * @return string Wochentag (z.B. "Montag", "Dienstag")
     */
    public static function deWochentag($date)
    {
        if(!$date){
            return '';
        }

        if(!($date instanceof Carbon)){
            $date = Carbon::parse($date);
        }


        Carbon::setLocale('de');

        // Return Tag auf de
        return $date->isoFormat('dddd');
    }
}
