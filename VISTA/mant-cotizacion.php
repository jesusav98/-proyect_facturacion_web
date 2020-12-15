<?php
  session_name("adminsoft");
  session_start();
  $logeo=$_SESSION['logeo'];
  /*echo '<script language="javascript">alert("'.$logeo.'");</script>';*/
  if (empty($logeo)) {
    $_SESSION['logeo']=0;
    header("Location:login-admin.php");
  }elseif($logeo==0){
    header("Location:login-admin.php");
  }else{
    $_SESSION['logeo']=1;
  }
?>
<!Doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/mant-cotizacion.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Mantenimiento cotizaciones</title>
  </head>
  <body>
  <?php include("header.php") ?> 
  <div id="editar_cotizacion">
  </div>
  
  <div id="content">
    <div class="container">
      <div class="container tabla">
        <div class="row">
          <div class="col-sm-4 col-lg-2">
              <div class="custom-control custom-checkbox">
                <input class="form-check-input" type="checkbox" value="1" id="buscar_porfecha" name="buscar_porfecha" checked="checked" >
                <label class="form-check-label" for="buscar_porfecha">
                  Buscar por fecha
                </label>
              </div> 
          </div>
          <div class="col-sm-4 col-lg-4 desde">
            <label for="fec-desde">Desde</label>
            <input type="date" class="form-control form-control-sm" id="Fec_desde"  value="<?php echo date("Y-m-d") ?>">
          </div>
          <div class="col-sm-4 lg-4 hasta">
            <label for="fec-hasta">Hasta</label> 
            <input type="date" class="form-control form-control-sm" id="Fec_hasta"  value="<?php echo date("Y-m-d") ?>">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive" id="tabla_consultacotizacion">        
                                
            </div>
          </div>
        </div><br><br><br>
      </div> 
    </div>
    <?php include("menu-footer.php") ?>
  </div>
</div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/productos.js"></script> 
    <script type="text/javascript" src="js/combos_mantcotizacion.js"></script>  
    <!--    <script type="text/javascript" src="js/selec-fila.js"></script> -->
  </body>
</html>