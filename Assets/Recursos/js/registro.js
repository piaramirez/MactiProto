import {mostrarMensaje} from './recursos.js';


$("#Enviar").on('click', function() {
    let npruebas = $("#nPruebas").val();
    let apruebas = $("#aPruebas").val();
    let cpruebas = $("#cpruebas").val();
    let upruebas = $("#upruebas").val();
    let msgn = $("#msgn");
    let msga = $("#msga");

    mostrarMensaje(npruebas, msgn);
    mostrarMensaje(apruebas, msga);
    if (npruebas !== "" && apruebas !== "") {
       $.ajax({
            url: 'controllers/crearUsuarios.php',
            method: 'POST',
            data:{
                nombre: npruebas,
                apellido:apruebas,
                email : cpruebas,
                username: upruebas,
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
});