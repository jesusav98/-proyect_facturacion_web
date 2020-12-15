<nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
      <button id="sidebarCollapse" class="btn navbar-btn">
        <i class="fas fa-lg fa-bars"></i>
      </button>
      <a class="navbar-brand" href="index.php">
        <h3 id="logo">ADMINSOFT - <?php echo $_SESSION['NOMCIA']; ?></h3>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> USUARIO: <?php echo $_SESSION['TXCODIGOUSUARIO']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../CONTROLLER/controller_usuario.php?opc_usuario=1"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
          <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#cambiar-psw"><i class="fa fa-lock"></i> Cambiar contraseña</a>
        </div>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-alt"></i> USUARIO: <?php echo $_SESSION['TXCODIGOUSUARIO']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../CONTROLLER/controller_usuario.php?opc_usuario=1"><i class="fa fa-power-off" ></i> Cerrar Sesión</a>
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
                  <a href="tablas-generales.php"><i class="fa fa-table"></i> Tablas Generales</a>
                  <a href="mi-empresa.php"><i class="fa fa-store-alt"></i> Mi Empresa</a>
                  <a href="clientes.php"><i class="fa fa-users"></i> Clientes</a>
                  <a href="productos.php"><i class="fa fa-box-open"></i> Productos | Almacen</a>
                  <a href="proveedores.php"><i class="fa fa-people-carry"></i> Proveedores</a>
                  <a href="contadores.php"><i class="fa fa-id-card-alt"></i> Contadores</a>
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
                  <a href="cotizacion.php"><i class="fa fa-calculator"></i> Cotización</a>
                  <a href="mant-cotizacion.php"><i class="fa fa-file-signature"></i> Mant. Cotización</a>
                  <a href="facturacion.php"><i class="fas fa-clipboard"></i> Facturación</a>
                  <a href="anulacion-documentos.php"><i class="fa fa-ban"></i> Anulación Doc.</a>
                  <a href="nota-ingreso-egreso.php"><i class="fa fa-file"></i> Nota Ingreso | Egreso</a>
                  <a href="eliminar-n-ingr-egr.php"><i class="fa fa-trash"></i> Elimin. Nota Ingreso</a>
                  <a href="envio-sfs.php"><i class="fa fa-file-export"></i> Envío SFS</a>
                  <a href="respuesta-sunat.php"><i class="fa fa-comment-dollar"></i> Respuesta Sunat</a>
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
                  <a href="consulta-cotizaciones.php"><i class="fa fa-calculator"></i> Cotizaciones</a>
                  <a href="consulta-facturas.php"><i class="fas fa-clipboard"></i> Facturaciones</a>
                  <a href="consulta-nota-ingreso.php"><i class="fa fa-file"></i> Notas Ingreso</a>
                  <a href="consulta-kardex.php"><i class="fa fa-file"></i> Kardex</a>
                  <a href="consulta-sunat.php"><i class="fa fa-search"></i> Consulta Sunat</a>
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
                  <a href="usuarios.php"><i class="fa fa-user-friends"></i> Usuarios</a>
                  <a href="correo-web.php"><i class="fa fa-envelope-open-text"></i> Correo Web</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </nav>

 