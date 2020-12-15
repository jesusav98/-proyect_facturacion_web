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
    <link rel="stylesheet" href="css/eliminar-n-ingr-egr.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Eliminar Nota Ingreso/Egreso</title>
  </head>
  <body> 
  <?php include("header.php") ?> 

<!-- Modal Numero Doc -->
  <div class="modal fade" id="buscar_documentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> Notas de Ingreso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="container tabla">
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive" id="tabla_eliminar_notaingreso">        
                               
                  </div>
                </div>
              </div>  
            </div>    
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal eliminar nota-->
  <div class="modal fade" id="eliminar-nota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Eliminar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form>
              <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                      <h5 align="center">¿Desea eliminar la Nota de Ingreso/Egreso?</h5>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn-eliminar" onclick="eliminar()">Si, eliminar</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
    <div id="content">
    <br>
    <h4 align="center"><strong>ELIMINAR NOTA DE INGRESO/EGRESO</strong></h4>
    <br>
    <div class="container facturacion col-sm-11">
      <div class="row justify-content-center">
        <div class="col-sm-3">
          <label for="Fec_doc">Fecha Transaccion.</label>
          <input type="date" class="form-control form-control-sm" id="Fec_doc" value='<?php echo date('Y-m-d')?>'>
        </div>
        <div class="col-sm-4">
          <label for="NUMERO">Número</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-sm" id="NUMERO" readonly>
            <div class="input-group-append">
              <button class="btn-search form-control-sm" onclick="cargartabla_notaingreso()" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <label for="ALMDES">Almacén destino</label>
          <input type="text" class="form-control form-control-sm" id="ALMDES" readonly>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-4">
          <label for="CODTRAN">Tipo Transacción</label>
          <input type="text" class="form-control form-control-sm" id="CODTRAN" readonly>
          </select>
        </div>
        <div class="col-sm-3">
          <label for="RAZON">Razón Movimiento</label>
          <input type="text" class="form-control form-control-sm" id="RAZON" readonly>
        </div>
        <div class="col-sm-4">
          <label for="CODPRO">Cliente - Proveedor</label>
          <input type="text" class="form-control form-control-sm" id="CODPRO" readonly>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-4">
          <label for="CLADOC">Tipo Documento</label>
          <input type="text" class="form-control form-control-sm" id="CLADOC" readonly>
        </div>
        <div class="col-sm-3">
          <label for="SERIE">Serie</label>
          <input type="text" class="form-control form-control-sm" id="SERIE" readonly>
        </div>
        <div class="col-sm-4">
          <label for="FACTURA">N° Documento</label>
          <input type="text" class="form-control form-control-sm" id="FACTURA" readonly>
        </div>
      </div>
      <div class="row justify-content-center caja-boton">
      <div class="col-sm-11">
        <button type="button" class="eliminar-nota" data-toggle="modal" data-target="#eliminar-nota"><i class="fa fa-trash"></i> Eliminar Nota</button>
    </div>
    </div>
    </div><br><br><br>
    <?php include("menu-footer.php") ?> 
  </div>
  </div> 
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/eliminar_notaingreso.js"></script> 
  </body>
</html>