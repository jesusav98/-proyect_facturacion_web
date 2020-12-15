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
  <head><meta charset="gb18030">
    
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/conculta-factura.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Consul. Facturas</title>
  </head>
  <body>
    <?php include("header.php") ?>
    <!-- Modal detalle de factura -->
  <div class="modal fade" id="detalle-factura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file"></i> Detalle Factura</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="detalle_factura">
          
        </div>
      </div>
    </div>
  </div>
      <div id="content">
        <div class="container-fluid tabla">
          <div class="row">
            <div class="col-sm-12">
              <div class="table-responsive">        
                <table id="facturaciones" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                          <th class="fecha">Fecha</th>
                          <th class="tipdoc">Tip. Doc.</th>
                          <th class="numdoc">TD-SER-DCMTO</th>
                          <th class="numcot">Cotizacion</th>
                          <th class="rucdni">Ruc/Dni</th>
                          <th class="razsoc">Razón Social</th>
                          <th class="motivo">Motivo</th>
                          <th class="tipven">T. Venta.</th>
                          <th class="moneda">Mo.</th>
                          <th class="importe">Importe</th>
                          <th class="anu">Anu.</th>
                          <th class="opc"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $opc_consulta=13;
                        include('../CONTROLLER/controller_consultas.php');
                        while ($reg=$filas->fetch_object()) { 
                        $NUMDOC=$reg->NUMDOC;
                        $TIPIMP=$reg->TIPIMP;
                      ?>
                      <tr>
                          <td><?php echo $reg->FECDOC?></td>
                          <td><?php echo $reg->CLADOC?></td>
                          <td><?php echo $reg->NUMDOC?></td>
                          <td><?php echo $reg->NUMCOT?></td>
                          <td ><?php echo $reg->RUC?></td>
                          <td ><?php echo $reg->RAZSOC?></td>
                          <td ><?php echo $reg->MOTIVO?></td>
                          <td ><?php echo $reg->TIPVEN?></td>
                          <td ><?php echo $reg->CODMON?></td>
                          <td align="right" ><?php echo $reg->IMPTOT?></td>
                          <td ><?php echo $reg->ANULAD?></td>
                          <td align="center">
                          <a href="#" data-toggle="modal" data-target="#detalle-factura" onclick="cargar_detalle_factura('<?php echo $NUMDOC;?>')"><i class="fa fa-file"></i></a>
                          <a onclick="cargar_reporte_factura('<?php echo $NUMDOC;?>','<?php echo $TIPIMP;?>')"><i class="fa fa-print"></i></a>
                          </td>
                      </tr>
                      <?php } ?>
                    </tbody>              
                </table>                  
              </div>
            </div>
          </div>
        </div><br/><br/><br/><br/>
        <?php include("menu-footer.php") ?> 
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/facturaciones.js"></script> 
  </body>
</html>