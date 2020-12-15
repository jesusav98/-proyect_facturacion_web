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
    <link rel="stylesheet" href="css/tablas-generales.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Tablas Generales</title>
  </head>
  <body>
      <?php include("header.php") ?>
      <!-- Modal Nueva tabla -->
      <div class="modal fade" id="nueva-tabla" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-ml modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-table"></i> Nueva Tabla</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="../CONTROLLER/controller_sistab.php?opc_sistab=1&Tabla=000&Orden=0" method="POST" autocomplete="off">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="SubTabla">Tabla</label>
                      <input type="text" class="form-control form-control-sm" id="SubTabla" name="SubTabla" Required>
                    </div>
                    <div class="col-sm-8">
                      <label for="Descrip_corta">Descrip. Corta</label>
                      <input type="text" class="form-control form-control-sm" id="Descrip_corta" name="Descrip_corta" Required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="Descrip_larga">Descrip. Larga</label>
                      <input type="text" class="form-control form-control-sm" id="Descrip_larga" name="Descrip_larga" Required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn-guardar">Guardar Tabla</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Editar tabla -->
      <div class="modal fade" id="editar-tabla" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-ml modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-table"></i> Editar Tabla</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="../CONTROLLER/controller_sistab.php?opc_sistab=2&Tabla=000&Orden=0" method="POST" autocomplete="off">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="editar_SubTabla">Tabla</label>
                      <input type="text" class="form-control form-control-sm" id="editar_SubTabla" name="editar_SubTabla" readonly>
                    </div>
                    <div class="col-sm-8">
                      <label for="editar_Descrip_corta">Descrip. Corta</label>
                      <input type="text" class="form-control form-control-sm" id="editar_Descrip_corta" name="editar_Descrip_corta">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="editar_Descrip_larga">Descrip. Larga</label>
                      <input type="text" class="form-control form-control-sm" id="editar_Descrip_larga" name="editar_Descrip_larga">
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn-guardar">Guardar Tabla</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal eliminar Tabla -->
      <div class="modal fade" id="eliminar-tabla" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-table"></i> Eliminar Tabla</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="../CONTROLLER/controller_sistab.php?opc_sistab=3&Tabla=000" method="POST" autocomplete="off">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                        <h5 align="center">¿Desea eliminar la tabla seleccionada?</h5>
                        <input type='hidden' name='tabla_eli' id='tabla_eli'/>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                  <input type="submit" id="btn_eliminar_usuario" value="Si, eliminar" class="btn-guardar">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="sub_tabla">
      </div>

      <div id="content">
        <div class="container">
          <div class="container tabla">
            <br>
            <button type="button" class="nuevo-producto" data-toggle="modal" data-target="#nueva-tabla">
                <i class="fa fa-plus"></i> Nueva tabla
            </button>
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">        
                  <table id="tablas-generales" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                          <th class="codigo">Tabla</th>
                          <th class="descrip-larga">Descrip. Larga</th>
                          <th class="opciones"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $opc_consulta=4;
                        include('../CONTROLLER/controller_consultas.php');
                        while ($reg=$filas->fetch_object()) { 
                          $SIS_NUMELE=$reg->SIS_NUMELE;
                          $SIS_DESLAR=$reg->SIS_DESLAR;
                          $SIS_DESCOR=$reg->SIS_DESCOR;
                          $datos=$reg->SIS_NUMTAB."||".
                          $reg->SIS_NUMELE."||".
                          $reg->SIS_DESLAR."||".
                          $reg->SIS_DESCOR."||".
                          $reg->SIS_DESNUM;
                      ?>
                      <tr>
                        <td><?php echo $reg->SIS_NUMELE; ?></td>
                        <td><?php echo $reg->SIS_DESLAR; ?></td>
                        <td align="left">
                          <a href="#" data-toggle="modal" data-target="#editar-tabla" onClick="llenardatos_tablas('<?php echo $datos;?>');"><i class="fa fa-pencil"></i></a>
                          <a href="#" data-toggle="modal" data-target="#eliminar-tabla" onClick="llenardatos_tablas_eli('<?php echo $SIS_NUMELE;?>');"><i class="fa fa-remove"></i></a>
                          <a href="#" class="um" onclick="llenardatos_subtablas('<?php echo $SIS_NUMELE;?>','<?php echo $SIS_DESLAR;?>');"><?php echo $SIS_DESCOR;?></a>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>        
                  </table>                  
                </div>
              </div>
            </div>
             <br><br><br>  
          </div> 
        </div>
        <?php include("menu-footer.php") ?>
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS  -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js" defer></script>    
    <script type="text/javascript" src="js/tabla-generales.js"></script> 
    <script type="text/javascript" src="js/funciones.js"></script> 
    <!--    <script type="text/javascript" src="js/selec-fila.js"></script> -->
  </body>
</html>

<?php
  $error_sistab=$_SESSION["error_sistab"];
  if($error_sistab==1){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Tabla creada con exito!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["error_sistab"]="";
  }
  if($error_sistab==2){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al crear tabla!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["error_sistab"]="";
  }
  if($error_sistab==3){
    echo "<div class='alerta alert alert-success'>
    <strong>¡Datos actualizados correctamente!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["error_sistab"]="";
  }
  if($error_sistab==4){
    echo "<div class='alerta alert alert-danger'>
    <strong>¡Error al actualizar datos!</strong>
    </div>";
    echo "<script>";
    echo "alertaMostrar();";
    echo "</script>";
    $_SESSION["error_sistab"]="";
  }
?>