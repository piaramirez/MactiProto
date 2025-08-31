export function mostrarMensaje(valorInput, msg) {
    if (valorInput.trim() === "") {
        msg.html("Este campo es obligatorio");
    } else {
        msg.html("");
    }
}
export function busquedaDomio(correo, msg){

    let subdominio = correo;
    return new Promise((resolve, reject) => {
        $.ajax({
            url: 'controllers/recursosController.php',
            method: 'POST',
            data:{
              action : 'bFacultad',
              subdominio: subdominio
            }, dataType: 'json',
            success: function(response){
                console.log("servidor ", response);
                let html = '';
                if(response.success && response.respuesta){
                    if(Array.isArray(response.respuesta)){
                        response.respuesta.forEach(fac => {
                            html += `
                                <input type="text" value="${fac.nombre}" data-id="${fac.idFac}" id="inpFac" readonly>
                                <br>
                            `;
                        }); 
                    } else {
                        html = `
                            <input type="text" value="${response.respuesta.nombre}" data-id="${response.respuesta.idFac}" id="inpFac"  readonly>
                            <br>
                        `;
                        
                    }
                    if(msg) $(msg).html(html);
                    resolve(true);
                } else {
                    html = `<p>No existe tu facultad</p>`;
                    if(msg) $(msg).html(html);
                    resolve(false);
                }
            }
            ,
            error: function(xhr, status, error){
                console.error("Error AJAX:", error);
                if(msg) $(msg).html("Error de conexión").css('color','red');
                reject(error);
            }
          }); 
    })

}
export function procesoCorreo(correo) {
    if(!correo) return null;
    correo = correo.toLowerCase().replace(/[^a-z0-9@._-]/g, '');
    if(!correo.includes('@')) {
        $("#errorCorreo").html("Registrate con tu cuenta instotucional");
        return null;
    }
    const partes = correo.split('@');
    const usuario = partes[0];
    const dominioCompleto = partes[1];
    if(!usuario || !dominioCompleto) {
        $("#errorCorreo").html("Correo inválido");
        return null;
    }
    if (!dominioCompleto.endsWith("unam.mx")) {
        $("#errorCorreo").html("Debes registrarte con tu cuenta UNAM");
        return null;
    }
    const sub = dominioCompleto.split('.')[0];
    return {
        correoLimpio: correo,
        subdominio: sub,
        dominio: dominioCompleto
    };
}
export function limpiarInputs(valor) {
    let limpio = valor.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); 
    limpio = limpio.replace(/\s+/g, ' ');
    limpio = limpio.trimStart(); 
    return limpio;
}
export function cBtn(datos, e){
    if(datos[0] === "" || datos[1] === "") {
    e.html("Los campos son obligatorios");
    $("#btnEnv").prop('disabled', true);
} else {
    e.html("");
    $("#btnEnv").prop('disabled', false);
}
}
