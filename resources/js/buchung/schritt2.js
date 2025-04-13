document.addEventListener('DOMContentLoaded', function () {
    const behandlerSelect = document.getElementById('behandler_id');
    const datumInput = document.getElementById('datum');

    // Feedback-Element einmalig erstellen
    const feedbackElement = document.createElement('div');
    feedbackElement.className = 'mt-2 text-sm verfuegbarkeit-feedback';
    datumInput.parentNode.appendChild(feedbackElement);

    function pruefeVerfuegbarkeit() {
        const behandlerId = behandlerSelect.value;
        const datum = datumInput.value;

        // Nur fortfahren, wenn beide Werte vorhanden sind
        if (!behandlerId || !datum) return;

        feedbackElement.innerHTML = '<span class="text-orange-600">Prüfe Verfügbarkeit...</span>';

        axios.post(window.CHECK_VERFUEGBARKEIT_URL, {
            behandler_id: behandlerId,
            datum: datum,
            _token: window.CSRF_TOKEN
        })
            .then(function (response) {
                const data = response.data;

                // Erfolgs- oder Fehlermeldung anzeigen
                if (data.status === 'success') {
                    feedbackElement.innerHTML = '<span class="text-green-600">' + data.message + '</span>';
                } else {
                    feedbackElement.innerHTML = '<span class="text-red-600">' + data.message + '</span>';
                }
            })
            .catch(function (error) {
                feedbackElement.innerHTML = '<span class="text-red-600">Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.</span>';
                console.error(error);
            });
    }


    behandlerSelect.addEventListener('change', checkAndProbe);
    datumInput.addEventListener('change', pruefeVerfuegbarkeit);

    // Prüfen ob beide Felder gefüllt sind
    function checkAndProbe() {
        if (datumInput.value) {
            pruefeVerfuegbarkeit();
        }
    }

    // Optional: Auch bei Klick auf datepicker prüfen
    document.addEventListener('click', function(e) {
        if (e.target.closest('.datepicker-calendar') && behandlerSelect.value && datumInput.value) {
            pruefeVerfuegbarkeit();
        }
    });
});
