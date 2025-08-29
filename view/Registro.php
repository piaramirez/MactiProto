<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['tag_page']; ?></title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
        Area de registro
        <form class="DatosDePruebas">
            
            <div class="datosdePruebasInfo">
                <label for="Nombre">Nombre</label>
                <input type="text" placeholder="Ingresa tu nombre" required id="nPruebas">
                <div id="msgn"></div>
            </div>
            <div class="datosdePruebasInfo">
                <label for="Apellidos">Apellidos</label>
                <input type="text" placeholder="Ingresa tus Apellidos" required id="aPruebas">
                <div id="msga"></div>
            </div>
            <div class="datosdePruebasInfo">
                <label for="Correo">Correo:</label>
                <input type="email" placeholder="Ingrese su correo institucional" id="cpruebas">  
            </div>
            <div id="mostrarFac"></div>
            <div id="Enviar">Enviar</div>
        </form>   
</body>
<script type="module" src="Assets/Recursos/js/registro.js"></script>
<script  src="Assets/Recursos/js/recursos.js"></script>
</html>