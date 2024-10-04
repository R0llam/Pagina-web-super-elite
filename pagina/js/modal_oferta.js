const openModaldetails = document.querySelector('.button_details');
const modaldetails = document.querySelector('.modal_details');
const closeModaldetails = document.querySelector('.btn-secondary_details')

openModaldetails.addEventListener('click', (e)=>{
    e.preventDefault();
    modaldetails.classList.add('modal--show');
});

closeModaldetails.addEventListener('click', (e)=>{
    e.preventDefault();
    modaldetails.classList.remove('modal--show');
});

