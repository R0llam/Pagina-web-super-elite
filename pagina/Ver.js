var eye = document.getElementById('Eye');
var input = document.getElementById('input');
eye.addEventListener("click", function() {
    if (input.type == "password") {
        input.type = "text"
        eye.style.opacity = 0.5
    } else {
        input.type = "password"
        eye.style.opacity = 0.9
    }
})