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
    <link rel="stylesheet" href="css/productos.css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Productos | Almacenes</title>
  </head>
  <body>
  <?php include("header.php") ?> 
  <!-- Modal Nuevo producto -->
  <div class="modal fade" id="nuevo-producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-box"></i> Nuevo Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../CONTROLLER/controller_producto.php?opc_producto=1" method="POST" autocomplete="off">
          <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <label for="codlin">Linea</label>
              <select class="custom-select" id="codlin" name="codlin">
              </select>
            </div>
            <div class="col-sm-3">
              <label for="codsli">Sub.Linea</label>
              <select class="custom-select" id="codsli" name="codsli">
              </select>
            </div>
            <div class="col-sm-6">
              <label for="codite">Codigo</label>
              <input type="text" class="form-control form-control-sm" id="codite" name="codite" Required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <label for="Desc_prod">Descrip. Prod.</label>
                <input type="text" class="form-control form-control-sm" id="Desc_prod" name="Desc_prod" Required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <label for="Fec_Aper">Fec. Apertura</label>
                <input type="date" class="form-control form-control-sm" id="Fec_Aper" name="Fec_Aper" value="<?php echo date("Y-m-d");?>">
            </div>
            <div class="col-sm-6">
                <label for="und_med">Und. Medida</label>
                <select class="custom-select" id="und_med" name="und_med">
                </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                 <label for="status"> Status</label>
                <select class="custom-select" id="status" name="status">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="Precio">Precio</label>
                <input type="number" class="form-control form-control-sm" id="Precio" name="Precio" Required >
            </div>
            <div class="col-sm-3">
                <label for="puc">P.U.C</label>
                <input type="number" class="form-control form-control-sm" id="puc" name="puc" Required >
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="servicio" name="servicio">
                <label class="form-check-label" for="defaultCheck1">
                  Servicio
                </label>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="exonerado" name="exonerado">
                <label class="form-check-label" for="defaultCheck1">
                  Exonerado
                </label>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="inafecto" name="inafecto">
                <label class="form-check-label" for="defaultCheck1">
                  Inafecto
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
          <button type="imput" class="btn-guardar">Guardar Cambios</button>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Editar producto -->
  <div class="modal fade" id="editar-producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-box"></i> Editar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="../CONTROLLER/controller_producto.php?opc_producto=2" method="POST" autocomplete="off">
          <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <label for="codigo">Codigo</label>
              <input type="text" class="form-control form-control-sm" id="codigo" name="codigo" readonly>
            </div>
            <div class="col-sm-3">
                <label for="editar_Precio">Stock Linea</label>
                <input type="number" readonly class="form-control form-control-sm" id="stolin" name="stolin" Required >
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <label for="editar_Desc_prod">Descrip. Prod.</label>
                <input type="text" class="form-control form-control-sm" id="editar_Desc_prod" name="editar_Desc_prod">
                <input type='hidden' name='producto_id' id='producto_id'/>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <label for="editar_Fec_Aper">Fec. Apertura</label>
                <input type="date" class="form-control form-control-sm" id="editar_Fec_Aper" name="editar_Fec_Aper">
            </div>
            <div class="col-sm-6">
                <label for="editar_und_med">Und. Medida</label>
                <select class="custom-select" id="editar_und_med" name="editar_und_med">
                </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                 <label for="editar_status"> Status</label>
                <select class="custom-select" id="editar_status" name="editar_status">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="editar_Precio">Precio</label>
                <input type="number" class="form-control form-control-sm" id="editar_Precio" name="editar_Precio" Required >
            </div>
            <div class="col-sm-3">
                <label for="editar_puc">P.U.C</label>
                <input type="number" class="form-control form-control-sm" id="editar_puc" name="editar_puc" Required >
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="editar_servicio" name="editar_servicio">
                <label class="form-check-label" for="defaultCheck1">
                  Servicio
                </label>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="editar_exonerado" name="editar_exonerado">
                <label class="form-check-label" for="defaultCheck1">
                  Exonerado
                </label>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="editar_inafecto" name="editar_inafecto">
                <label class="form-check-label" for="defaultCheck1">
                  Inafecto
                </label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
          <button type="imput" class="btn-guardar">Guardar Cambios</button>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal eliminar producto -->
  <div class="modal fade" id="eliminar-producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-box"></i> Eliminar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../CONTROLLER/controller_producto.php?opc_producto=3" method="POST" autocomplete="off">
          <div class="container">
          <div class="row">
            <div class="col-sm-12">
                <h5 align="center">¿Desea eliminar el producto seleccionado?</h5>
                <input type='hidden' name='producto_id_eli' id='producto_id_eli'/>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
          <button type="imput" class="btn-eliminar">Si, eliminar</button>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <div id="producto_almacen">
  </div>

    <div id="content">
      <div class="container tabla">
        <button type="button" class="nuevo-producto" data-toggle="modal" data-target="#nuevo-producto">
          <i class="fa fa-box"></i> Nuevo Producto
        </button>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">        
                <table id="producto" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="codigo">Código</th>
                        <th class="descrip">Descripción</th>
                        <th class="opciones"></th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                    $opc_consulta=3;
                    include('../CONTROLLER/controller_consultas.php');
                    while ($reg=$filas->fetch_object()) { 
                      $IDPROD=$reg->IDPROD;
                      $CODLIN=$reg->CODLIN;
                      $CODSLI=$reg->CODSLI;
                      $CODITE=$reg->CODITE;
                      $datos=$reg->IDPROD."||".
                      $reg->DESITE."||".
                      $reg->PRECLI01."||".
                      $reg->FECAPE."||".
                      $reg->STATUS."||".
                      $reg->UNIMED."||".
                      $reg->SERVIC."||".
                      $reg->INAFEC."||".
                      $reg->EXONER."||".
                      $reg->PUC."||".
                      $reg->CODLIN.$reg->CODSLI.$reg->CODITE."||".
                      $reg->STOLIN;

                  ?>
                  <tr>
                    <td><?php echo $reg->CODLIN.$reg->CODSLI.$reg->CODITE; ?></td>
                    <td><?php echo $reg->DESITE; ?></td>
                    <td align="center">
                      <a href="#" data-toggle="modal" data-target="#editar-producto" onClick="llenardatos_productos('<?php echo $datos;?>');"><i class="fa fa-pencil"></i></a>
                      <a href="#" data-toggle="modal" data-target="#eliminar-producto" onClick="llenardatos_productos_eli('<?php echo $IDPROD;?>');"><i class="fa fa-remove"></i></a>
                      <a href="#" onClick="cargar_almacenes('<?php echo $IDPROD;?>','<?php echo $CODLIN;?>','<?php echo $CODSLI;?>','<?php echo $CODITE;?>','<?php echo $DESITE;?>');"><i class="fa fa-boxes"></i></a>
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
  </div>
    
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script> 
    <script type="text/javascript" src="js/productos.js"></script>  
    <script type="text/javascript" src="js/combos_producto.js"></script> 
  </body>
</html>

<?php
  $estadoproducto=$_SESSION["estadoproducto"];
  if($estadoproducto==1){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Producto creado con exito!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoproducto"]="";
  }
  if($estadoproducto==2){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al crear producto!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoproducto"]="";
  }
  if($estadoproducto==3){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Datos actualizados correctamente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoproducto"]="";
  }
  if($estadoproducto==4){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al actualizar datos!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoproducto"]="";
  }

  $estadoalmacen=$_SESSION["estadoalmacen"];
  if($estadoalmacen==1){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Alamcen creado con exito!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoalmacen"]="";
  }
  if($estadoalmacen==2){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al crear almacen!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoalmacen"]="";
  }
  if($estadoalmacen==3){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Datos actualizados correctamente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoalmacen"]="";
  }
  if($estadoalmacen==4){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al actualizar datos!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoalmacen"]="";
  }
?>