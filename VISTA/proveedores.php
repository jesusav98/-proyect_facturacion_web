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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/proveedores.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Proveedores</title>
  </head>
  <body>
    
  <?php include("header.php") ?> 
  <!-- Modal Nuevo Proveedor -->
  <div class="modal fade" id="nuevo-proveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-people-carry"></i> Nuevo Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../CONTROLLER/controller_proveedor.php?opc_proveedor=1" method="POST" autocomplete="off">
            <div class="container">
              <div class="row">
                <div class="col-sm-4">
                  <label for="Tipo_Doc"> Tipo Doc. Identidad</label>
                    <select class="custom-select" id="Tipo_Doc" name="Tipo_Doc" aria-label="Example select with button addon">
                    </select>
                </div>
                <div class="col-sm-4">
                  <label for="ruc">RUC</label>
                  <input type="number" class="fo-control form-control-sm" id="ruc" name="ruc" required>
                </div>
                <div class="col-sm-4">
                  <label for="estado">Estado</label>
                  <input type="text" class="form-control form-control-sm" id="estado" name="estado">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <label for="Raz_Social">Razón Social</label>
                  <input type="text" class="form-control form-control-sm" id="Raz_Social" name="Raz_Social" required>
                </div>
                <div class="col-sm-7">
                  <label for="Direccion">Dirección</label>
                  <input type="text" class="form-control form-control-sm" id="Direccion" name="Direccion" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <label for="NomCom">Nombre Comercial</label>
                  <input type="text" class="form-control form-control-sm" id="NomCom" name="NomCom">
                </div>
                <div class="col-sm-7">
                  <label for="Direccion2">Local Anexo</label>
                  <input type="text" class="form-control form-control-sm" id="Direccion2" name="Direccion2">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <label for="telefono1">Teléfono 1</label>
                    <input type="text" class="form-control form-control-sm" id="telefono1" name="telefono1">
                </div>
                <div class="col-sm-4">
                   <label for="telefono2">Teléfono 2</label>
                    <input type="text" class="form-control form-control-sm" id="telefono2" name="telefono2">
                </div>
                <div class="col-sm-4">
                   <label for="celular">Celular</label>
                    <input type="text" class="form-control form-control-sm" id="celular" name="celular">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label for="Repres">Represent. Legal</label>
                  <input type="text" class="form-control form-control-sm" id="Repres" name="Repres">
                </div>
                <div class="col-sm-6">
                  <label for="Contacto">Contacto</label>
                  <input type="text" class="form-control form-control-sm" id="Contacto" name="Contacto">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label for="intnet">Correo Electrónico</label>
                  <input type="text" class="form-control form-control-sm" id="intnet" name="intnet">
                </div>
                <div class="col-sm-6">
                  <label for="Pagweb">Web</label>
                  <input type="text" class="form-control form-control-sm" id="Pagweb" name="Pagweb">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-guardar">Guardar Proveedor</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Editar proveedor -->
  <div class="modal fade" id="editar-proveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-people-carry"></i> Editar Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="../CONTROLLER/controller_proveedor.php?opc_proveedor=2" method="POST" autocomplete="off">
            <div class="container">
              <div class="row">
                <div class="col-sm-4">
                  <label for="editar_Tipo_Doc"> Tipo Doc. Identidad</label>
                    <select class="custom-select" id="editar_Tipo_Doc" name="editar_Tipo_Doc" aria-label="Example select with button addon" disabled>
                    </select>
                </div>
                <div class="col-sm-4">
                  <label for="editar_ruc">RUC</label>
                  <input type="text" class="form-control form-control-sm" id="editar_ruc" name="editar_ruc" readonly>
                </div>
                <div class="col-sm-4">
                  <label for="editar_estado">Estado</label>
                  <input type="text" class="form-control form-control-sm" id="editar_estado" name="editar_estado">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <label for="editar_Raz_Social">Razón Social</label>
                  <input type="text" class="form-control form-control-sm" id="editar_Raz_Social" name="editar_Raz_Social">
                </div>
                <div class="col-sm-7">
                  <label for="editar_Direccion">Dirección</label>
                  <input type="text" class="form-control form-control-sm" id="editar_Direccion" name="editar_Direccion">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <label for="editar_NomCom">Nombre Comercial</label>
                  <input type="text" class="form-control form-control-sm" id="editar_NomCom" name="editar_NomCom">
                </div>
                <div class="col-sm-7">
                  <label for="editar_Direccion2">Local Anexo</label>
                  <input type="text" class="form-control form-control-sm" id="editar_Direccion2" name="editar_Direccion2">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <label for="editar_telefono1">Teléfono 1</label>
                    <input type="text" class="form-control form-control-sm" id="editar_telefono1" name="editar_telefono1">
                </div>
                <div class="col-sm-4">
                   <label for="editar_telefono2">Teléfono 2</label>
                    <input type="text" class="form-control form-control-sm" id="editar_telefono2" name="editar_telefono2">
                </div>
                <div class="col-sm-4">
                   <label for="editar_celular">Celular</label>
                    <input type="text" class="form-control form-control-sm" id="editar_celular" name="editar_celular">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label for="editar_Repres">Represent. Legal</label>
                  <input type="text" class="form-control form-control-sm" id="editar_Repres" name="editar_Repres">
                </div>
                <div class="col-sm-6">
                  <label for="editar_Contacto">Contacto</label>
                  <input type="text" class="form-control form-control-sm" id="editar_Contacto" name="editar_Contacto">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label for="editar_intnet">Correo Electrónico</label>
                  <input type="text" class="form-control form-control-sm" id="editar_intnet" name="editar_intnet">
                </div>
                <div class="col-sm-6">
                  <label for="editar_Pagweb">Web</label>
                  <input type="text" class="form-control form-control-sm" id="editar_Pagweb" name="editar_Pagweb">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-guardar">Guardar Proveedor</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal eliminar producto -->
  <div class="modal fade" id="eliminar-proveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-people-carry"></i> Eliminar Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../CONTROLLER/controller_proveedor.php?opc_proveedor=3" method="POST" autocomplete="off"> 
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                    <h5 align="center">¿Desea eliminar el proveedor seleccionado?</h5>
                    <input type='hidden' name='proveedor_eli' id='proveedor_eli'/>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-eliminar">Si, eliminar</button>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </div>     

  <div id="content">
    <div class="container">
      <div class="container tabla">
        <br>
        <button type="button" class="nuevo-proveedor" data-toggle="modal" data-target="#nuevo-proveedor">
            <i class="fa fa-plus"></i> Nuevo Proveedor
        </button>
        
          <div class="row">
            <div class="col-sm-12">
              <div class="table-responsive">        
                <table id="tabla-proveedores" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                        <tr>
                            <th class="ruc">RUC</th>
                            <th class="nombre">Nombre</th>
                            <th class="direccion">Direccion</th>
                            <th class="opciones"></th>
                        </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $opc_consulta=8;
                    include('../CONTROLLER/controller_consultas.php');
                    while ($reg=$filas->fetch_object()) { 
                      $RUC=$reg->RUC;
                      $datos=$reg->TIPDOCIDE."||".
                      $reg->RUC."||".
                      $reg->ESTADO."||".
                      $reg->RAZSOC."||".
                      $reg->DIRECC."||".
                      $reg->NOMCOM."||".
                      $reg->DIRECC1."||".
                      $reg->TEL1."||".
                      $reg->TEL2."||".
                      $reg->CEL."||".
                      $reg->REPRES."||".
                      $reg->CONTACTO."||".
                      $reg->INTNET."||".
                      $reg->PAGWEB;
                      ?>
                        <tr>
                            <td><?php echo $reg->RUC;?></td>
                            <td><?php echo $reg->RAZSOC;?></td>
                            <td><?php echo $reg->DIRECC;?></td>
                            <td align="center">
                              <a href="#" data-toggle="modal" data-target="#editar-proveedor" onClick="llenardatos_proveedor('<?php echo $datos;?>');"><i class="fa fa-pencil"></i></a>
                              <a href="#" data-toggle="modal" data-target="#eliminar-proveedor" onClick="llenardatos_proveedor_eli('<?php echo $RUC;?>');"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/tabla-proveedores.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script> 
    <script type="text/javascript" src="js/combos_proveedor.js"></script> 
  </body>
</html>
<?php
  $estadoProveedor=$_SESSION["estadoProveedor"];
  if($estadoProveedor==1){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Proveedor creado con exito!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoProveedor"]="";
  }
  if($estadoProveedor==2){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al crear proveedor!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoProveedor"]="";
  }
  if($estadoProveedor==3){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Datos actualizados correctamente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoProveedor"]="";
  }
  if($estadoProveedor==4){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al actualizar datos!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoProveedor"]="";
  }
?>