/**
 * Terminbuchung Step 1: Versicherung & Terminart selection
 * WeiterBtn wenn Felders gültig
 */
export function initSchritt1Form() {
    //console.log('initSchritt1Form..');

    const selects = document.querySelectorAll('.select-requirement');
    const weiterBtn = document.getElementById('weiterBtn');

    if (!selects.length || !weiterBtn) {
        console.log('Missing elements - exiting early');
        return;
    }

    function checkSelects() {

        let allSelected = true;

        selects.forEach(select => {
            //console.log(`Select ${select.id} value:`, select.value);
            if (!select.value) {
                allSelected = false;
            }
        });



        if (allSelected) {
            //console.log('Enabling button');
            weiterBtn.disabled = false;
            weiterBtn.classList.remove('bg-gray-300', 'cursor-not-allowed');
            weiterBtn.classList.add('bg-orange-600', 'hover:bg-orange-700');
        } else {
            //console.log('Disabling button');
            weiterBtn.disabled = true;
            weiterBtn.classList.add('bg-gray-300', 'cursor-not-allowed');
            weiterBtn.classList.remove('bg-orange-600', 'hover:bg-orange-700');
        }
    }

    // Add event listeners to all select elements
    selects.forEach(select => {
        console.log(`Adding event listener to ${select.id}`);
        select.addEventListener('change', checkSelects);
    });

    // Initial check
    checkSelects();
}

// check if schritt1.js loaded
console.log('schritt1.js loaded....');

// Auto-initialize when the DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing schritt1 form');
    initSchritt1Form();
});
