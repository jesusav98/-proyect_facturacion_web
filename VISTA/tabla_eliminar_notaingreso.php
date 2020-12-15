<?php
  session_name("adminsoft");
  session_start();
  $FECTRAN=$_REQUEST['fecha'];//CODCLI
?> 
<table id="tabla_notaingreso" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th class="Num">Número</th>
            <th class="Fec-trans">Fec. Trans.</th>
            <th class="Cod-Almacen">Cod. Almac.</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $opc_consulta=21;
            include('../CONTROLLER/controller_consultas.php');
            while ($reg=$filas->fetch_object()) { 
            $noting=$reg->NUMERO.'||'.
            $reg->FECHA.'||'.
            $reg->ALMDES.'||'.
            $reg->CODTRAN.'||'.
            $reg->RAZON.'||'.
            $reg->CODPRO.'||'.
            $reg->CLADOC.'||'.
            $reg->SERIE.'||'.
            $reg->FACTURA;
        ?> 
        <tr onClick="mostrarNotaIngreso('<?php echo $noting;?>')"> 
            <td><?php echo $reg->NUMERO ?></td>
            <td><?php echo $reg->FECHA ?></td>
            <td><?php echo $reg->ALMDES ?></td>
        </tr>
            <?php }?>
    </tbody>        
</table>

<script type="text/javascript" src="js/tabla-documentos.js"></script> 
<script type="text/javascript" src="datatables/datatables.min.js"></script>    
