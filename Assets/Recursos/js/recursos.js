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
                console.log("servidor " , response);
                if(msg) $(msg).html(response.respuesta); 
                if(response.success){
                    resolve(true);
                } else {
                    resolve(false);
                }

            },
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
    if(!correo.includes('@')) return null;
    const partes = correo.split('@');
    const usuario = partes[0];
    const dominioCompleto = partes[1];
    if(!usuario || !dominioCompleto) return null;
    const sub = dominioCompleto.split('.')[0];
    return {
        correoLimpio: correo,
        subdominio: sub
    };
}
