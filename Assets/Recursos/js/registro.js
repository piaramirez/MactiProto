import {mostrarMensaje, busquedaDomio,procesoCorreo} from './recursos.js';

/**
 * Primero generamos la busqueda para ver si existe la facultad
 * esto lo logro mediante la busqueda del primero dato despues del @
 */
    let cBusqueda = $("#cpruebas");
    cBusqueda.on('input', function(e){
        let correoLimpiar = $(this).val();
        
        let proceso = procesoCorreo(correoLimpiar);

        if(proceso){
            $(this).val(proceso.correoLimpio);
            console.log("Subdomio:: " + proceso.subdominio);
            let subBusqueda = proceso.subdominio;
            let msgf = $("#mostrarFac");
            let busqueda = busquedaDomio(subBusqueda, msgf)
            
        }else{
            console.log("Mamamos");
        }
    });


/*
$("#Enviar").on('click', function() {
    let npruebas = $("#nPruebas").val();
    let apruebas = $("#aPruebas").val();
    let cpruebas = $("#cpruebas");

    let msgn = $("#msgn");
    let msga = $("#msga");
    let msgf = $("#mostrarFac");

    mostrarMensaje(npruebas, msgn);
    mostrarMensaje(apruebas, msga);
    cpruebas.on('input', function(e){
        let correo = $(this).val();
        console.log(correo);
    });
    if (npruebas !== "" && apruebas !== "" && cpruebas !== "") {
       $.ajax({
            url: 'controllers/crearUsuarios.php',
            method: 'POST',
            data:{
                nombre: npruebas,
                apellido:apruebas,
                email : cpruebas,
                accion: 'insertar'
            },dataType: 'json',
            success: function(response){
                console.log(response.accion_recibida);
                if(response.success){
                    alert(response.respuesta)
                }else{
                    alert(response.respuesta)
                }
            },
            error: function(xhr, status,error){
                console.log(xhr.responseText);
                alert("Muruo la conexion" + error)
            }
       })
    }
});*/