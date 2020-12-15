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
    <link rel="stylesheet" href="css/usuario.css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Usuarios</title>
  </head>
  <body>
  <?php include("header.php") ?>
  <!-- Modal Nuevo Usuario -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-plus"></i> Nuevo Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="../CONTROLLER/controller_usuario.php?opc_usuario=3" method="POST" autocomplete="off">
          <div class="container">
          <div class="row">
            <div class="col-sm-6">
                <label for="DNI">DNI</label>
                <input type="text" class="form-control form-control-sm" id="DNI" name="DNI" maxlength="8" onkeypress='return validaNumericos(event)'>
            </div>
            <div class="col-sm-6">
                <label for="Nombres">Nombres</label>
                <input type="text" class="form-control form-control-sm" id="Nombres" name="Nombres">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <label for="Ape_Paterno">Ape. Paterno</label>
                <input type="text" class="form-control form-control-sm" id="Ape_Paterno" name="Ape_Paterno">
            </div>
            <div class="col-sm-6">
                <label for="Ape_Materno">Ape. Materno</label>
                <input type="text" class="form-control form-control-sm" id="Ape_Materno" name="Ape_Materno">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <label for="Fec_Nac">Fec. Nacimiento</label>
                <input type="date" class="form-control form-control-sm" id="Fec_Nac" name="Fec_Nac">
            </div>
            <div class="col-sm-6">
                <label for="Correo">Correo E.</label>
                <input type="text" class="form-control form-control-sm" id="Correo" name="Correo">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <label for="Usuario">Usuario</label>
                <input type="text" class="form-control form-control-sm" id="Usuario" name="Usuario">
            </div>
            <div class="col-sm-6">
              <label for="Perfil">Perfil</label>
              <select class="custom-select" id="Perfil" aria-label="Example select with button addon" name="Perfil">
                <option value="1">Administrador</option>
                <option value="2">Consultas</option>
              </select>
            </div>
          </div>
          
          
          <div class="row">
            <div class="col-sm-6">
                <label for="Fec_Cad">Fec. Caducidad</label>
                <input type="date" class="form-control form-control-sm" id="Fec_Cad" name="Fec_Cad">
            </div>
            <div class="col-sm-6">
                <label for="Estado">Estado</label>
                <select class="custom-select" id="Estado" aria-label="Example select with button addon" name="Estado">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <label for="Contrasena">Contraseña</label>
                <input type="password" class="form-control form-control-sm" id="Contrasena" name="Contrasena" autocomplete="new-password">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
          <input type="submit" value="Guardar" class="btn-guardar">
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
   
<!-- Modal Editar usuario -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-edit"></i> Editar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="../CONTROLLER/controller_usuario.php?opc_usuario=2" method="POST">
          <div class="container">
          <div class="row">
            <div class="col-sm-6">
                <label for="editar_DNI">DNI</label>
                <input type="text" class="form-control form-control-sm" id="editar_DNI" name="editar_DNI" readonly >
            </div>
            <div class="col-sm-6">
                <label for="editar_Nombres">Nombres</label>
                <input type="text" class="form-control form-control-sm" id="editar_Nombres" name="editar_Nombres"readonly>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-6">
                <label for="editar_Ape_Paterno">Ape. Paterno</label>
                <input type="text" class="form-control form-control-sm" id="editar_Ape_Paterno" name="editar_Ape_Paterno"readonly>
            </div>
            <div class="col-sm-6">
                <label for="editar_Ape_Materno">Ape. Materno</label>
                <input type="text" class="form-control form-control-sm" id="editar_Ape_Materno" name="editar_Ape_Materno"readonly>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-6">
                <label for="editar_Fec_Nac">Fec. Nacimiento</label>
                <input type="date" class="form-control form-control-sm" id="editar_Fec_Nac" name="editar_Fec_Nac">
            </div>
            <div class="col-sm-6">
                <label for="editar_Correo">Correo E.</label>
                <input type="text" class="form-control form-control-sm" id="editar_Correo" name="editar_Correo">
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-6">
                <label for="editar_Usuario">Usuario</label>
                <input type="text" class="form-control form-control-sm" id="editar_Usuario" name="editar_Usuario" readonly >
            </div>
            <div class="col-sm-6">
              <label for="editar_Perfil">Perfil</label>
              <select class="custom-select" id="editar_Perfil" aria-label="Example select with button addon" name="editar_Perfil">
                <option value="1">Administrador</option>
                <option value="2">Consultas</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <label for="editar_Fec_Cad">Fec. Caducidad</label>
                <input type="date" class="form-control form-control-sm" id="editar_Fec_Cad" name="editar_Fec_Cad">
            </div>
            <div class="col-sm-6">
                <label for="editar_Estado">Estado</label>
                <select class="custom-select" id="editar_Estado" aria-label="Example select with button addon" name="editar_Estado">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
          <input type="submit" value="Editar" class="btn-guardar">
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
    
 <!-- Modal Eliminar usuario -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-times"></i> Eliminar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="" action="../CONTROLLER/controller_usuario.php?opc_usuario=4" method="POST">
          <div class="container">
          <div class="row">
            <div class="col-sm-12">
                <h5 align="center">¿Desea eliminar el usuario <label id="Usuario_eli_">Usuario</label>?</h5>
                <input type='hidden' name='Usuario_eli' id='Usuario_eli'/>
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
    <div id="content">
        <div class="container tabla">
        <button type="button" class="nuevo-usuario" data-toggle="modal" data-target="#exampleModal">
         <i class="fa fa-user-plus"></i> Nuevo Usuario
        </button>
        <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="codigo">Código</th>
                                <th class="dni">DNI</th>
                                <th class="ApePat">Apellido Pat.</th>
                                <th class="ApeMat">Apellido Mat.</th>
                                <th class="nombres">Nombres</th>
                                <th class="opciones"></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                            $opc_consulta=0;
                            include('../CONTROLLER/controller_consultas.php');
                            while ($reg=$filas->fetch_object()) { 
                              $TXCODIGOUSUARIO=$reg->TXCODIGOUSUARIO;
                              $datos=$reg->TXDNI."||".
                              $reg->TXNOMBRES."||".
                              $reg->TXAPELLIDOPATERNO."||".
                              $reg->TXAPELLIDOMATERNO."||".
                              $reg->FENACIMIENTO."||".
                              $reg->TXCORREOELECTRONICO."||".
                              $reg->TXCODIGOUSUARIO."||".
                              $reg->IDPERFIL."||".
                              $reg->FECADUCIDAD."||".
                              $reg->NUESTADO;
                              ?>
                            <tr>
                                <td><?php echo $reg->TXCODIGOUSUARIO ?></td>
                                <td><?php echo $reg->TXDNI ?></td>
                                <td><?php echo $reg->TXAPELLIDOPATERNO ?></td>
                                <td><?php echo $reg->TXAPELLIDOMATERNO ?></td>
                                <td><?php echo $reg->TXNOMBRES ?></td>
                                <td align="center">
                                  <a href="#" data-toggle="modal" data-target="#exampleModal2" onClick="llenardatos_usuario('<?php echo $datos;?>');"><i class="fa fa-pencil"></i></a>
                                  <a href="#" data-toggle="modal" data-target="#exampleModal3" onClick="llenardatos_usu_eli('<?php echo $TXCODIGOUSUARIO;?>','<?php echo $_SESSION['TXCODIGOUSUARIO'];?>');"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>        
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    
    <?php include("menu-footer.php") ?> 
    </div>
  </div>
    <!-- first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/funciones.js"></script> 
  </body>
</html> 