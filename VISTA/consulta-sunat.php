<!Doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/consulta-sunat.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Consulta Sunat</title>
  </head>
  <body>
  <?php include("header.php") ?> 
      <div id="content">
        <div class="container">
          <div class="container tabla">
           <div class="row">
              <div class="col-sm-4 col-lg-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input my-error" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Usar Fecha</label>
                    </div>
              </div>
              <div class="form-inline col-sm-3">
                 <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Según</label>
                  <select class="custom-select my-1 mr-sm-3" id="inlineFormCustomSelectPref">
                    <option selected>....</option>
                    <option value="1">FECHA CARGA</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
              </div>
              <div class="form-inline col-sm-3">
                <input type="date" id="inputPassword6" class="form-control form-control-sm mx-sm-3" aria-describedby="passwordHelpInline">
              </div>
              <div class="form-inline col-sm-4">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Estado</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                  <option selected>....</option>
                  <option value="1">TODOS</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
         </div>
           <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">        
                  <table id="consul-ingreso-egreso" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th class="Num">Núm.</th>
                              <th class="N-doc">N° Documento</th>
                              <th class="fec-carg">Fec. Carg.</th>
                              <th class="fec-gen">Fec. Gene.</th>
                              <th class="fec-env">Fec. Env.</th>
                              <th class="estado">Estado</th>
                              <th class="obs">Obervación</th>
                              <th class="opc"></th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>0001</td>
                              <td>1597536482</td>
                              <td>11/05/2020</td>
                              <td>13/05/2020</td>
                              <td>14/05/2020</td>
                              <td>A</td>
                              <td>NINGUNA</td>
                              <td align="center"><a href="#"><i class="fa fa-print"></i></a></td>
                          </tr>
                      </tbody>        
                  </table>                  
                </div>
              </div>
            </div><br><br><br>
          <div class="container-fluid fixed-bottom footer">
             <div class="container">
              <span><i class="fa fa-phone-alt"></i> (+511) 531-0306</span>
              <span><i class="fa fa-globe"></i> www.alteresperu.com</span>
              <span><i class="fa fa-envelope"></i> informes@alteresperu.com</span>
              <span><i class="fa fa-map-marker-alt"></i> Lima, Peru</span>
              </div>
         </div>   
          </div>    
        </div>
        <?php include("menu-footer.php") ?> 
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd745ef3b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/consul-ingreso-egreso.js"></script> 
  </body>
</html>