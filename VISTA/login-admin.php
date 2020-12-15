
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login-admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
   <div class="container">
       <form class="" action="../CONTROLLER/controller_usuario.php?opc_usuario=0" method="POST" autocomplete="off">
           <div class="linea1">
          <img src="img/logo-login.png" alt="" class="img-fluid">
           </div>
           <div class="linea2">
               <div class="input">
                  <i class="fa fa-user"></i>
                   <input type="text" placeholder="USUARIO" id="usuario" name="usuario" required autocomplete="new-text">
               </div>
               
               <div class="input">
                  <i class="fas fa-lock"></i>
                   <input type="password" id="password" placeholder="CONTRASEÑA" name="contrasena" required autocomplete="new-password"> 
               </div>
            </div>
              <div class="ver-contrasena">
               <input id="show_password" type="checkbox"> <i class="fa fa-eye"></i><label for="show_password">Mostrar contraseña</label>
               </div>
           <div class="linea3">
               <input type="submit" value="INGRESAR" class="ingresar">
           </div>
       </form>
   </div>
   
   <script>
        function alertaMostrar(){
            $(".alerta").show();
            setTimeout(function(){
                $(".alerta").hide(); 
            }, 1500);
        }
        $('#show_password').on('change',function(event){
            // Si el checkbox esta "checkeado"
            if($('#show_password').is(':checked')){
                // Convertimos el input de contraseña a texto.
                $('#password').get(0).type='text';
                // En caso contrario..
                } else {
                // Lo convertimos a contraseña.
                $('#password').get(0).type='password';
            }
        });
    </script>
</body>
</html>
<?php
    session_name("adminsoft");
    session_start();
    $ingreso_sesion=$_SESSION["ingreso_sesion"];
    if($ingreso_sesion==1){
        echo "<div class='alerta alert alert-danger'>
        <strong>¡Usuario o contraseña incorrecto!</strong>
        </div>";
        echo "<script>";
        echo "alertaMostrar();";
        echo "</script>";
        $_SESSION["ingreso_sesion"]="";
    }
    if($ingreso_sesion==2){
        echo "<div class='alerta alert alert-danger'>
        <strong>¡Usuario no activo!</strong>
        </div>";
        echo "<script>";
        echo "alertaMostrar();";
        echo "</script>";
        $_SESSION["ingreso_sesion"]="";
    }    
    if($ingreso_sesion==3){
        echo "<div class='alerta alert alert-danger'>
        <strong>¡Usuario caduco!</strong>
        </div>";
        echo "<script>";
        echo "alertaMostrar();";
        echo "</script>";
        $_SESSION["ingreso_sesion"]="";
    }    
?>