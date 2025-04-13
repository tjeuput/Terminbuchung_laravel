document.addEventListener('DOMContentLoaded', function () {



    const slots = document.querySelectorAll('.clickable-slot');
    const weiterBtn = document.getElementById('weiterBtn');
    let selectedSlot = null;

    console.log("loading schritt3..");

    slots.forEach(slot=> {
        slot.addEventListener('click', function(){
            console.log(this);

            slots.forEach(s =>{
                s.classList.remove('bg-orange-600', 'border-orange-700', 'active');
                s.classList.add('bg-orange-300', 'border-gray-200');
            });

            this.classList.add('bg-orange-600', 'border-orange-700','group:text-white' ,'active');
            this.classList.remove('bg-orange-300','border-gray-200');

            selectedSlot = this;

            document.getElementById('ausgewaehltezeit').value= this.querySelector('h3').textContent.trim();

            updateBtnState();

        });

    // update BtnState
    function updateBtnState(){
        if(selectedSlot){
            weiterBtn.disabled = false;
            weiterBtn.classList.remove('bg-gray-300', 'cursor-not-allowed');
            weiterBtn.classList.add('bg-orange-600', 'hover:bg-orange-700');
        }
        else{
            weiterBtn.disabled=true;
            weiterBtn.classList.add('bg-gray-300', 'cursor-not-allowed');
            weiterBtn.classList.remove('bg-orange-600', 'hover:bg-orange-700')
        }
    }

    updateBtnState();


    })
});
