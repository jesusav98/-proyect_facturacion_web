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
    <link rel="stylesheet" href="css/clientes.css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Clientes</title>
  </head>
  <body>
      <?php include("header.php") ?>
      <!-- Modal Nuevo cliente -->
      <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-plus"></i> Nuevo Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="" action="../CONTROLLER/controller_cliente.php?opc_cliente=1" method="POST" autocomplete="off">
              <div class="container">
              <div class="row">
                <div class="col-sm-4">
                    <label for="Ruc">RUC/DNI</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control form-control-sm" id="ruc" name=ruc required >
                      <div class="input-group-append">
                        <button class="btn-primary btn-search form-control-sm" type="button" onclick="busqueda(); return false"><i class="fa fa-search"></i></button>
                      </div> 
                    </div>
                </div>
                <div class="col-sm-8">
                    <label for="raz_social">Razón Social - Nombre</label>
                    <input type="text" class="form-control form-control-sm" id="raz_social" name="raz_social" Required>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-4">
                    <label for="Ape_Paterno">Ape. Paterno</label>
                    <input type="text" class="form-control form-control-sm" id="Ape_Paterno" name="Ape_Paterno">
                </div>
                <div class="col-sm-4">
                    <label for="Ape_Materno">Ape. Materno</label>
                    <input type="text" class="form-control form-control-sm" id="Ape_Materno" name="Ape_Materno">
                </div>
                <div class="col-sm-2">
                    <label for="T_contribuyente">Tipo Contrib.</label>
                    <select id="T_contribuyente" name="T_contribuyente" class="custom-select">
                      <option value=0>Natural</option>
                      <option value=1>Juridica</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="tipdocide">Tipo Doc. Iden.</label>
                    <select id="tipdocide" name="tipdocide" class="custom-select">
                    </select>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-6">
                    <label for="Nom_comercial">Nombre Comercial</label>
                    <input type="text" class="form-control form-control-sm" id="Nom_comercial" name="Nom_comercial">
                </div>
                <div class="col-sm-6">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control form-control-sm" id="direccion" name="direccion" Required>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-4">
                    <label for="Departamentos"> Dpto. / Reg.</label>
                    <select id="Departamentos" name="Departamentos" class="custom-select"></select>
                    </select>
                </div>
                    <div class="col-sm-4">
                    <label for="Provincias"> Provincias</label>
                    <select class="custom-select" id="Provincias" class="custom-select" name="Provincias">
                    </select>
                </div>
                    <div class="col-sm-4">
                    <label for="Distritos"> Distritos</label>
                    <select class="custom-select" id="Distritos" name="Distritos" class="custom-select">
                    </select>
                </div>
              </div>
              
              
              <div class="row">
                <div class="col-sm-4">
                    <label for="Fec_Aper">Fec. Apertura</label>
                    <input type="date" class="form-control form-control-sm" id="Fec_Aper" name="Fec_Aper" value='<?php echo date('Y-m-d') ?>'>
                </div>
                <div class="col-sm-5">
                    <label for="Correo">Correo E.</label>
                    <input type="text" class="form-control form-control-sm" id="Correo" name="Correo">
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-3">
                    <label for="Telf">Telf.</label>
                    <input type="text" class="form-control form-control-sm" id="Telf" name="Telf">
                </div>
                <div class="col-sm-4">
                    <label for="Cel">Celular</label>
                    <input type="text" class="form-control form-control-sm" id="Cel" name="Cel">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-guardar">Guardar Cliente</button>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Editar cliente -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-edit"></i> Editar Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="" action="../CONTROLLER/controller_cliente.php?opc_cliente=2" method="POST" autocomplete="off">
              <div class="container">
              <div class="row">
                <div class="col-sm-4">
                    <label for="editar_Ruc">RUC/DNI</label>
                    <input type="text" class="form-control form-control-sm" id="editar_Ruc" name="editar_Ruc" readonly>
                </div>
                <div class="col-sm-8">
                    <label for="editar_raz_social">Razón Social</label>
                    <input type="text" class="form-control form-control-sm" id="editar_raz_social" name="editar_raz_social" >
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-4">
                    <label for="editar_Ape_Paterno">Ape. Paterno</label>
                    <input type="text" class="form-control form-control-sm" id="editar_Ape_Paterno" name="editar_Ape_Paterno">
                </div>
                <div class="col-sm-4">
                    <label for="editar_Ape_Materno">Ape. Materno</label>
                    <input type="text" class="form-control form-control-sm" id="editar_Ape_Materno" name="editar_Ape_Materno">
                </div>
                <div class="col-sm-2">
                    <label for="editar_T_contribuyente">Tipo Contrib.</label>
                    <select id="editar_T_contribuyente" name="editar_T_contribuyente" class="custom-select">
                      <option value=0>Natural</option>
                      <option value=1>Juridica</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="editar_tipdocide">Tipo Doc. Iden.</label>
                    <select id="editar_tipdocide" name="editar_tipdocide" class="custom-select">
                    </select>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-6">
                    <label for="editar_Nom_comercial">Nombre Comercial</label>
                    <input type="text" class="form-control form-control-sm" id="editar_Nom_comercial" name="editar_Nom_comercial">
                </div>
                <div class="col-sm-6">
                    <label for="editar_direccion">Dirección</label>
                    <input type="text" class="form-control form-control-sm" id="editar_direccion" name="editar_direccion">
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-4">
                    <label for="editar_Departamentos"> Dpto. / Reg.</label>
                    <select id="editar_Departamentos" name="editar_Departamentos" class="custom-select"></select>
                    </select>
                </div>
                    <div class="col-sm-4">
                    <label for="editar_Provincias"> Provincias</label>
                    <select id="editar_Provincias" name="editar_Provincias" class="custom-select">
                    </select>
                </div>
                    <div class="col-sm-4">
                    <label for="editar_Distritos"> Distritos</label>
                    <select id="editar_Distritos" name="editar_Distritos" class="custom-select">
                    </select>
                </div>
              </div>
              
              
              <div class="row">
                <div class="col-sm-4">
                    <label for="editar_Fec_Aper">Fec. Apertura</label>
                    <input type="date" class="form-control form-control-sm" id="editar_Fec_Aper" name="editar_Fec_Aper">
                </div>
                <div class="col-sm-5">
                    <label for="editar_Correo">Correo E.</label>
                    <input type="text" class="form-control form-control-sm" id="editar_Correo" name="editar_Correo">
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-3">
                    <label for="editar_Telf">Telf.</label>
                    <input type="text" class="form-control form-control-sm" id="editar_Telf" name="editar_Telf">
                </div>
                <div class="col-sm-4">
                    <label for="editar_Cel">Celular</label>
                    <input type="text" class="form-control form-control-sm" id="editar_Cel" name="editar_Cel">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-guardar">Guardar Cliente</button>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Eliminar cliente -->
      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-times"></i> Eliminar Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="" action="../CONTROLLER/controller_cliente.php?opc_cliente=3" method="POST">
              <div class="container">
              <div class="row">
                <div class="col-sm-12">
                    <h5 align="center">¿Desea eliminar el cliente <label id="cliente_eli_">cliente</label>?</h5>
                    <input type='hidden' name='cliente_eli' id='cliente_eli'/>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <input type="submit" id="btn_eliminar_cliente" value="Si, eliminar" class="btn-guardar">
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Ver Locales -->
      <div id="clientes_locales">
      </div>
     
      <div id="content">
        <div class="container">
          <button type="button" class="nuevo-usuario" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-user-plus"></i> Nuevo Cliente
          </button>
          <div class="row">
            <div class="col-sm-12">
              <div class="table-responsive">        
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th class="ruc">RUC</th>
                      <th class="Raz-social">Razón Social</th>
                      <th class="Direccion">Direccion</th>
                      <th class="opciones"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $opc_consulta=1;
                      include('../CONTROLLER/controller_consultas.php');
                      while ($reg=$filas->fetch_object()) { 
                        $CODCLI=$reg->CODCLI;
                        $TX_RUC=$reg->TX_RUC;
                        $datos=$reg->TX_RUC."||".
                        $reg->RAZSOC."||".
                        $reg->APEPAT."||".
                        $reg->APEMAT."||".
                        $reg->TIPPER."||".
                        $reg->NOMCOM."||".
                        $reg->DIRECC."||".
                        $reg->CODDPTO."||".
                        $reg->CODPROV."||".
                        $reg->CODCIU."||".
                        $reg->FECAPE."||".
                        $reg->INTNET."||".
                        $reg->TELEFO."||".
                        $reg->CELULAR."||".
                        $reg->TIPDOCIDE
                        ;
                    ?>
                    <tr>
                      <td><?php echo $reg->TX_RUC;?></td>
                      <td><?php echo $reg->NOMBRES;?></td>
                      <td><?php echo $reg->DIRECC;?></td>
                      <td align="center">
                        <a href="#" data-toggle="modal" data-target="#exampleModal2" onClick="llenardatos_cliente('<?php echo $datos;?>');"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-toggle="modal" data-target="#exampleModal3" onClick="llenardatos_cliente_eli('<?php echo $TX_RUC;?>');"><i class="fa fa-remove"></i></a>
                        <a href="#" onClick="cargar_locales('<?php echo $CODCLI;?>','<?php echo $TX_RUC;?>');"><i class="fa fa-store"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>        
                </table>                  
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
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/ubigeo_clientes.js"></script> 
    <script type="text/javascript" src="js/funciones.js"></script> 

    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/clientes.js"></script> 
  </body>
</html>
<?php
  $error_cliente=$_SESSION["error_cliente"];
  if($error_cliente==1){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Cliente creado con exito!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["error_cliente"]="";
  }
  if($error_cliente==2){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al crear cliente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["error_cliente"]="";
  }
  if($error_cliente==3){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Cliente actualizado correctamente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["error_cliente"]="";
  }
  if($error_cliente==4){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al actualizar Cliente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["error_cliente"]="";
  }

  $estadoAnexoCliente=$_SESSION["estadoAnexoCliente"];
  if($estadoAnexoCliente==1){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Anexo creado con exito!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoAnexoCliente"]="";
  }
  if($estadoAnexoCliente==2){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al crear anexo!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoAnexoCliente"]="";
  }
  if($estadoAnexoCliente==3){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Anexo actualizado correctamente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoAnexoCliente"]="";
  }
  if($estadoAnexoCliente==4){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al actualizar anexo!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoAnexoCliente"]="";
  }
?>