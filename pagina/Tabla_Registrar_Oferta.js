document.addEventListener("DOMContentLoaded", getData);

function getData() {
    let content = document.getElementById("contenido_tabla")
    let formaData = new FormData()


    fetch("Tabla_Registrar_Oferta.php", {
            method: "POST",
            body: formaData
        })
        .then(response => response.json())
        .then(data => {
            content.innerHTML = data.data
        })
}
document.addEventListener("DOMContentLoaded", getData2);

function getData2() {
    let content = document.getElementById("contenido_precio_oferta")
    let formaData = new FormData()


    fetch("Precio_Oferta.php", {
            method: "POST",
            body: formaData
        })
        .then(response => response.json())
        .then(data => {
            content.innerHTML = data.data
        })
}