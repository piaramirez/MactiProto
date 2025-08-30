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
                <label for="Correo">Correo:</label>
                <input type="email" placeholder="Ingrese su correo institucional" id="cpruebas">  
            </div>
            <div id="errorCorreo"></div>
            <div id="mostrarFac"></div>
            <div id="ContEnv"></div>
        </form>   
</body>
<script type="module" src="Assets/Recursos/js/registro.js"></script>
<script  src="Assets/Recursos/js/recursos.js"></script>
</html>