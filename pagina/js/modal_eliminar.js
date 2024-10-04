// Notificación al Eliminar 

const openModaldelete = document.querySelector('.delete');
const modaldelete = document.querySelector('.modal_delete');
const closeModaldelete = document.querySelector('.btn-secondary_delete')

openModaldelete.addEventListener('click', (e)=>{
    e.preventDefault();
    modaldelete.classList.add('modal--show');
});

closeModaldelete.addEventListener('click', (e)=>{
    e.preventDefault();
    modaldelete.classList.remove('modal--show');
});