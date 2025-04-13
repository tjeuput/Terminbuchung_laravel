@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-3/4">
            <x-cards.form-card title="Bitte füllen Sie Ihre persönlichen Daten auf" :currentStep="$currentStep" id="persoenlichendaten">
                <form id="personal-data-form" >
                    @csrf
                    <div class="flex flex-col gap-4 mb-4">
                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <x-forms.input-field
                                    name="vorname"
                                    id="vorname"
                                    type="text"
                                    class="placeholder-gray-700"
                                  required
                                    placeholder="Vorname"/>
                            </div>
                            <div class="w-1/2">
                                <x-forms.input-field
                                    class="placeholder-gray-700"
                                    required
                                    name="nachname"
                                    type="text"
                                    id="nachname"
                                    placeholder="Nachname"/>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <x-forms.select-field
                                    class="placeholder-gray-700"
                                    id="geschlecht"
                                    name="geschlecht"
                                    placeholder="Geschlecht"
                                    required
                                    class="select-requirement">
                                    <option value="männlich">Männlich</option>
                                    <option value="weiblich">Weiblich</option>
                                    <option value="divers">Divers</option>
                                </x-forms.select-field>
                            </div>
                            <div class="w-1/2">
                                <x-forms.select-date
                                    class="placeholder-gray-700"
                                    name="geburtsdatum"
                                    required
                                    id="geburtsdatum"
                                    placeholder="Geburtsdatum"/>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-1/2">
                                <x-forms.input-field
                                    class="placeholder-gray-700"
                                    name="email"
                                    id="email"
                                    type="email"
                                    required
                                    placeholder="E-Mail Adresse"/>
                            </div>
                            <div class="w-1/2">
                                <x-forms.input-field
                                    class="placeholder-gray-700"
                                    name="telefon"
                                    id="telefon"
                                    type="tel"
                                    placeholder="Telefonnummer"/>
                            </div>

                        </div>
                        <div class="flex justify-between mt-6">
                            <a href="{{ route('terminbuchung.schritt3') }}" class="py-3 px-4 text-sm font-medium border border-gray-200 text-black hover:border-orange-600 hover:text-orange-600 focus:outline-hidden focus:border-orange-600 focus:text-orange-600 disabled:opacity-50 disabled:pointer-events-none shadow-md">
                                Zurück
                            </a>
                            <button type="button" id="open-modal-btn"  class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-orange-600 text-white hover:bg-orange-700 disabled:opacity-50 disabled:pointer-events-none">
                                Buchung einreichen
                            </button>



                        </div>



                </form>
            </x-cards.form-card>
        </div>

        <!-- Information panel -->
        <div class="w-full md:w-1/4">
            <x-cards.info-card />
        </div>
    </div>
   <x-modals.modal-buchung :termininformation="session('terminbuchung')['termininformation'] ?? []"/>
@endsection
