<?php
  session_name("adminsoft");
  session_start();
  $datos=$_REQUEST['datos'];//CODCLI
  $datos1=$_REQUEST['datos1'];//TX_RUC
?>
<div class="modal fade" id="ver_locales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-store"></i> Otros locales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form class="container">
            <button type="button" class="nuevo-local" data-toggle="modal" data-target="#nuevo-local">
              <i class="fa fa-plus"></i> Nuevo Local
            </button>
            <h5>Cliente - <?php echo $datos1; ?></h5>
            <div class="table-responsive">        
              <table id="locales" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th  >Dirección de Despacho</th>
                          <th  >Contacto</th>
                          <th  ></th>
                      </tr>
                  </thead> 
                  <tbody>
                  <?php 
                    $opc_consulta=6;
                    $_SESSION['CODCLI']=$datos;
                    include('../CONTROLLER/controller_consultas.php');
                    while ($reg=$filas->fetch_object()) { 
                      $NUM=$reg->NUM;
                      $subdatos=$reg->NOMLOC."||".
                      $reg->CONTACTO."||".
                      $reg->CODDPTO."||".
                      $reg->CODPROV."||".
                      $reg->CODCIU."||". 
                      $reg->DIRENT."||".
                      $reg->TELEFO."||".
                      $reg->CELULAR."||".
                      $reg->CORREO."||".
                      $reg->PAGWEB."||".
                      $reg->NUM
                  ?>
                      <tr>
                          <td><?php echo $reg->DIRENT ?></td>
                          <td><?php echo $reg->CONTACTO ?></td> 
                          <td align="center">
                              <a href="#" data-toggle="modal" data-target="#editar-local" onClick="llenardatos_anexoscliente('<?php echo $subdatos;?>');" ><i class="fa fa-pencil"></i></a>
                              <a href="#" data-toggle="modal" data-target="#eliminar-local" onClick="llenardatos_anexocliente_eli('<?php echo $NUM;?>');"><i class="fa fa-remove"></i></a>
                          </td>
                      </tr>
                  <?php }?>
                  </tbody>        
              </table>                  
            </div>
          </form>  
        </div>     
      </div>
    </div>
  </div>
</div>
<!-- Modal Nuevo local -->
<div class="modal fade" id="nuevo-local" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevo-local"><i class="fa fa-store"></i> Nuevo Local</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="../CONTROLLER/controller_anexoscliente.php?opc_anexocliente=1&_CODCLI=<?php echo $datos; ?>&_TX_RUC=<?php echo $datos1; ?>" method="POST" autocomplete="off">
          <div class="container">
            <div class="row">
              <div class="col-sm-9">
                  <label for="_NOMLOC">Nombre Local</label>
                  <input type="text" class="form-control form-control-sm" id="_NOMLOC" name="_NOMLOC" required>
              </div>
              <div class="col-sm-3">
                  <label for="_Contacto">Contacto</label>
                  <input type="text" class="form-control form-control-sm" id="_Contacto" name="_Contacto" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <label for="_Departamentos"> Dpto / Región</label>
                  <select id="_Departamentos" name="_Departamentos" class="custom-select"></select>
              </select>
              </div>
              <div class="col-sm-4">
                  <label for="_Provincias"> Provincias</label>
                  <select class="custom-select" id="_Provincias" class="custom-select" name="_Provincias">
                  </select>
              </div>
              <div class="col-sm-4">
                  <label for="_Distritos"> Distritos</label>
                  <select class="custom-select" id="_Distritos" name="_Distritos" class="custom-select">
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                  <label for="Direccion">Dirección</label>
                  <input type="text" class="form-control form-control-sm" id="_Direccion" name="_Direccion" required>
              </div>
              <div class="col-sm-4">
                  <label for="_Telf">Teléfono</label>
                  <input type="text" class="form-control form-control-sm" id="_Telf" name="_Telf">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <label for="_cel">Celular</label>
                  <input type="text" class="form-control form-control-sm" id="_cel" name="_cel">
              </div>
              <div class="col-sm-4">
                  <label for="_Correo">Correo E.</label>
                  <input type="mail" class="form-control form-control-sm" id="_Correo" name="_Correo">
              </div>
              <div class="col-sm-4">
                  <label for="_Web">Web</label>
                  <input type="text" class="form-control form-control-sm" id="_Web" name="_Web">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn-guardar">Guardar Local</button>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>
<!-- Modal Editar local -->
<div class="modal fade" id="editar-local" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-store"></i> Editar Local</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="" action="../CONTROLLER/controller_anexoscliente.php?opc_anexocliente=2&_CODCLI=<?php echo $datos; ?>&_TX_RUC=<?php echo $datos1; ?>" method="POST" autocomplete="off">
          <div class="container">
            <input type="text" id="_editar_num" name="_editar_num" hidden>
            <div class="row">
              <div class="col-sm-9">
                  <label for="_editar_NOMLOC">Nombre Local</label>
                  <input type="text" class="form-control form-control-sm" id="_editar_NOMLOC" name="_editar_NOMLOC">
              </div>
              <div class="col-sm-3">
                  <label for="_editar_Contacto">Contacto</label>
                  <input type="text" class="form-control form-control-sm" id="_editar_Contacto" name="_editar_Contacto">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <label for="_editar_Departamentos"> Dpto / Región</label>
                  <select id="_editar_Departamentos" name="_editar_Departamentos" class="custom-select"></select>
              </select>
              </div>
              <div class="col-sm-4">
                  <label for="_editar_Provincias"> Provincias</label>
                  <select class="custom-select" id="_editar_Provincias" class="custom-select" name="_editar_Provincias">
                  </select>
              </div>
              <div class="col-sm-4">
                  <label for="_editar_Distritos"> Distritos</label>
                  <select class="custom-select" id="_editar_Distritos" name="_editar_Distritos" class="custom-select">
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                  <label for="_editar_Direccion">Dirección</label>
                  <input type="text" class="form-control form-control-sm" id="_editar_Direccion" name="_editar_Direccion">
              </div>
              <div class="col-sm-4">
                  <label for="_editar_Telf">Teléfono</label>
                  <input type="text" class="form-control form-control-sm" id="_editar_Telf" name="_editar_Telf">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <label for="_editar_cel">Celular</label>
                  <input type="text" class="form-control form-control-sm" id="_editar_cel" name="_editar_cel">
              </div>
              <div class="col-sm-4">
                  <label for="_editar_Correo">Correo E.</label>
                  <input type="mail" class="form-control form-control-sm" id="_editar_Correo" name="_editar_Correo">
              </div>
              <div class="col-sm-4">
                  <label for="_editar_Web">Web</label>
                  <input type="text" class="form-control form-control-sm" id="_editar_Web" name="_editar_Web">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn-guardar">Editar Local</button>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>
<!-- Modal eliminar local -->
<div class="modal fade" id="eliminar-local" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-store"></i> Eliminar Local</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="../CONTROLLER/controller_anexoscliente.php?opc_anexocliente=3&_CODCLI=<?php echo $datos; ?>" method="POST">
          <div class="container">
          <div class="row">
            <div class="col-sm-12">
                <h5 align="center">¿Desea eliminar el Anexo del Cliente?</h5>
                <input hidden name='_anexocliente_eli' id='_anexocliente_eli'/>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
          <input type="submit" id="btn_eliminar_cliente" value="Si, eliminar" class="btn-guardar">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
  
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript" src="js/locales.js"></script> 
<script type="text/javascript" src="js/ubigeo_anexos_clientes.js"></script> 
<script type="text/javascript" src="js/funciones.js"></script> 