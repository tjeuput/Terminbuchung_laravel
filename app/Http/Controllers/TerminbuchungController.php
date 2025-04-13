<?php

namespace App\Http\Controllers;
use App\Helpers\DatumFormatHelper;
use Illuminate\Http\Request;
use App\Models\Zeitfenster;
use App\Models\Behandler;
use App\Services\TerminSessionManager;
use Illuminate\Support\Facades\Session;

class TerminbuchungController extends Controller
{
    public function schritt1()
    {

        return view('buchung.schritt1');
    }

    public function storeSchritt1(Request $request , TerminSessionManager $sessionManager)
    {
        $validated = $request->validate([
            'versicherung'=>'required',
            'terminart'=>'required'
        ]);

        // In Session speichern
        session(['terminbuchung.schritt1' => $validated ]);
        $sessionManager->updateStep(2,$validated);

        return redirect()->route('terminbuchung.schritt2');

    }

    public function schritt2()
    {
        if (!session()->has('terminbuchung.schritt1')) {
            return redirect()->route('terminbuchung.schritt1');
        }

        return view('buchung.schritt2', [
            'currentStep'=> 2,

        ]);
    }

    public function checkVerfuegbarkeit(Request $request)
    {
        $validated = $request->validate([
            'behandler_id' => 'required',
            'datum' => 'required|date'
        ]);

        $formattedDatum = date('Y-m-d', strtotime($validated['datum']));
        $behandlerId = $validated['behandler_id'];

        // Verfügbare Zeitfenster prüfen
        $verfuegbareZeitfenster = Zeitfenster::where('datum', $formattedDatum)
            ->where('behandler_id', $behandlerId)
            ->where('ist_verfuegbar', 1)
            ->count();

        // Formatierung mit Helper
        $deDatum = DatumFormatHelper::deDatum($formattedDatum);
        $deWochentag = DatumFormatHelper::deWochentag($formattedDatum);

        if ($verfuegbareZeitfenster > 0) {
            return response()->json([
                'status' => 'success',
                'message' => 'Am ' . $deWochentag . ', ' . $deDatum . ' sind ' . $verfuegbareZeitfenster . ' Zeitfenster verfügbar.',
                'anzahl' => $verfuegbareZeitfenster
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Am ' . $deWochentag . ', ' . $deDatum . ' sind leider keine Termine verfügbar. Bitte wählen Sie ein anderes Datum.',
                'anzahl' => 0
            ]);
        }
    }

    public function storeSchritt2(Request $request, TerminSessionManager $sessionManager)
    {
        $validated = $request->validate([
            'behandler_id' => 'required',
            'datum' => 'required|date'
        ]);

        $getBehandler = Behandler::find($validated['behandler_id']);
        $formattedDatum = DatumFormatHelper::deDatum($validated['datum']);
        $wochenTag = DatumFormatHelper::deWochentag($validated['datum']);
        $terminTag= $wochenTag . ", ".$formattedDatum;
        $behandler = [
            "behandler" => $getBehandler->titel . " ". $getBehandler->name,
            "datum"=>  $terminTag
        ];

        $sessionManager->updateStep(3, $behandler);
        session(['terminbuchung.schritt2' => $validated]);

        return redirect()->route('terminbuchung.schritt3');
    }

    public function schritt3(){

        if(!session()->has('terminbuchung.schritt1') && !session()->has('terminbuchung.schritt2'))
        {
            return redirect()->route('terminbuchung.schritt1');
        }

        $ausgewaehltesDatum = session('terminbuchung.schritt2.datum');
        $behandlerId = session('terminbuchung.schritt2.behandler_id');
        $formattedDatum = date('Y-m-d', strtotime($ausgewaehltesDatum));

        // prüfe verfügbarkeit vorab
        $verfuegbareZeitfenster = Zeitfenster::where('datum', $formattedDatum)
            ->where('behandler_id', $behandlerId)
            ->where('ist_verfuegbar', 1)
            ->count();

    if ($verfuegbareZeitfenster === 0) {
        return redirect()
            ->route('terminbuchung.schritt2')
            ->with('error', 'An dem ausgewählten Tag sind keine Termine verfügbar. Bitte wählen Sie ein anderes Datum.');
    }

        $terminSlots = Zeitfenster::with('behandler')
            ->where('datum',$formattedDatum )
            ->where('behandler_id',$behandlerId )
            ->where('ist_verfuegbar', 1)
            ->orderBy('start_zeit', 'asc')
            ->get();

        $naechsteTerminSlots = null;
        $verfuegbarenTag = null;

        // Kein Termin, naeschter Termin
        if($terminSlots->isEmpty()){
            $naechsteTerminSlots = Zeitfenster::with('behandler')
                ->where('behandler_id', $behandlerId)
                ->whereDate('datum', '>', $formattedDatum)
                ->where('ist_verfuegbar', 1)
                ->orderBy('datum', 'asc')
                ->get();
        } else {

            $deTag = DatumFormatHelper::deDatum($terminSlots->first()->datum);
            $wochenTag = DatumFormatHelper::deWochentag($terminSlots->first()->datum);
            $verfuegbarenTag = $wochenTag . ", " . $deTag;
        }

        return view('buchung.schritt3', [
            'currentStep'=> 3,
            'terminSlots'=>$terminSlots,
            'verfuegbarenTag'=> $verfuegbarenTag,
            ]);

    }

    public function storeSchritt3(Request $request , TerminSessionManager $sessionManager)
    {
        $validated = $request->validate([
            'ausgewaehltezeit' => 'required',

        ]);

        $sessionManager->updateStep(4, $validated);

        return redirect()->route('terminbuchung.schritt4');
    }

    public function schritt4()
    {
        if (!session()->has('terminbuchung.schritt1') || !session()->has('terminbuchung.schritt2') || !session()->has('terminbuchung.schritt3')) {
            return redirect()->route('terminbuchung.schritt1');
        }

        return view('buchung.schritt4', [
            'currentStep'=> 4,
        ]);
    }

    public function storeSchritt4(Request $request, TerminSessionManager $sessionManager)
    {

        $validated = $request->validate([
            'vorname'=> 'required',
            'nachname'=> 'required',
            'geschlecht'=> 'required',
            'geburtsdatum'=>'required|date',
            'email'=>'required|email',
            'handynummer'=>'tel',
            'sonstige'=>'string',
        ]);

        return view('buchung.schritt4', [
            'currentStep'=> 4,
        ]);


    }






}
