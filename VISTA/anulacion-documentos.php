<?php
  session_name("adminsoft");
  session_start();
  $logeo=$_SESSION['logeo'];
  $PUIGV=$_SESSION['PUIGV'];
  $IGV=$_SESSION['IGV'];
  /*echo '<script language="javascript">alert("'.$PUIGV.'");</script>';
  echo '<script language="javascript">alert("'.$IGV.'");</script>';
  */
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
    <link rel="stylesheet" href="css/anular-doc.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Anulación Documentos</title>
  </head>
  <body>
  <?php include("header.php") ?> 
<!-- Modal anular doc -->
  <div class="modal fade" id="anular-doc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-ban"></i> Anular</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form>
              <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                    <h5 align="center">¿Desea anular éste documento?</h5>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn-eliminar" onclick="anularDocumetno()" >Si, anular</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>

<!-- Modal Numero Doc -->
  <div class="modal fade" id="buscar-documentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> Notas de Ingreso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="detalle_anulacion_doc">
          
        </div>
      </div>
    </div>
  </div>

      <div id="content">
       <form action="">
        <div class="container">
        <br>
         <h4 align="center"> <strong>ANULACIÓN DE DOCUMENTOS</strong></h4>
         <br>
          <div class="row justify-content-md-center">
            <div class="col-lg-6 col-sm-12">
              <label for="tipdoc">Tipo Doc/Serie.</label>
                <select class="custom-select" id="tipdoc" aria-label="Example select with button addon">
                </select>
            </div>
          </div>
          <div class="row justify-content-md-center">
           <div class="col-sm-3">
            <label for="N-doc">N. Documento</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" id="numdoc" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn-search form-control-sm" data-toggle="modal" data-target="#buscar-documentos" type="button" onclick="cargar_detalle_anulacion_doc()" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
              </div>
          </div>
             <div class="col-lg-3 col-sm-6">
              <label for="fec-doc">Fecha Documento</label>
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="fecdoc">
            </div>
          </div>
           <div class="row justify-content-md-center">
            <div class="col-lg-3 col-sm-6">
              <label for="Raz-social">Razón Social</label>
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="Raz_social">
            </div>
             <div class="col-lg-3 col-sm-6">
              <label for="imp-total">Importe Total</label>
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="imp_total">
            </div>
          </div>
           <div class="row justify-content-md-center caja-boton">
             <div class="col-lg-6 col-md-12 col-sm-12 ">
              <button type="button" class="anular-doc" data-toggle="modal" data-target="#anular-doc"><i class="fa fa-ban"></i> Anular Documento</button>
            </div>
          </div>
        </div>
        </form><br><br><br>
          
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
    <script src="js/anulacion-documentos.js"></script>
  </body>
</html>