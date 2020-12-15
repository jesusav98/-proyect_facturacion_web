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
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/contadores.css">
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
    <title>Contadores</title>
  </head>
  <body>
    
    
  <?php include("header.php") ?> 
<!-- Modal Nuevo Contador -->
  <div class="modal fade" id="nuevo-contador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-id-card-alt"></i> Nuevo Contador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../CONTROLLER/controller_contador.php?opc_Contador=1" method="POST" autocomplete="off"> 
            <div class="container">
              <div class="row">
                <div class="col-sm-4">
                  <label for="Tipo_Doc"> Tipo Doc.</label>
                    <select class="custom-select" id="Tipo_Doc" name="Tipo_Doc" aria-label="Example select with button addon">
                    </select>
                </div>
                <div class="col-sm-3">
                  <label for="serie">Serie</label>
                  <input type="text" class="form-control form-control-sm" id="serie" name="serie" required>
                </div>
                <div class="col-sm-2">
                  <label for="contador">Contador</label>
                  <input type="text" class="form-control form-control-sm" id="contador" name="contador">
                </div>
                <div class="col-sm-3">
                  <label for="formato">Formato</label>
                  <select class="custom-select" id="formato" name="formato" aria-label="Example select with button addon">
                    <option value="1">Formato A4</option>
                    <option value="2">Formato Ticket</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label for="descripcion">Descripción</label>
                  <input type="text" class="form-control form-control-sm" id="descripcion" name="descripcion" required>
                </div>
                <div class="col-sm-3">
                  <label for="Tipo_Emi"> Tipo Emisión</label>
                    <select class="custom-select" id="Tipo_Emi" name="Tipo_Emi" aria-label="Example select with button addon">
                      <option value="1">AUTOMÁTICA</option>
                      <option value="2">MANUAL</option>
                    </select>
                </div>
                <div class="col-sm-3">
                  <label for="pv">Punto Venta</label>
                  <select class="custom-select" id="pv" name="pv" aria-label="Example select with button addon">
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <label for="Almacen">Almacén</label>
                  <select class="custom-select" id="Almacen" name="Almacen"  aria-label="Example select with button addon">
                    </select>
                </div>
                <div class="col-sm-8">
                  <label for="Domicilio">Domicilio</label>
                  <input type="text" class="form-control form-control-sm" id="Domicilio" name="Domicilio">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="predeterminado" name="predeterminado">
                    <label class="form-check-label" for="defaultCheck1">
                      Predeterminado
                    </label>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn-guardar">Guardar Contador</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Editar contador -->
  <div class="modal fade" id="editar-contador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-id-card-alt"></i> Editar Contador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../CONTROLLER/controller_contador.php?opc_Contador=2" method="POST" autocomplete="off"> 
              <div class="container">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="editar_Tipo_Doc"> Tipo Doc.</label>
                    <select class="custom-select" id="editar_Tipo_Doc" name="editar_Tipo_Doc" disabled ></select>
                    <input type="hidden" class="form-control form-control-sm" id="_editar_Tipo_Doc" name="_editar_Tipo_Doc" readonly>
                  </div>
                  <div class="col-sm-3">
                    <label for="editar_serie">Serie</label>
                    <input type="text" class="form-control form-control-sm" id="editar_serie" name="editar_serie" readonly>
                  </div>
                  <div class="col-sm-2">
                    <label for="editar_contador">Contador</label>
                    <input type="text" class="form-control form-control-sm" id="editar_contador" name="editar_contador">
                  </div>
                  <div class="col-sm-3">
                    <label for="formato">Formato</label>
                    <select class="custom-select" id="editar_formato" name="editar_formato" aria-label="Example select with button addon">
                      <option value="1">Formato A4</option>
                      <option value="2">Formato Ticket</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label for="editar_descripcion">Descripción</label>
                    <input type="text" class="form-control form-control-sm" id="editar_descripcion" name="editar_descripcion">
                  </div>
                  <div class="col-sm-3">
                    <label for="editar_Tipo_Emi"> Tipo Emisión</label>
                      <select class="custom-select" id="editar_Tipo_Emi" name="editar_Tipo_Emi" >
                        <option value="1">AUTOMÁTICA</option>
                        <option value="2">MANUAL</option>
                      </select>
                  </div>
                  <div class="col-sm-3">
                    <label for="editar_pv">Punto Venta</label>
                    <select class="custom-select" id="editar_pv" name="editar_pv" aria-label="Example select with button addon">
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <label for="editar_Almacen">Almacén</label>
                    <select class="custom-select" id="editar_Almacen" name="editar_Almacen"  aria-label="Example select with button addon">
                      </select>
                  </div>
                  <div class="col-sm-8">
                    <label for="editar_Domicilio">Domicilio</label>
                    <input type="text" class="form-control form-control-sm" id="editar_Domicilio" name="editar_Domicilio">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="editar_predeterminado" name="editar_predeterminado">
                      <label class="form-check-label" for="editar_predeterminado">
                        Predeterminado
                      </label>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-guardar">Guardar Contador</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal eliminar contador -->
  <div class="modal fade" id="eliminar-contador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-id-card-alt"></i> Eliminar contador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../CONTROLLER/controller_contador.php?opc_Contador=3" method="POST" autocomplete="off"> 
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                    <h5 align="center">¿Desea eliminar el contador seleccionado?</h5>
                    <input type='hidden' name='cladoc_eli' id='cladoc_eli'/>
                    <input type='hidden' name='serie_eli' id='serie_eli'/>
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
        <button type="button" class="nuevo-contador" data-toggle="modal" data-target="#nuevo-contador">
            <i class="fa fa-plus"></i> Nuevo Contador
        </button>
        
          <div class="row">
            <div class="col-sm-12">
              <div class="table-responsive">        
                <table id="tabla-contadores" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                        <tr>
                            <th class="TD">T/D</th>
                            <th class="serie">Serie</th>
                            <th class="descrip">Descripción</th>
                            <th class="contador">Contador</th>
                            <th class="opciones"></th>
                        </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $opc_consulta=9;
                    include('../CONTROLLER/controller_consultas.php');
                    while ($reg=$filas->fetch_object()) { 
                      $CLADOC=$reg->CLADOC;
                      $SERIE=$reg->SERIE;
                      $datos=$reg->CLADOC."||".
                      $reg->SERIE."||".
                      $reg->DESCRI."||".
                      $reg->CONTADOR."||".
                      $reg->PREDETER."||".
                      $reg->TIPEMI."||".
                      $reg->DIRGUI."||".
                      $reg->CODALM."||".
                      $reg->PV."||".
                      $reg->TIPIMP;
                      ?>
                        <tr>
                            <td><?php echo $reg->CLADOC;?></td>
                            <td><?php echo $reg->SERIE;?></td>
                            <td><?php echo $reg->DESCRI;?></td>
                            <td><?php echo $reg->CONTADOR;?></td>
                            <td align="center">
                              <a href="#" data-toggle="modal" data-target="#editar-contador" onClick="llenardatos_contador('<?php echo $datos;?>');"><i class="fa fa-pencil"></i></a>
                              <a href="#" data-toggle="modal" data-target="#eliminar-contador" onClick="llenardatos_contador_eli('<?php echo $CLADOC;?>','<?php echo $SERIE;?>');"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                  </tbody>        
                </table>                  
              </div>
            </div>
          </div><br><br><br>
           
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
    <script type="text/javascript" src="js/tabla-contadores.js"></script>
    <script type="text/javascript" src="js/combos_contador.js"></script> 
    <script type="text/javascript" src="js/funciones.js"></script> 
<!--    <script type="text/javascript" src="js/selec-fila.js"></script> -->
  </body>
</html>
<?php
  $estadoContador=$_SESSION["estadoContador"];
  if($estadoContador==1){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Contador creado con exito!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoContador"]="";
  }
  if($estadoContador==2){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al crear contador!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoContador"]="";
  }
  if($estadoContador==3){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Datos actualizados correctamente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoContador"]="";
  }
  if($estadoContador==4){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al actualizar datos!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["estadoContador"]="";
  }
?>