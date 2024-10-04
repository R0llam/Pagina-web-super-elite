const openModal = document.querySelector('.Boton1');
const modal = document.querySelector('.modal');
const closeModal = document.querySelector('.btn-secondary')

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal--show');
});

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.remove('modal--show');
});