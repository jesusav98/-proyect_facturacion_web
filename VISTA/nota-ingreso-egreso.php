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
    <link rel="stylesheet" href="css/nota-ingreso-egreso.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Nota Ingreso/Egreso</title>
  </head>
  <body> 
  <?php include("header.php") ?> 
<!-- Modal agregar producto -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-shopping-cart"></i> Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="container">
              <div class="container tabla">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">        
                      <table id="producto" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th class="cod-pro">Código</th>
                            <th class="descrip-product">Descripción</th>
                            <th class="Cantidad">Cantidad</th>
                            <th class="Almacen">Almacen</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $opc_consulta=10;
                            include('../CONTROLLER/controller_consultas.php');
                            while ($reg=$filas->fetch_object()) { 
                              $IDPROD=$reg->IDPROD;
                              $datosProAlm=$reg->IDPROD."||".
                              $reg->CODLIN. $reg->CODSLI. $reg->CODITE."||".
                              $reg->DESITE."||".
                              $reg->STOLIN."||".
                              $reg->SIS_DESLAR."||".
                              $reg->PRECLI01."||".
                              $reg->CODALM."||".
                              $reg->EXONER."||".
                              $reg->INAFEC."||".
                              $reg->SERVIC."||".
                              $reg->CODLIN."||".
                              $reg->CODSLI."||".
                              $reg->CODITE;
                          ?>
                          <tr data-toggle="modal" data-target="#producto_agregado" onClick="mostrarProducto('<?php echo $datosProAlm?>')">
                            <td><?php echo $reg->CODLIN.$reg->CODSLI.$reg->CODITE;?></td>
                            <td><?php echo $reg->DESITE;?></td>
                            <td><?php echo $reg->STOLIN;?></td>
                            <td><?php echo $reg->SIS_DESLAR;?></td>
                          </tr>
                          <?php } ?>
                        </tbody>        
                      </table>                  
                    </div>
                  </div>
                </div>  
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal producto  agregado-->
  <div class="modal fade" id="producto_agregado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check"></i> Item seleccionado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form>
              <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                    <label for="Producto">Codigo</label>
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="CODIGO">
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="CODLIN">
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="CODSLI">
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="CODITE">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-7">
                    <label for="Producto">Producto</label>
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="IDPROD">
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="DESITE">
                  </div>
                  <div class="col-sm-5">
                    <label for="Producto">Almacén</label>
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="SIS_DESLAR">
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="CODALM">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control form-control-sm" id="cantidad" onkeyup ="calculartotal()" style="text-align:right;">
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="STOLIN">
                  </div>
                  <div class="col-sm-4">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control form-control-sm" id="PRECLI01" onkeyup="calculartotal()" style="text-align:right;">
                  </div>
                  <div class="col-sm-5">
                    <label for="total_item">Total</label>
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="total_item" style="text-align:right;">
                  </div>
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="EXONER">
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="INAFEC">
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="SERVIC">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn-eliminar" onclick="agregarProducto()">Agregar</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
<!-- Modal Buscar Cliente -->
  <div class="modal fade" id="buscar_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="container tabla">
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">        
                    <table id="clientes" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th class="ruc">RUC</th>
                              <th class="Raz-social">Razón Social</th>
                              <th class="direccion">Direccion</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $opc_consulta=1;
                          include('../CONTROLLER/controller_consultas.php');
                          while ($reg=$filas->fetch_object()) { 
                            $datos_cli=$reg->TX_RUC."||".
                            $reg->RAZSOC
                            ;
                        ?>
                        <tr onclick="cargar_datos_cliente_proveedor('<?php echo $datos_cli; ?>')">
                          <td ><?php echo $reg->TX_RUC; ?> </td>
                          <td ><?php echo $reg->RAZSOC; ?></td>
                          <td ><?php echo $reg->DIRECC; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>        
                    </table>                  
                  </div>
                </div>
              </div>  
            </div>    
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Buscar Proveedor -->
  <div class="modal fade" id="buscar_proveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-people-carry"></i> Proveedores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="container tabla">
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">        
                    <table id="tabla-proveedores" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                            <tr>
                                <th class="ruc">RUC</th>
                                <th class="nombre">Nombre</th>
                                <th class="estado">Estado</th>
                            </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $opc_consulta=8;
                          include('../CONTROLLER/controller_consultas.php');
                          while ($reg=$filas->fetch_object()) { 
                            $datos_pro=$reg->RUC."||".
                            $reg->RAZSOC;
                        ?>
                        <tr onclick="cargar_datos_cliente_proveedor('<?php echo $datos_cli; ?>')">
                            <td><?php echo $reg->RUC ?></td>
                            <td><?php echo $reg->RAZSOC ?></td>
                            <td>-</td>
                        </tr>
                        <?php }?>
                      </tbody>        
                    </table>                  
                  </div>
                </div>
              </div>  
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
  
<!-- Modal Generar notaingreso-->
<div class="modal fade" id="generar_notaingreso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-alt"></i> Generar Nota Ingreso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form>
              <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                      <h5 align="center">¿Desea generar la Nota Ingreso?</h5>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn-eliminar" onclick="generar()">Si, generar</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
  
<!-- Modal editar producto de notaingreso-->
<div class="modal fade" id="editar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-box-open"></i> Editar Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form>
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                  <label for="Producto">Producto</label>
                  <input type="text" disabled="readonly" class="form-control form-control-sm" id="editar_DESITE">
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="editar_IDPROD">
                </div>
                <div class="col-sm-2">
                  <label for="cantidad">Cantidad</label>
                  <input type="number" class="form-control form-control-sm" id="editar_cantidad" onkeyup ="calculareditartotal()" style="text-align:right;">
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="editar_STOLIN">
                </div>
                <div class="col-sm-2">
                  <label for="precio">Precio</label>
                  <input type="number" class="form-control form-control-sm" id="editar_PRECLI01" onkeyup ="calculareditartotal()" style="text-align:right;">
                </div>
                <div class="col-sm-3">  
                  <label for="total-item">Total</label>
                  <input type="text" disabled="readonly" class="form-control form-control-sm" id="editar_total_item" style="text-align:right;">
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="editar_CODALM">
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="editar_SERVIC">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn-eliminar" onclick="editarProducto()">Guardar</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>    
   
    <div id="content">
    <div class="container facturacion">
      <div class="row">
        <div class="col-sm-3">
          <label for="Fec_doc">Fecha</label>
          <input type="date" class="form-control form-control-sm" id="Fec_doc" value="<?php echo date('Y-m-d')?>">
        </div>
        <div class="col-sm-3">
          <label for="alm_des">Almacén destino</label>
          <select class="custom-select" id="alm_des" aria-label="Example select with button addon">
          </select>
        </div>
        <div class="col-sm-3">
          <label for="codtran">Tipo Transacción</label>
          <select class="custom-select" id="codtran" aria-label="Example select with button addon">
          </select>
        </div>
        <div class="col-sm-3">
          <label for="razmov">Razón Movimiento</label>
          <select class="custom-select" id="razmov" aria-label="Example select with button addon">
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <label for="Ruc">Proveedor-Cliente</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-sm" id="ruc" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn-search form-control-sm" type="button" id="button-addon2" onclick="buscarClienteProveedor()"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <label for="raz_social">Razon Social</label>
          <input type="text" class="form-control form-control-sm" id="raz_social">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <label for="tipdoc">Tipo Documento</label>
          <select class="custom-select" id="tipdoc" aria-label="Example select with button addon">
          </select>
        </div>
        <div class="col-sm-2">
          <label for="serie">Serie</label>
          <input type="text" class="form-control form-control-sm" id="serie">
        </div>
        <div class="col-sm-3">
          <label for="numdoc">N° Documento</label>
          <input type="text" class="form-control form-control-sm" id="numdoc">
        </div>
        <div class="col-sm-2">
          <label for="moneda">Moneda</label>
          <select class="custom-select" id="moneda" aria-label="Example select with button addon">
          </select>
        </div>
        <div class="col-sm-2">
          <label for="numord">N° Orden Compra</label>
          <input type="text" class="form-control form-control-sm" id="numord">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <label for="TOTNETO">Total Venta</label>
          <input type="text" class="form-control form-control-sm" id="TOTNETO">
        </div>
        <div class="col-sm-3">
          <label for="TOTIGV">I.G.V</label>
          <input type="text" class="form-control form-control-sm" id="TOTIGV">
        </div>
        <div class="col-sm-3">
          <label for="TOTBRU">SubTotal</label>
          <input type="text" class="form-control form-control-sm" id="TOTBRU">
        </div>
        <div class="col-sm-3">
          <label for="TOTEXO">Exonerada</label>
          <input type="text" class="form-control form-control-sm" id="TOTEXO">
        </div>
      </div>
 
    </div>
    <div class="container table-responsive">
    <table class="table table-striped table-sm table-bordered" id="tabla_producto">
          <thead class="cabecera table-bordered">
            <tr>
              <th class="codigo ">Código</th>
              <th class="descrip">Descripción</th> 
              <th class="Cant">Cant.</th>
              <th class="STOLIN" style="display: none;">STOLIN</th>
              <th class="precio_u">Precio Unit.</th>
              <th class="Total">Total</th>
              <th class="CODALM"style="display: none;">CODALM</th>
              <th class="EXONER"style="display: none;">EXONER</th>
              <th class="INAFEC"style="display: none;">INAFEC</th>
              <th class="SERVIC"style="display: none;">SERVIC</th>
              <th class="CODLIN">CODLIN</th>
              <th class="CODSLI">CODSLI</th>
              <th class="CODITE">CODITE</th>
              <th class="IDPROD">IDPROD</th>
              <th class="opc"></th>
            </tr>
          </thead>
          <tbody>
              
          </tbody>
        </table>
      <div class="container calculo">
        <div class="row justify-content-center">
          <div class="col-sm-8" align="right">
            <label>SubTotal:</label>
          </div>
          <div class="col-sm-2">
            <input type="text" disabled="readonly" class="form-control form-control-sm" id="subTotal" value="000.00">
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-8" align="right">
            <label>Base Imponible:</label>
          </div>
          <div class="col-sm-2">
            <input type="hide" disabled="readonly" class="form-control form-control-sm" id="basimp" value="000.00">
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-8" align="right">
            <label>Exoneración:</label>
          </div>
          <div class="col-sm-2">
            <input type="text" disabled="readonly" class="form-control form-control-sm" id="exoneracion" value="000.00">
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-8" align="right">
            <label>Inafectos:</label>
          </div>
          <div class="col-sm-2">
            <input type="text" disabled="readonly" class="form-control form-control-sm" id="inafectos" value="000.00">
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-8" align="right">
            <label>I.G.V (18%):</label>
          </div>
          <div class="col-sm-2">
            <input type="text" disabled="readonly" class="form-control form-control-sm" id="igv" value="000.00">
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-8" align="right">
            <label><strong>TOTAL:</strong></label>
          </div>
          <div class="col-sm-2">
            <input type="text" disabled="readonly" class="form-control form-control-sm" id="total" value="000.00">
          </div>
        </div>
      </div>
      <button type="button" class="producto" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-shopping-cart"></i> Agregar Producto
      </button>
      <button type="button"  class="producto"  onclick="validar_campos()" ><i class="fa fa-file-alt"></i> Generar Nota Ingreso</button>
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
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/productos.js"></script> 
    <script type="text/javascript" src="js/clientes.js"></script> 
    <script type="text/javascript" src="js/nota_ingreso.js"></script> 
    <script type="text/javascript" src="js/tabla-proveedores.js"></script> 
  </body>
</html>