// Notificación Cerrar Sesión 

const openModallog_out = document.querySelector('.log_out');
const modallog_out = document.querySelector('.modal_log_out');
const closeModallog_out = document.querySelector('.btn-secondary_log_out')

openModallog_out.addEventListener('click', (e)=>{
    e.preventDefault();
    modallog_out.classList.add('modal--show');
});

closeModallog_out.addEventListener('click', (e)=>{
    e.preventDefault();
    modallog_out.classList.remove('modal--show');
});