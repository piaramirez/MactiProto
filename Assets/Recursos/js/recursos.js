export function mostrarMensaje(valorInput, msg) {
    if (valorInput.trim() === "") { // trim elimina espacios
        msg.html("Este campo es obligatorio");
    } else {
        msg.html(""); // limpia el mensaje
    }
}