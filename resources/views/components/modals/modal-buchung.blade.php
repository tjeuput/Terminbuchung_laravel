@props(['termininformation' => []])

<!-- The Modal -->
<div id="booking-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"
             aria-hidden="true"
             id="modal-overlay">
        </div>

        <!-- Modal content (for valid form) -->
        <div class="relative bg-white rounded-lg shadow-xl max-w-lg w-full mx-auto pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 class="font-bold text-gray-800">
                    Terminbuchung Vorschau
                </h3>
                <button type="button"
                        class="text-gray-400 hover:text-gray-500"
                        id="close-modal-btn">
                    <span class="sr-only">Schließen</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-4 overflow-y-auto">
                <p class="mb-4">Sind diese Angaben korrekt?</p>

                <!-- Loop through all termininformation data -->
                @foreach($termininformation as $key => $value)
                    <div class="flex py-2 border-b border-gray-100">
                        <p class="w-1/3 text-sm text-gray-500">{{ ucfirst($key) }}</p>
                        <p class="w-2/3 text-sm text-gray-800">{{ $value }}</p>
                    </div>
                @endforeach

                <!-- Personal data will be displayed here from form -->
                <div id="personal-data-preview"></div>

                <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                    <p class="text-sm text-blue-800">
                        Bitte vergessen Sie nicht, Ihre Versicherungskarte mitzubringen.
                    </p>
                </div>
            </div>

            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50"
                        id="cancel-booking-btn">
                    Zurück zur Bearbeitung
                </button>
                <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-orange-600 text-white hover:bg-orange-700"
                        id="submit-booking-btn">
                    Termin verbindlich buchen
                </button>
            </div>
        </div>

        <!--  error display -->
        <div id="modal-other-content" class="hidden">
            <!-- Error content  -->
        </div>
    </div>
</div>
