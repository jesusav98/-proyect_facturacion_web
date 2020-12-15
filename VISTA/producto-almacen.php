<?php
  session_name("adminsoft");
  session_start();
  $SUB_IDPROD=$_REQUEST["IDPROD"];
  $SUB_CODLIN=$_REQUEST["CODLIN"];
  $SUB_CODSLI=$_REQUEST["CODSLI"];
  $SUB_CODITE=$_REQUEST["CODITE"];
  $SUB_DESITE=$_REQUEST["DESITE"];
?>
<!-- Ver Almacen -->
<div class="modal fade" id="ver_almacen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-boxes"></i> Almacén</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="container">
            <button type="button" class="nuevo-almacen" data-toggle="modal" data-target="#nuevo-almacen">
                <i class="fa fa-plus"></i> Nuevo Almacén 
            </button>
            <div class="table-responsive">        
                <table id="tabla-almacen" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="almac">Almacén</th>
                            <th class="stock">Stock</th>
                            <th class="opc"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $opc_consulta=7;
                            $_SESSION['IDPROD']=$SUB_IDPROD;
                            include('../CONTROLLER/controller_consultas.php');
                            while ($reg=$filas->fetch_object()) { 
                                $CODALM=$reg->CODALM;
                                $subdatos=$reg->CODALM."||".
                                $reg->CODIGO."||".
                                $reg->FECHA_APE."||". 
                                $reg->STATUS;
                        ?>
                        <tr>
                            <td><?php echo $reg->CODALM ?></td>
                            <td><?php echo $reg->STOLIN ?></td>
                            <td align="center">
                                <a href="#" data-toggle="modal" data-target="#editar-almacen" onClick="llenardatos_almacenes('<?php echo $subdatos; ?>')"><i class="fa fa-pencil"></i></a>
                                <a href="#" data-toggle="modal" data-target="#eliminar-almacen"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>        
                </table>                  
            </div>
        </form>  
      </div>
    </div>
  </div>
</div>

<!-- Modal Nuevo Almacen -->
<div class="modal fade" id="nuevo-almacen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-dolly-flatbed"></i> Nuevo Almacén</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../CONTROLLER/controller_almacenproducto.php?opc_almacenproducto=1&IDPROD=<?php echo $SUB_IDPROD ?>" method="POST" autocomplete="off">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="_codigor">Codigo</label>
                                <input type="text" class="form-control form-control-sm" id="_codigo" name="_codigo" value="<?php echo $SUB_CODLIN.$SUB_CODSLI.$SUB_CODITE; ?>" readonly>
                            </div>
                            <div class="col-sm-6">
                                <label for="_almacen"> Almacen</label>
                                <select class="custom-select" id="_almacen" name="_almacen"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="_fecAper">Fec. Apertura</label>
                                <input type="date" class="form-control form-control-sm" id="_fecAper" name="_fecAper" value="<?php echo date("Y-m-d");?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="_status"> Status</label>
                                <select class="custom-select" id="_status" name="_status" aria-label="Example select with button addon">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                        <button type="imput" class="btn-guardar">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <!-- Modal Editar Almacen -->
  <div class="modal fade" id="editar-almacen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-dolly-flatbed"></i> Editar Almacén</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../CONTROLLER/controller_almacenproducto.php?opc_almacenproducto=2&_editar_IDPROD=<?php echo $SUB_IDPROD ?>" method="POST" autocomplete="off">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="_codigor">Codigo</label>
                        <input type="text" class="form-control form-control-sm" id="_codigo" name="_codigo" value="<?php echo $SUB_CODLIN.$SUB_CODSLI.$SUB_CODITE; ?>" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="_editar_almacen"> Almacen</label>
                        <select class="custom-select" id="_editar_almacen" name="_editar_almacen" disabled></select>
                        <input type="hidden" class="form-control form-control-sm" id="__editar_almacen" name="__editar_almacen" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="_editar_fecAper">Fec. Apertura</label>
                        <input type="date" class="form-control form-control-sm" id="_editar_fecAper" name="_editar_fecAper" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="_editar_status"> Status</label>
                        <select class="custom-select" id="_editar_status" name="_editar_status" aria-label="Example select with button addon">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                <button type="imput" class="btn-guardar">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

   <!-- Modal eliminar almacen -->
  <div class="modal fade" id="eliminar-almacen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-dolly-flatbed"></i> Eliminar Almacén</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
          <div class="container">
          <div class="row">
            <div class="col-sm-12">
                <h5 align="center">¿Desea eliminar el almacén seleccionado?</h5>
            </div>
          </div>
        </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn-eliminar">Si, eliminar</button>
        </div>
      </div>
    </div>
  </div>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript" src="js/main.js"></script> 
<script type="text/javascript" src="js/tabla-almacen.js"></script>  
<script type="text/javascript" src="js/funciones.js"></script> 
<script type="text/javascript" src="js/combos_producto.js"></script> 