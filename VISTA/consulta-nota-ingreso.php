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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/consul-nota-ingreso.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Consul. Notas de Ingreso</title>
  </head>
  <body>
  <?php include("header.php") ?> 
      <div id="content">
        <div class="container">
          <div class="container tabla">
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">        
                  <table id="consul-ingreso-egreso" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th class="Fecha">Fecha</th>
                              <th class="Not-Ingreso">Not. Ingreso</th>
                              <th class="Almac">Almacén</th>
                              <th class="Raz-social">Razón Social</th>
                              <th class="Raz">Razón</th>
                              <th class="Anulado">Anulado</th>
                              <th class="opc"></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $opc_consulta=18;
                        include('../CONTROLLER/controller_consultas.php');
                        while ($reg=$filas->fetch_object()) { 
                        $NOTING=$reg->NOTING;
                      ?>
                          <tr>
                              <td><?php echo $reg->FECTRAN ?></td>
                              <td><?php echo $reg->NOTING ?></td>
                              <td><?php echo $reg->ALMDES ?></td>
                              <td><?php echo $reg->DESCRI ?></td>
                              <td><?php echo $reg->RAZON ?></td>
                              <td><?php echo $reg->ANULAD ?></td>
                              <td align="center">
                              <a onclick="cargar_reporte_noting('<?php echo $NOTING;?>')"><i class="fa fa-print"></i></a></td>
                          </tr>
                        <?php } ?>
                      </tbody>        
                  </table>                  
                </div>
              </div>
            </div><br><br><br>
            <?php include("menu-footer.php") ?> 
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/consul-ingreso-egreso.js"></script> 
  </body>
</html>