function eviar_carrito(id, Nombre, Precio, Precio_B, Cantidad, Imagen, tipo) {

    var formulario = {
        "id": id,
        "Nombre": Nombre,
        "Precio": Precio,
        "Precio_B": Precio_B,
        "Cantidad": Cantidad,
        "Imagen": Imagen,
        "tipo": tipo,
    };
    var contenido = document.getElementById('contenido');
    var modal_cart2 = document.getElementById('modal_cart2');

    $.ajax({

        data: formulario,

        url: 'carrito.php',

        type: 'POST',

    })

    let datos = new FormData()
    datos.append('contenido', contenido)

    fetch("nav_cart.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            contenido.innerHTML = data.data
        })
    fetch("modal_cart2.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            modal_cart2.innerHTML = data.data
        })
}