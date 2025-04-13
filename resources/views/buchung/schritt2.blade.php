@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-3/4">
            <x-cards.form-card title="Bitte wählen Sie den Behandler und das Datum aus" :currentStep="$currentStep">
                <form action="{{ route('terminbuchung.storeSchritt2') }}" method="POST">
                    @csrf

                    <div class="mb-6">

                        <x-forms.select-field
                            id="behandler_id"
                            name="behandler_id"
                            placeholder="Bitte wählen Sie den Behandler"
                            class="select-requirement">
                            <option value="1">Prof. Dr. Shaun Koss</option>
                            <option value="2">Dr. Gabriela Sanchez</option>
                        </x-forms.select-field>
                    </div>

                    <div class="mb-6">

                        <x-forms.select-date
                            name="datum"
                            id="datum"
                            placeholder="Wählen Sie ein Datum"
                            required
                            class="placeholder-gray-700"
                        />


                        <div class="flex justify-between mt-6">
                            <a href="{{ route('terminbuchung.schritt1') }}" class="py-3 px-4 text-sm font-medium border border-gray-200 text-black hover:border-orange-600 hover:text-orange-600 focus:outline-hidden focus:border-orange-600 focus:text-orange-600 disabled:opacity-50 disabled:pointer-events-none shadow-md">
                                Zurück
                            </a>
                        <button id="weiterBtn" type="submit"
                                class="px-6 py-2.5 rounded-lg transition-all duration-200
                            disabled:bg-gray-300 disabled:cursor-not-allowed disabled:text-gray-500
                            bg-orange-600 hover:bg-orange-700 text-white font-medium
                            focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2"
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

    <script>
        window.CHECK_VERFUEGBARKEIT_URL = "{{ route('terminbuchung.checkverfuegbarkeit') }}";
        window.CSRF_TOKEN = "{{ csrf_token() }}";
    </script>
@endsection
