<?php
    session_name("adminsoft");
    session_start();
    $codalm=$_REQUEST['codalm'];//codalm 
    "<br/>";
    $idprod=$_REQUEST['idprod'];//idprod 
    "<br/>";
    $desde=$_REQUEST['desde'];//TX_RUC
    "<br    />";
    $hasta=$_REQUEST['hasta'];//TX_RUC
?> 
<table id="tabla_kardex" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th class="codigo">Fecha</th>
            <th class="raz-social">Transaccion</th>
            <th class="fecha">Documento</th>
            <th class="estado">Nota Ingreso</th>
            <th class="Num-Factura">Descripcion</th>
            <th class="Num-Factura">Ingreso</th>
            <th class="Num-Factura">Salida</th>
            <th class="Num-Factura">Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $opc_consulta=19;
            include('../CONTROLLER/controller_consultas.php');
            while ($reg=$filas->fetch_object()) { 
        ?> 
        <tr>
            <td ><?php echo $reg->FECTRAN;?></td>
            <td ><?php echo $reg->CODTRAN;?></td>
            <td ><?php echo $reg->NUMDOC;?></td>
            <td ><?php echo $reg->NOTINGRE;?></td>
            <td ><?php echo $reg->RAZSOC;?></td>
            <td ><?php echo $reg->INGRESO;?></td>
            <td ><?php echo $reg->SALIDA;?></td>
            <td ><?php echo $saldo+=$reg->saldo;?></td>
        </tr>
        <?php }?>
    </tbody>        
</table>
<button type="button"  class="producto" onclick="imprimirkardex('<?php echo $idprod?>','<?php echo $codalm?>')"><i class="fa fa-print"></i> Imprimir</button>
                
<script type="text/javascript" src="js/tabla_kardex.js"></script> 
