<!Doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/correo-web.css">
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
      <!-- Modal guardar datos-->
       <div class="modal fade" id="guardar-datos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-save"></i> Guardar datos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                        <h5 align="center">¿Desea guardar los datos?</h5>
                    </div>
                  </div>
                <div class="modal-footer"s>
                  <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn-eliminar">Si, guardar</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
 
      <div id="content"> 
         <form class="mi-empresa">
          <div class="container col-sm-6">
            <div class="row">
              <div class="col-sm-12" align="center">
                  <i class="fa fa-envelope-open-text icono"></i>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                  <label for="Correo">Correo</label>
                  <input type="text" class="form-control form-control-sm" id="Correo">
              </div>
              <div class="col-sm-6">
                  <label for="psw">Contraseña</label>
                  <input type="password" class="form-control form-control-sm" id="psw">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                  <label for="Servidor">Servidor</label>
                  <input type="text" class="form-control form-control-sm" id="Servidor">
              </div>
              <div class="col-sm-6">
                  <label for="Asunto">Asunto</label>
                  <input type="text" class="form-control form-control-sm" id="direccion">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-12">
                <label for="exampleFormControlTextarea1">Mensaje</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </div>
            <div class="row justify-content-end">
             <input type="submit" value="Guardar" class="guardar-datos">
              </button>
            </div>
          </div>
        </form><br><br><br>
        <?php include("menu-footer.php") ?> 
      </div>
  </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script> 
  </body>
</html>