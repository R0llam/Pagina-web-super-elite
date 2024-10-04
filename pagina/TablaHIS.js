
// Llamando a la función getData() al cargar la página

document.addEventListener("DOMContentLoaded", getData);

// Función para obtener datos con AJAX

function getData() {
    let input = document.getElementById("campo").value
    let num_registros = document.getElementById("num_registros").value
    let content = document.getElementById("content")
    let pagina = document.getElementById("pagina").value || 1;
    let orderCol = document.getElementById("orderCol").value
    let orderType = document.getElementById("orderType").value
    let formaData = new FormData()
    formaData.append('campo', input)
    formaData.append('registros', num_registros)
    formaData.append('pagina', pagina)
    formaData.append('orderCol', orderCol)
    formaData.append('orderType', orderType)

    fetch("TablaHIS.php", {
            method: "POST",
            body: formaData
        })
        .then(response => response.json())
        .then(data => {
            content.innerHTML = data.data
            document.getElementById("lbl-total").innerHTML = `Mostrando ${data.totalFiltro} de ${data.totalRegistros} registros`;
            document.getElementById("nav-paginacion").innerHTML = data.paginacion

            // Si la página actual no tiene resultados, ajustar la paginación para mostrar la primera página

            if (data.data.includes('Sin resultados') && parseInt(pagina) !== 1) {
                nextPage(1); // Ir a la primera página
            }
        })
        .catch(err => console.log(err))
}

// Función para cambiar de página

function nextPage(pagina) {
    document.getElementById('pagina').value = pagina
    getData()
}

// Función para ordenar columnas

function ordenar(e) {
    let elemento = e.target;
    let orderType = elemento.classList.contains("asc") ? "desc" : "asc";

    document.getElementById('orderCol').value = elemento.cellIndex;
    document.getElementById("orderType").value = orderType;
    elemento.classList.toggle("asc");
    elemento.classList.toggle("desc");

    getData()
}

// Event listeners para los eventos de cambio en el campo de entrada y el select

document.getElementById("campo").addEventListener("keyup", getData);
document.getElementById("num_registros").addEventListener("change", getData);

// Event listener para ordenar las columnas

let columns = document.querySelectorAll(".sort");
columns.forEach(column => {
    column.addEventListener("click", ordenar);
});