import {mostrarMensaje, busquedaDomio,procesoCorreo} from './recursos.js';

/**
 * Primero generamos la busqueda para ver si existe la facultad
 * esto lo logro mediante la busqueda del primero dato despues del @
 */
    let cBusqueda = $("#cpruebas");
    const contenedor = $("#ContEnv");
    contenedor.on('click', '#rEnviarBtn', function(e) {
        //console.log("Vamoooooooo");
    });
    contenedor.on('input', '#rNombres', async function () {
        console.log($(this).val());
        
    } );
    
    cBusqueda.on('input', async function(e){
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
                if(proceso.subdominio){
                    if(proceso.subdominio == "unam"){
                        $("#errorCorreo").html("Sólo tengo lo de alumnos por el moento, lo siento")
                    }else{
                        $(this).val(proceso.correoLimpio);
                        console.log("Subdomio:: " + proceso.subdominio);
                        let subBusqueda = proceso.subdominio;
                        let msgf = $("#mostrarFac");
                        try{
                            let resultado= await busquedaDomio(subBusqueda, msgf);
                            contenedor.empty(); 
                            if(resultado){
                                const iNombre = $('<input>', { type: 'text', id: 'rNombres', placeholder: 'Escribe tu nombre' });
                                const iApellido = $('<input>', { type: 'text', id: 'rApellidos', placeholder: 'Escribe tus apellidos' });
                                const btnEnviar = $('<button>', { id: 'rEnviarBtn', text: 'Enviar', type: 'button' });
                                contenedor.append(iNombre, '<br>', iApellido, '<br>', btnEnviar);
                                /**
                                 * No sé que opines fer, pero hasta que se llenen los campos se habilida el btn, se me ocurre
                                 * ¿qupe propones tú?
                                 */
                                
                                //let lNombre = limpiarInputs(iNombre, iApellido);
                            }
                        }  catch(err){
                            console.error("Error en búsqueda:", err);
                           $("#ContEnv").empty();
                        }                     
                    }
                }
            }else{
                console.log("Mamamos");
            }
        }
    });
