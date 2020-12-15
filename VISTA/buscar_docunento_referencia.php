<?php
    $ruc=$_REQUEST['ruc'];
    $docref=$_REQUEST['docref'];
    $serref=$_REQUEST['serref'];
?>
<form>
    <div class="container">
        <div class="container tabla">
        <div class="row">
            <div class="col-sm-12">
            <div class="table-responsive">        
                <table id="facturaciones" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="codigo">Código</th>
                        <th class="dni">RUC</th>
                        <th class="Raz-social">Raz. Social</th>
                        <th class="Tipo-v">Tipo Venta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $opc_consulta=16;
                        include('../CONTROLLER/controller_consultas.php');
                        while ($reg=$filas->fetch_object()) { 
                            $NUMDOC=$reg->NUMDOC;
                    ?>
                    <tr  onClick="cargar_documento_referencia('<?php echo $docref; ?>','<?php echo $serref; ?>','<?php echo $NUMDOC; ?>')"> 
                        <td><?php echo $reg->NUMDOC ?></td>
                        <td><?php echo $reg->RUC ?></td>
                        <td><?php echo $reg->RAZSOC ?></td>
                        <td><?php echo $reg->TIPVEN ?></td>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>        
                </table>                  
            </div>
            </div>
        </div>  
        </div>    
    </div>
</form>
<script type="text/javascript" src="js/facturaciones.js"></script> 
