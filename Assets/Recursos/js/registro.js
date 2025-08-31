import {mostrarMensaje, busquedaDomio,procesoCorreo, limpiarInputs, cBtn} from './recursos.js';

/**
 * Primero generamos la busqueda para ver si existe la facultad
 * esto lo logro mediante la busqueda del primero dato despues del @
 */
    let cBusqueda = $("#cpruebas");
    let errorReg  = $("#errorCorreo")
    const contenedor = $("#ContEnv");

    /**
     * Creamos el usuaarios
     */
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
                                const btnEnviar = $('<button>', { id: 'btnEnv', text: 'Enviar', type: 'button', disabled: true });
                                contenedor.append(iNombre, '<br>', iApellido, '<br>', btnEnviar);
                                
                                /**
                                 * No sé que opines fer, pero hasta que se llenen los campos se habilida el btn, se me ocurre
                                 * ¿qupe propones tú?
                                 */
                                let dreturn = ["", ""];
                                contenedor.on('input', '#rNombres', async function () {
                                    //console.log($(this).val());
                                    let innombre =limpiarInputs($(this).val());
                                    dreturn[0] = innombre;
                                    let msga = cBtn(dreturn, errorReg);
                                    
                                } );
                                contenedor.on('input', '#rApellidos', async function () {
                                    let inApellidos =limpiarInputs($(this).val());
                                    dreturn[1] = inApellidos;
                                    let msga = cBtn(dreturn, errorReg);
                                        
                                } );
                                contenedor.on('click', '#btnEnv', function() {
                                    let idFac = $("#inpFac").data("id");
                                    console.log(dreturn + idFac)
                                });
                                
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
    
