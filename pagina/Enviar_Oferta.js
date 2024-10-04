function eviar_carrito(id, Cantidad_OP) {

    var formulario = {
        "id": id,
        "Cantidad_OP": Cantidad_OP
    };
    var content = document.getElementById("contenido_tabla")
    var contente = document.getElementById("contenido_precio_oferta")

    $.ajax({

        data: formulario,

        url: 'Productos-Ofertas.php',

        type: 'POST',

    })

    let datos = new FormData()
    datos.append('contenido_tabla', content)

    fetch("Tabla_Registrar_Oferta.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            content.innerHTML = data.data
        })

    fetch("Precio_Oferta.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            contente.innerHTML = data.data
        })

}

function borrar_carrito(id3) {

    var formulario = {
        "id3": id3,
    };
    var content = document.getElementById("contenido_tabla")
    var contente = document.getElementById("contenido_precio_oferta")

    $.ajax({

        data: formulario,

        url: 'Productos-Ofertas.php',

        type: 'POST',

    })

    let datos = new FormData()
    datos.append('contenido_tabla', content)

    fetch("Tabla_Registrar_Oferta.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            content.innerHTML = data.data
        })

    fetch("Precio_Oferta.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            contente.innerHTML = data.data
        })

}