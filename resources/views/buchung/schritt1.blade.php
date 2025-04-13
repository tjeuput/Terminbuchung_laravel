@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-3/4">
            <x-cards.form-card title="Bitte wählen Sie Ihre Versicherung und Terminart" :currentStep="1">
                <form action="{{ route('terminbuchung.schritt1') }}" method="POST">
                    @csrf

                    <div class="mb-6">

                        <x-forms.select-field
                            id="versicherung"
                            name="versicherung"
                            placeholder="Bitte wählen Sie Ihre Versicherung"
                            class="select-requirement">
                            <option value="gesetzlich">Gesetzlich Versichert</option>
                            <option value="privat">Privat Versichert</option>
                            <option value="selbstzahler">Selbstzahler</option>
                        </x-forms.select-field>
                    </div>

                    <div class="mb-6">

                        <x-forms.select-field
                            id="terminart"
                            name="terminart"
                            placeholder="Bitte wählen Sie eine Terminart"
                            class="select-requirement">
                            <option value="ersttermin">Ersttermin</option>
                            <option value="folgetermin">Folgetermin</option>
                            <option value="kontrolltermin">Kontrolltermin</option>
                            <option value="notfall">Notfall</option>
                        </x-forms.select-field>
                    </div>

                    <div class="flex justify-end mt-8">
                        <button id="weiterBtn" type="submit" class="px-6 py-2.5 rounded-lg transition-all duration-200
                            disabled:bg-gray-300 disabled:cursor-not-allowed disabled:text-gray-500
                            bg-orange-600 hover:bg-orange-700 text-white font-medium focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2"
                                disabled>
                            Weiter
                        </button>
                    </div>
                </form>
            </x-cards.form-card>
        </div>

        <div class="w-full md:w-1/4">
            <x-cards.info-card />
        </div>
    </div>
@endsection
