document.addEventListener('DOMContentLoaded', function() {
    // Modal elements
    const modal = document.getElementById('booking-modal');
    const openBtn = document.getElementById('open-modal-btn');
    const closeBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-booking-btn');
    const submitBtn = document.getElementById('submit-booking-btn');
    const overlay = document.getElementById('modal-overlay');

    // Modal content elements
    const modalContent = document.querySelector('.relative.bg-white');
    const modalOtherContent = document.getElementById('modal-other-content');

    // Modal control functions
    function openModal(formIstGueltig = true) {
        console.log('Opening modal with valid content:', formIstGueltig);
        modal.classList.remove('hidden');

        // Show appropriate content based on validation
        if (formIstGueltig) {
            // Update personal data in modal before showing it
            updatePersonalDataPreview();

            // Show the valid content
            modalContent.classList.remove('hidden');
            modalOtherContent.classList.add('hidden');
        } else {
            modalContent.classList.add('hidden');
            modalOtherContent.classList.remove('hidden');
        }

        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    function closeModal() {
        console.log('Closing modal');
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Restore scrolling
    }

    // Event listeners
    openBtn?.addEventListener('click', validateAndShowModal);
    closeBtn?.addEventListener('click', closeModal);
    cancelBtn?.addEventListener('click', closeModal);
    overlay?.addEventListener('click', closeModal);

    // Escape key listener
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });

    // Form submission
    submitBtn?.addEventListener('click', function() {
        document.getElementById('personal-data-form').submit();
    });

    // Validation function
    function validateAndShowModal() {
        const requiredFields = {
            'vorname': 'Vorname',
            'nachname': 'Nachname',
            'geschlecht': 'Geschlecht',
            'geburtsdatum': 'Geburtsdatum',
            'email': 'E-Mail'
        };

        let isValid = true;
        const errors = [];

        // Validate required fields
        for (const [fieldId, fieldName] of Object.entries(requiredFields)) {
            const field = document.getElementById(fieldId);
            const value = field?.value.trim();

            if (!value) {
                field?.classList.add('border-red-500');
                errors.push(`${fieldName} ist erforderlich`);
                isValid = false;
            } else {
                field?.classList.remove('border-red-500');
            }
        }

        // Validate email format
        const email = document.getElementById('email');
        if (email && email.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
            email.classList.add('border-red-500');
            errors.push('E-Mail-Adresse ist ungültig');
            isValid = false;
        }

        // Handle validation result
        if (!isValid) {
            // Update the modal-other-content with the validation errors
            updateErrorContent(errors);
            // Open modal with invalid content
            openModal(false);
        } else {
            // Open modal with valid content (termininfo session data)
            openModal(true);
        }
    }

    // Function to update personal data preview in the modal
    function updatePersonalDataPreview() {
        const personalDataPreview = document.getElementById('personal-data-preview');
        if (!personalDataPreview) {
            console.error('Personal data preview element not found');
            return;
        }

        // Get form values
        const vorname = document.getElementById('vorname')?.value || '';
        const nachname = document.getElementById('nachname')?.value || '';
        const geschlecht = document.getElementById('geschlecht')?.value || '';
        const geburtsdatum = document.getElementById('geburtsdatum')?.value || '';
        const email = document.getElementById('email')?.value || '';
        const telefon = document.getElementById('telefon')?.value || '';

        // Create HTML for personal data preview
        let personalDataHTML = `
            <div class="mt-4 mb-2">
                <h4 class="font-medium text-gray-700">Persönliche Daten:</h4>
            </div>
        `;

        // Add each field
        const personalData = {
            'Vorname': vorname,
            'Nachname': nachname,
            'Geschlecht': geschlecht,
            'Geburtsdatum': geburtsdatum,
            'E-Mail': email
        };

        // Add telefon only if it has a value
        if (telefon) {
            personalData['Telefon'] = telefon;
        }

        // Create row for each field
        for (const [label, value] of Object.entries(personalData)) {
            personalDataHTML += `
                <div class="flex py-2 border-b border-gray-100">
                    <p class="w-1/3 text-sm text-gray-500">${label}</p>
                    <p class="w-2/3 text-sm text-gray-800">${value}</p>
                </div>
            `;
        }

        // Update the preview
        personalDataPreview.innerHTML = personalDataHTML;
    }

    function updateErrorContent(errors) {
        const errorContentDiv = document.getElementById('modal-other-content');
        if (!errorContentDiv) {
            console.error('Error content div not found');
            return;
        }

        // Create error content HTML
        let errorHTML = `
            <div class="relative bg-white rounded-lg shadow-xl max-w-lg w-full mx-auto pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                    <h3 class="font-bold text-red-600">
                        Eingabefehler
                    </h3>
                    <button type="button"
                            class="text-gray-400 hover:text-gray-500"
                            id="error-close-btn">
                        <span class="sr-only">Schließen</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 overflow-y-auto">
                    <p class="mb-4">Bitte korrigieren Sie folgende Fehler:</p>
                    <ul class="list-disc pl-5 text-red-600">
        `;

        // Add each error as a list item
        errors.forEach(error => {
            errorHTML += `<li class="py-1">${error}</li>`;
        });

        // Close the HTML structure
        errorHTML += `
                    </ul>
                    <div class="mt-4 p-3 bg-red-50 rounded-lg">
                        <p class="text-sm text-red-800">
                            Bitte überprüfen Sie Ihre Eingaben und versuchen Sie es erneut.
                        </p>
                    </div>
                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                    <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50"
                            id="error-back-btn">
                        Zurück zur Bearbeitung
                    </button>
                </div>
            </div>
        `;

        // Update the error content
        errorContentDiv.innerHTML = errorHTML;

        // Add event listeners to the new buttons after adding them to the DOM
        setTimeout(() => {
            const errorCloseBtn = document.getElementById('error-close-btn');
            const errorBackBtn = document.getElementById('error-back-btn');

            errorCloseBtn?.addEventListener('click', closeModal);
            errorBackBtn?.addEventListener('click', closeModal);
        }, 0);
    }
});
