function openModal(){
    const modal = document.getElementById('modal-window')
    modal.classList.add('open')

    modal.addEventListener('click', (e) => {
        if(e.target.id == 'close-modal'){
            modal.classList.remove('open')
        }
    })
}

function closePopup() {
    // Pegando id da tag
    const popup = document.getElementById("popup");
    popup.style.display = "none";
}