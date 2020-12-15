<?php
  session_name("adminsoft");
  session_start();
  $ruc=$_REQUEST['ruc'];//ruc
?>
<form>
    <div class="container">
        <div class="container tabla">
        <div class="row">
            <div class="col-sm-12">
            <div class="table-responsive">        
                <table id="cotizacion" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="cod-pro">Código</th>
                        <th class="descrip-product">Raz. Social</th>
                        <th class="fec-cot">Fec. Cot.</th>
                        <th class="Almacen">Estado</th>
                        <th class="Almacen">Total</th>
                        <th class="opc"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $opc_consulta=14;
                    $RUC=$ruc;
                    include('../CONTROLLER/controller_consultas.php');
                    while ($reg=$filas->fetch_object()) { 
                        $NUMDOC=$reg->NUMDOC;
                        $subdatos=$reg->NUMDOC."||".
                        $reg->IMPTOTSOL
                    ?>
                    <tr>
                        <td class="NUMDOC"><?php echo $reg->NUMDOC; ?></td>
                        <td>ACP INVERSIONES SUR S.A.C</td>
                        <td>25-07-2020</td>
                        <td>NO FACTURADO</td>
                        <td><?php echo $reg->IMPTOTSOL; ?></td>
                        <td align="center">
                            <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox"  >
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>        
                </table>                  
            </div>
            </div>
        </div>  
        </div>    
        <div class="modal-footer">
        <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn-guardar" onclick='agregarCotizacion()'>Agregar Cotización</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="js/cotizacion.js"></script> 
