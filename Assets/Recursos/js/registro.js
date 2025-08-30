import {mostrarMensaje, busquedaDomio,procesoCorreo} from './recursos.js';

/**
 * Primero generamos la busqueda para ver si existe la facultad
 * esto lo logro mediante la busqueda del primero dato despues del @
 */
    let cBusqueda = $("#cpruebas");
    cBusqueda.on('input', function(e){
        let correoLimpiar = $(this).val().trim();    
        if(correoLimpiar ===""){ 
            $("#errorCorreo").html("No puedes dejar el campo vacio")
        }else{ 
            /**
             * Si el campo no está vacio pasa a "procesar correo para saber que sí sea un"
             * $("#errorCorreo").html("ahuwevo, si hay cdatos")
             */
            $("#errorCorreo").html("");  
            let proceso = procesoCorreo(correoLimpiar);
            if(proceso){
            //alert(proceso.subdominio)
                if(proceso.subdominio){
                    if(proceso.subdominio == "unam"){
                        $("#errorCorreo").html("Sólo tengo lo de alumnos por el moento, lo siento")
                    }else{
                        $(this).val(proceso.correoLimpio);
                        console.log("Subdomio:: " + proceso.subdominio);
                        let subBusqueda = proceso.subdominio;
                        let msgf = $("#mostrarFac");
                        let resultado= busquedaDomio(subBusqueda, msgf);
                    }
                }
            
            let subBusqueda = proceso.subdominio;
            let msgf = $("#mostrarFac");
            let resultado= busquedaDomio(subBusqueda, msgf);
            if(resultado){
                const contenedor = $("#ContEnv");
                contenedor.empty();
                const inputNombre = $('<input>', { type: 'text', id: 'inputNombre', placeholder: 'Nombre' });
                const inputApellido = $('<input>', { type: 'text', id: 'inputApellido', placeholder: 'Apellido' });
                const btnEnviar = $('<button>', { id: 'btnEnviar', text: 'Enviar', type: 'button' });
                contenedor.append(inputNombre, '<br>', inputApellido, '<br>', btnEnviar);
            } else {
                $("#ContEnv").html("<p>No existe ese dominio</p>");
            }
            }else{
                console.log("Mamamos");
            }
        }
    });
