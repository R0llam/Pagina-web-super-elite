const button = document.querySelector("#btnSearch") 
const input = document.querySelector("#busqueda") 

button.addEventListener("click", (event) => {
    event.preventDefault();
    if (input.value.length < 3) {
        alert("Debes ingresar al menos 3 caracteres para la búsqueda.")
        return false
    }
    const form = new FormData()
    form.append("value", input.value)
    form.append("function", "search")
    fetch("lib/functions.php",{
        method: "POST",
        body: form
    })
})