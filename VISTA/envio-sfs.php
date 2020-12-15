<!Doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/envio-sfs.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Envío SFS</title>
  </head>
  <body>
  <?php include("header.php") ?> 
      <div id="content">
       <form action="" name="envio-sfs">
        <div class="container">
          <div class="container tabla">
            <div class="row">
              <div class="col-sm-4">
                <label for="Fecha">Fecha</label>
                <input type="date" class="form-control form-control-sm" id="Fecha">
              </div>
              <div class="col-sm-8 marcar">
                 <label for="BtnSeleccionar">Marcar todo/Desmarcar</label>
                  <input type="checkbox" id="BtnSeleccionar" value="Marcar todo">
              </div>
              <div class="col-sm-12">
                <div class="table-responsive">        
                  <table id="tabla-envio-sfs" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th class="Num">Núm.</th>
                              <th class="Envio">Envío</th>
                              <th class="T-D">T/D</th>
                              <th class="Serie">Serie</th>
                              <th class="Doc">N° Documento</th>
                              <th class="Fec">Fecha</th>
                              <th class="Cod-cli">Cod. Cliente</th>
                              <th class="Raz-social">Razón social</th>
                              <th class="obs">Observación</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>0001</td>
                              <td>
                                  <div class="form-check">
                                    <input class=" selectall" type="checkbox" value="option1" aria-label="...">
                                  </div>
                              </td>
                              <td>-</td>
                              <td>00000S1</td>
                              <td>745476589</td>
                              <td>10/02/2020</td>
                              <td>C00000001</td>
                              <td>GROUPAGRO E.I.R.L</td>
                              <td align="center">
                                    <input class="texto-obs" type="text" aria-label="...">
                              </td>
                          </tr>
                      </tbody>        
                  </table>                  
                </div>
              </div>
              <div class="container botones">
                  <button type="submit" class="generar">Generar</button>
                  <button type="submit" class="generar">Resumen diario</button>
              </div>
            </div>  
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
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
     <script>
    $('#BtnSeleccionar').on('click', function () {
    //verificar el estado de ese checkbox si esta marcado o no
    var checked_status = this.checked;

    /*
     * asignarle ese estatus a cada uno de los checkbox
     * que tengan la clase "selectall"
     */
    $(".selectall").each(function () {
        this.checked = checked_status;
    });
    });
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>   
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/tabla-envio-sfs.js"></script> 
  </body>
</html>