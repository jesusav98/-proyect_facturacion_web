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
    <link rel="stylesheet" href="css/consul-cot.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Consul. Cotizaciones</title>
  </head>
  <body>
  <?php include("header.php") ?> 
      <div id="content">
        <div class="container">
          <div class="container tabla">
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">        
                  <table id="cotizacion" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th class="codigo">Código</th>
                        <th class="raz-social">Razón Social</th>
                        <th class="fecha">Fecha</th>
                        <th class="estado">Estado</th>
                        <th class="Num-Factura">N° Factura</th>
                        <th class="Total">Total</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $opc_consulta=17;
                            include('../CONTROLLER/controller_consultas.php');
                            while ($reg=$filas->fetch_object()) { 
                            $NUMDOC=$reg->NUMDOC;
                        ?>
                      <tr >
                          <td><?php echo $reg->NUMDOC;?></td>
                          <td><?php echo $reg->RAZSOC;?></td>
                          <td><?php echo $reg->FECDOC;?></td>
                          <td><?php echo $reg->ESTCOT;?></td>
                          <td><?php echo $reg->FACTURA;?></td>
                          <td><?php echo $reg->IMPTOTSOL;?></td>
                          <td align="center"><a href="../CONTROLLER/reporte_cotizacion.php?NUMDOC=<?PHP echo $NUMDOC ; ?>" target="_blank" ><i class="fa fa-print"></i></a></td>
                      </tr>
                        <?php }?>
                    </tbody>        
                  </table>            
                </div>
              </div>
            </div> 
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
    <script type="text/javascript" src="js/facturaciones.js"></script> 
    <script type="text/javascript" src="js/cotizacion.js"></script> 
  </body>
</html>