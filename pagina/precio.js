// Llamando a la función getData() al cargar la página

document.addEventListener("DOMContentLoaded", getData);

// Función para obtener datos con AJAX

function getData() {
    let input = document.getElementById("precio").value
    let content = document.getElementById("content")
    let formaData = new FormData()
    formaData.append('precio', input)

    fetch("precio.php", {
            method: "POST",
            body: formaData
        })
        .then(response => response.json())
        .then(data => {
            content.innerHTML = data.data
        })
        .catch(err => console.log(err))
}


document.getElementById("precio").addEventListener("keyup", getData);