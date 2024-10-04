// Validación Currículos Barra de Navegación

const openModalemployment = document.querySelector('.employment');
const modalemployment = document.querySelector('.modal_employment');
const closeModalemployment = document.querySelector('.btn-secondary_employment')

openModalemployment.addEventListener('click', (e) => {
    e.preventDefault();
    modalemployment.classList.add('modal--show');
});

closeModalemployment.addEventListener('click', (e) => {
    e.preventDefault();
    modalemployment.classList.remove('modal--show');
});

// Validación Contáctanos Barra de Navegación

const openModalcontact_us = document.querySelector('.contact_us');
const modalcontact_us = document.querySelector('.modal_contact_us');
const closeModalcontact_us = document.querySelector('.btn-secondary_contact_us')

openModalcontact_us.addEventListener('click', (e) => {
    e.preventDefault();
    modalcontact_us.classList.add('modal--show');
});

closeModalcontact_us.addEventListener('click', (e) => {
    e.preventDefault();
    modalcontact_us.classList.remove('modal--show');
});

// Validación Ofertas sin iniciar sesión (boton carrito)

const openModalvalidation = document.querySelector('.button_validation');
const modalvalidation = document.querySelector('.modal_validation');
const closeModalvalidation = document.querySelector('.btn-secondary_validation')

openModalvalidation.addEventListener('click', (e) => {
    e.preventDefault();
    modalvalidation.classList.add('modal--show');
});

closeModalvalidation.addEventListener('click', (e) => {
    e.preventDefault();
    modalvalidation.classList.remove('modal--show');
});

// Validación Ofertas sin iniciar sesión (boton detalles)

const openModalvalidationdetails = document.querySelector('.button_validation_details');
const modalvalidationdetails = document.querySelector('.modal_validation_details');
const closeModalvalidationdetails = document.querySelector('.btn-secondary_validation_details')

openModalvalidationdetails.addEventListener('click', (e) => {
    e.preventDefault();
    modalvalidationdetails.classList.add('modal--show');
});

closeModalvalidationdetails.addEventListener('click', (e) => {
    e.preventDefault();
    modalvalidationdetails.classList.remove('modal--show');
});