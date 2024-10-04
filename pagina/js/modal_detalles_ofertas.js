const openModal = document.querySelector('.detalles');
const modal = document.querySelector('.modal_detalles');
const closeModal = document.querySelector('.btn_secondary_detalles')

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal--show');
});

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.remove('modal--show');
});