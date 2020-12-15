<?php
  session_name("adminsoft");
  session_start();
  $datos=$_REQUEST["datos"];
  $datos1=$_REQUEST["datos1"];
?>
<!-- Ver unidad medida -->
<div class="modal fade" id="ver_subtabla" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-ruler-combined"></i> Sub Tabla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button type="button" class="nuevo-almacen" data-toggle="modal" data-target="#nuevo-umed" id="sub_tabla">
          <i class="fa fa-plus"></i> <?php echo $datos.' - '.$datos1 ?>
        </button>
        <div class="table-responsive">        
          <table id="tabla-umed" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th class="codigo">Tabla</th>
                <th class="descrip-larga">Descrip. Larga</th>
                <th class="opciones"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $opc_consulta=5;
                $_SESSION['SIS_NUMTAB']=$datos;
                include('../CONTROLLER/controller_consultas.php');
                while ($reg=$filas->fetch_object()) { 
                  $_SIS_NUMELE=$reg->SIS_NUMELE;
                  $SIS_DESLAR=$reg->SIS_DESLAR;
                  $subDatos=$reg->SIS_NUMTAB."||".
                  $reg->SIS_NUMELE."||".
                  $reg->SIS_DESLAR."||".
                  $reg->SIS_DESCOR."||".
                  $reg->SIS_DESNUM;
              ?>
                <tr>
                  <td><?php echo $reg->SIS_NUMELE; ?></td>
                  <td><?php echo $reg->SIS_DESLAR; ?></td>
                  <td align="center">
                    <a href="#" data-toggle="modal" data-target="#editar-umed" onClick="llenardatos_subtablas_campos('<?php echo $subDatos;?>');"><i class="fa fa-pencil"></i></a>
                    <a href="#" data-toggle="modal" data-target="#eliminar-umed" onClick="llenardatos_subtablas_eli('<?php echo $_SIS_NUMELE;?>');"><i class="fa fa-remove"></i></a>
                  </td>
                </tr>
              <?php }?>
            </tbody>        
          </table>                  
        </div>
      </div>
    </div>
  </div>     
</div>     

<!-- Modal Nueva Unidad Medida -->
<div class="modal fade" id="nuevo-umed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-ml modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-ruler-combined"></i> Nueva <?php echo $datos1 ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="../CONTROLLER/controller_sistab.php?opc_sistab=4&_Tabla=<?PHP echo $datos; ?>" method="POST" autocomplete="off">
          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <label for="_SubTabla">Tabla</label>
                <input type="text" class="form-control form-control-sm" id="_SubTabla" name="_SubTabla" Required>
              </div>
              <div class="col-sm-8">
                <label for="_Descrip_corta">Descrip. Corta</label>
                <input type="text" class="form-control form-control-sm" id="_Descrip_corta" name="_Descrip_corta" Required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-10">
                <label for="_Descrip_larga">Descrip. Larga</label>
                <input type="text" class="form-control form-control-sm" id="_Descrip_larga" name="_Descrip_larga" Required>
              </div>
              <div class="col-sm-2">
                <label for="_Orden">Orden</label>
                <input type="text" class="form-control form-control-sm" id="_Orden" name="_Orden">
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

<!-- Modal Editar Unidad Medida -->
<div class="modal fade" id="editar-umed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-ml modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-ruler-combined"></i> Editar <?php echo $datos1 ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="../CONTROLLER/controller_sistab.php?opc_sistab=5&_editar_Tabla=<?PHP echo $datos; ?>" method="POST" autocomplete="off">
          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <label for="_editar_SubTabla">Tabla</label>
                <input type="text" class="form-control form-control-sm" id="_editar_SubTabla" name="_editar_SubTabla" readonly>
              </div>
              <div class="col-sm-8">
                <label for="_editar_Descrip_corta">Descrip. Corta</label>
                <input type="text" class="form-control form-control-sm" id="_editar_Descrip_corta" name="_editar_Descrip_corta" Required> 
              </div>
            </div>
            <div class="row">
              <div class="col-sm-10">
                <label for="_editar_Descrip_larga">Descrip. Larga</label>
                <input type="text" class="form-control form-control-sm" id="_editar_Descrip_larga" name="_editar_Descrip_larga" Required>
              </div>
              <div class="col-sm-2">
                <label for="_editar_Orden">Orden</label>
                <input type="text" class="form-control form-control-sm" id="_editar_Orden" name="_editar_Orden">
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

<!-- Modal Eliminar Unidad Medida -->
<div class="modal fade" id="eliminar-umed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-ruler-combined"></i> Eliminar Und. Medida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="../CONTROLLER/controller_sistab.php?opc_sistab=6&_Tabla=<?PHP echo $datos; ?>" method="POST" autocomplete="off">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                  <h5 align="center">¿Desea eliminar la tabla seleccionada?</h5>
                  <input  name='_tabla_eli' id='_tabla_eli'/>
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

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript" src="js/tabla-umed.js"></script> 
<script type="text/javascript" src="js/funciones.js"></script> 
