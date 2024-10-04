document.addEventListener("DOMContentLoaded", getData2);


function getData2() {
    let content = document.getElementById("contenido")
    let formaData = new FormData()


    fetch("nav_cart.php", {
            method: "POST",
            body: formaData
        })
        .then(response => response.json())
        .then(data => {
            content.innerHTML = data.data
        })
}
document.addEventListener("DOMContentLoaded", getData);


function getData() {
    let content = document.getElementById("modal_cart2")
    let formaData = new FormData()


    fetch("modal_cart2.php", {
            method: "POST",
            body: formaData
        })
        .then(response => response.json())
        .then(data => {
            content.innerHTML = data.data
        })
}