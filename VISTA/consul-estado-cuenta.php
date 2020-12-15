<!Doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <link rel="stylesheet" href="css/consul-estado-cuenta.css">
    <link rel="shortcut icon" href="img/logo-admin.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384 vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="js/icons.js"></script>
    <title>Clientes</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
      <button id="sidebarCollapse" class="btn navbar-btn">
        <i class="fas fa-lg fa-bars"></i>
      </button>
      <a class="navbar-brand" href="index.html">
        <h3 id="logo">ADMINSOFT</h3>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-alt"></i>
            Sur Distribuciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#cambiar-psw"><i class="fa fa-lock"></i> Cambiar contraseña</a>
        </div>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-alt"></i>
              Sur Distribuciones
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#"><i class="fa fa-power-off" ></i> Cerrar Sesión</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiar-psw"><i class="fa fa-lock"></i> Cambiar contraseña</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  <!-- Modal Cambiar Contraseña -->
    <div class="modal fade" id="cambiar-psw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-lock"></i> Cambiar contraseña</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                    <label for="Ruc">Contraseña anterior</label>
                    <input type="text" class="form-control form-control-sm" id="Ruc">
                  </div>
                  <div class="col-sm-6">
                    <label for="raz-social">Contraseña actual</label>
                    <input type="text" class="form-control form-control-sm" id="raz-social">
                  </div>
                </div>
              </div>
              <div class="modal-footer botones-psw">
          <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn-guardar">Guardar Cambios</button>
        </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Numero Doc -->
  <div class="modal fade" id="ver-estado-cuenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> Estado de Cuentas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            
          <div class="row buscar-doc">
            <label for="n-documento" class="col-sm-2 col-lg-1 col-form-label">N° Doc.</label>
            <div class="col-sm-5 col-lg-4">
              <input class="form-control form-control-sm" type="text">
            </div>
          </div><br>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
              <thead class="cabecera table-bordered">
                <tr>
                  <th class="codigo">TD-Ser-Dcmto</th>
                  <th class="F-dcmto">F. Dcmto</th>
                  <th class="F-venta">F. Venta</th>
                  <th class="ctacte">F. CtaCte</th>
                  <th class="moneda">Moneda</th>
                  <th class="importe">Importe</th>
                  <th class="c-a">C/A</th>
                  <th class="planilla">N° Planilla</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>01-0000-0000412017</td>
                    <td>17/05/2020</td>
                    <td>19/05/2020</td>
                    <td>Producto 1</td>
                    <td>D</td>
                    <td align="right">100.00</td>
                    <td>C</td>
                    <td>0000037</td>
                  </tr>
                  <tr>
                    <td>04-0000-0000412017</td>
                    <td>05/08/2020</td>
                    <td>07/08/2020</td>
                    <td>Producto 2</td>
                    <td>D</td>
                    <td align="right">100.00</td>
                    <td>A</td>
                    <td>0000537</td>
                  </tr>
                  <tr>
                    <td>21-0000-0000820017</td>
                    <td>09/02/2020</td>
                    <td>11/02/2020</td>
                    <td>Producto 3</td>
                    <td>D</td>
                    <td align="right">100.00</td>
                    <td>C</td>
                    <td>0000337</td>
                  </tr>
              </tbody>
            </table>
            </div>
            <div class="container col-sm-10">
               <div class="row justify-content-md-center">
                <div class="col-sm-3 col-lg-2 label-soles">
                  <label for=""><strong>TOTAL S/.</strong></label>
                </div>
                <div class="col-sm-7 col-lg-4 total-soles">
                  <input class="form-control form-control-sm" type="text" disabled="readonly" value="100.00">
                </div>
              </div>
              <div class="row justify-content-md-center">
                <div class="col-sm-3 col-lg-2 label-dolar">
                  <label for=""><strong>TOTAL $.</strong></label>
                </div>
                <div class="col-sm-7 col-lg-4 total-dolar">
                  <input class="form-control form-control-sm" type="text" disabled="readonly" value="100.00">
                </div>
              </div>
            </div>   
          </form>
        </div>
      </div>
    </div>
  </div>

    <div class="wrapper fixed-left">
      <nav id="sidebar">
        <ul class="list-unstyled components">
           <li>
          <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <i class="fa fa-briefcase"></i> MAESTROS <i class="fa fa-caret-down"></i>
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <a href="tablas-generales.html"><i class="fa fa-table"></i> Tablas Generales</a>
                  <a href="mi-empresa.html"><i class="fa fa-store-alt"></i> Mi Empresa</a>
                  <a href="clientes.html"><i class="fa fa-users"></i> Clientes</a>
                  <a href="productos.html"><i class="fa fa-box-open"></i> Productos | Almacén</a>
                  <a href="proveedores.html"><i class="fa fa-people-carry"></i> Proveedores</a>
                  <a href="contadores.html"><i class="fa fa-id-card-alt"></i> Contadores</a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i class="fa fa-tasks"></i> PROCESOS <i class="fa fa-caret-down"></i>
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <a href="cotizacion.html"><i class="fa fa-calculator"></i> Cotización</a>
                  <a href="facturacion.html"><i class="fas fa-clipboard"></i> Facturación</a>
                  <a href="mant-cotizacion.html"><i class="fa fa-file-signature"></i> Mant. Cotización</a>
                  <a href="anulacion-documentos.html"><i class="fa fa-ban"></i> Anulación Doc.</a>
                  <a href="nota-ingreso-egreso.html"><i class="fa fa-file"></i> Nota Ingreso | Egreso</a>
                  <a href="eliminar-n-ingr-egr.html"><i class="fa fa-trash"></i> Elimin. Nota Ingreso</a>
                  <a href="envio-sfs.html"><i class="fa fa-file-export"></i> Envío SFS</a>
                  <a href="respuesta-sunat.html"><i class="fa fa-comment-dollar"></i> Respuesta Sunat</a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fa fa-search"></i> CONSULTAS <i class="fa fa-caret-down"></i>
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <a href="consulta-cotizaciones.html"><i class="fa fa-calculator"></i> Cotizaciones</a>
                  <a href="consulta-facturas.html"><i class="fas fa-clipboard"></i> Facturaciones</a>
                  <a href="consulta-nota-ingreso.html"><i class="fa fa-file"></i> Notas Ingreso</a>
                  <a href="consul-estado-cuenta.html"><i class="fas fa-credit-card"></i> Estados de Cuenta</a>
                  <a href="consulta-sunat.html"><i class="fa fa-search"></i> Consulta Sunat</a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fa fa-book-reader"></i> UTILITARIOS <i class="fa fa-caret-down"></i>
                  </button>
                </h5>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                  <a href="usuarios.html"><i class="fa fa-user-friends"></i> Usuarios</a>
                  <a href="correo-web.html"><i class="fa fa-envelope-open-text"></i> Correo Web</a>
                </div>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </nav>
    <div id="content">
      <div class="container tabla">
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">        
              <table id="clientes" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                        <th class="ruc">RUC</th>
                        <th class="Raz-social">Razón Social</th>
                        <th class="Direc">Dirección</th>
                        <th class="ApePat">Apellido Pat.</th>
                        <th class="ApeMat">Apellido Mat.</th>
                        <th class="nombres">Nombres</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-toggle="modal" data-target="#ver-estado-cuenta">
                        <td>70254899365</td>
                        <td>A&amp;E AGRONEGOCIOS EXPORT E.I.R.L</td>
                        <td>Cubillas</td>
                        <td>Cubillas</td>
                        <td>Ramirez</td>
                        <td>Isabel Sofia</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#ver-estado-cuenta">
                        <td>84523678543</td>
                        <td>ACP INVERSIONES CALCINA E.I.R.L</td>
                        <td>Mendoza</td>
                        <td>Mendoza</td>
                        <td>Alvarez</td>
                        <td>Juan Carlos</td>
                    </tr>                
                    <tr data-toggle="modal" data-target="#ver-estado-cuenta">
                        <td>89547251856</td>
                        <td>AGRICOLA BLANCA MARIA S.A.C</td>
                        <td>Castillo</td>
                        <td>Castillo</td>
                        <td>Perez</td>
                        <td>Adriano Martín</td>
                    </tr>
                    <tr data-toggle="modal" data-target="#ver-estado-cuenta">
                        <td>25698434561</td>
                        <td>AGRICOLA CHALLAPAMPA S.A.C</td>
                        <td>Fernandez</td>
                        <td>Fernandez</td>
                        <td>Castillo</td>
                        <td>Luciana Maria</td>
                    </tr>
                  </tbody>        
              </table>                  
            </div>
            <br>
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
         <div class="container-boton">
          <input type="checkbox" id="btn-mas">
          <div class="accesos-direc">
              <a href="clientes.html" title="Maestro - Clientes"><img src="img/maestro-cliente.svg" height="35" alt="Maestro Cliente"></a>
              <a href="cotizacion.html" title="Realizar Cotización"><img src="img/cotizacion.svg" height="35" alt="Maestro Cliente"></a>
              <a href="consulta-facturas.html" title="Consultar Facturas"><img src="img/consulta-factura.svg" height="35" alt="Maestro Cliente"></a>
              <a href="nota-ingreso-egreso.html" title="Notas de Ingreso"><img src="img/nota-ingreso.svg" height="35" alt="Maestro Cliente"></a>
              <a href="envio-sfs.html" title="Envío SFS"><img src="img/envio-sfs.svg" height="35" alt="Maestro Cliente"></a>
          </div>
        <div class="btn-mas">
            <label for="btn-mas" class="icon-mas2">
            <b>+</b></label>
        </div>
      </div> 
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
    <script type="text/javascript" src="js/clientes.js"></script> 
    <script type="text/javascript" src="js/locales.js"></script> 
  </body>
</html>