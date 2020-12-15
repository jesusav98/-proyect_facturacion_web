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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/mi-empresa.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Mi empresa</title>
  </head>
  <body>
      <?php include("header.php") ?> 
      <?php 
        $opc_consulta=2;
        include('../CONTROLLER/controller_consultas.php');
      ?>
      
      <div id="content"> 
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="true">Mis datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="parametros-tab" data-toggle="tab" href="#parametros" role="tab" aria-controls="parametros" aria-selected="false">Parametros adicionales</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
            <form class="mi-empresa" action="../CONTROLLER/controller_control.php?OPC=1" method="POST" autocomplete="off">
              <div class="container col-sm-6">
                <div class="row">
                  <div class="col-sm-12" align="center">
                      <i class="fa fa-user-circle"></i>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <label for="Raz_social">Razón Social</label>
                      <input type="text" class="form-control form-control-sm" id="Raz_social" name="Raz_social"
                      value="<?php echo $_SESSION['NOMCIA']; ?>">
                  </div>
                  <div class="col-sm-6">
                      <label for="ruc">RUC</label>
                      <input type="text" class="form-control form-control-sm" id="ruc" name="ruc"
                      value="<?php echo $_SESSION['RUCCIA']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <label for="Nombre_c">Nombre Comercial</label>
                      <input type="text" class="form-control form-control-sm" id="Nombre_c" name="Nombre_c"
                      value="<?php echo $_SESSION['NOMCOM']; ?>">
                  </div>
                  <div class="col-sm-6">
                      <label for="direccion">Dirección</label>
                      <input type="text" class="form-control form-control-sm" id="direccion" name="direccion"
                      value="<?php echo $_SESSION['DIRCIA']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                      <label for="telefono">Telefono</label>
                      <input type="text" class="form-control form-control-sm" id="telefono" name="telefono"
                      value="<?php echo $_SESSION['TELEFO']; ?>">
                  </div>
                  <div class="col-sm-3">
                      <label for="celular">Celular</label>
                      <input type="text" class="form-control form-control-sm" id="celular" name="celular"
                      value="<?php echo $_SESSION['CELULA']; ?>">
                  </div>
                  <div class="col-sm-3">
                      <label for="correo">Correo</label>
                      <input type="text" class="form-control form-control-sm" id="correo" name="correo"
                      value="<?php echo $_SESSION['CORREO']; ?>">
                  </div>
                  <div class="col-sm-3">
                      <label for="pag_web">Pagina Web</label>
                      <input type="text" class="form-control form-control-sm" id="pag_web" name="pag_web"
                      value="<?php echo $_SESSION['PAGWEB']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label for="cta_bco">Cta. Bco Nacion</label>
                    <input type="text" class="form-control form-control-sm" id="cta_bco" name="cta_bco"
                    value="<?php echo $_SESSION['CTABCO']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label for="cta_cor">Cuentas Corrientes</label>
                    <textarea  class="form-control form-control-sm" id="cta_cor" name="cta_cor" ><?php echo $_SESSION['CTACOR']; ?></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label for="cta_bco">Buen Contribuyente</label>
                    <input type="text" class="form-control form-control-sm" id="bn_cont" name="bn_cont" value="<?php echo $_SESSION['BNCONT']; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label for="cta_bco">Logo</label>
                    <input type="text" class="form-control form-control-sm" id="logo" name="bn_cont" value="<?php echo $_SESSION['BNCONT']; ?>">
                  </div>
                </div>
                <div class="row justify-content-end">   
                  <button type="submit" class="guardar-datos" data-toggle="modal" data-target="#guardar-datos">
                    <i class="fa fa-save"></i> Guardar Datos
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="parametros" role="tabpanel" aria-labelledby="parametros-tab">
          <form class="mi-empresa" action="../CONTROLLER/controller_control.php?OPC=2" method="POST" autocomplete="off">
              <div class="container col-sm-6">
                <div class="row">
                  <label for="Raz_social">Facturacion</label>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                      <label for="Raz_social">IGV %</label>
                      <input type="NUMBER" class="form-control form-control-sm" id="IGV" name="IGV"
                      value="<?php echo $_SESSION['IGV']; ?>">
                  </div>
                  <div class="col-sm-3">
                      <label for="moneda">Moneda</label>
                      <input type="hidden" value="<?php echo $_SESSION['MONEDA'];?>" id="id_MONEDA">
                      <select class="custom-select" id="moneda" name="moneda">
                      </select>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input class="form-check-input" type="checkbox" value="1" id="PUIGV" name="PUIGV" checked="checked" >
                    <input type="hidden" value="<?php echo $_SESSION['PUIGV'];?>" id="id_PUIGV">
                    <label class="form-check-label" for="PUIGV">
                      Precio Unitario Incluye IGV
                    </label>
                  </div>
                </div>
                <div class="row justify-content-end">   
                  <button type="submit" class="guardar-datos" data-toggle="modal" data-target="#guardar-datos">
                    <i class="fa fa-save"></i> Guardar Datos
                  </button>
                </div>
              </div>
            </form>
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
    <script type="text/javascript" src="js/combos_control.js"></script> 
  </body>
</html>
<?php
  $estadoControl=$_SESSION["estadoControl"];
  if($estadoControl==1){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Empresa creada con exito!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoControl"]="";
  }
  if($estadoControl==2){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al crear empresa!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoControl"]="";
  }
  if($estadoControl==3){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Datos actualizados correctamente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoControl"]="";
  }
  if($estadoControl==4){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al actualizar datos!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoControl"]="";
  }
?>