<?php
  session_name("adminsoft");
  session_start();
  $fecha=$_REQUEST['fecha'];//CODCLI
  $desde=$_REQUEST['desde'];//TX_RUC
  $hasta=$_REQUEST['hasta'];//TX_RUC
?> 
<table id="tabla_mant_cotizaciones" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th class="codigo">Código</th>
            <th class="raz-social">Razón Social</th>
            <th class="fecha">Fecha</th>
            <th class="estado">Estado</th>
            <th class="Num-Factura">N° Factura</th>
            <th class=""></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $opc_consulta=11;
            include('../CONTROLLER/controller_consultas.php');
            while ($reg=$filas->fetch_object()) { 
            $cotizacion=$reg->NUMDOC;
        ?> 
        <tr>
            <td onclick="mostrarCotizacion('<?php echo $cotizacion ?>')"><?php echo $reg->NUMDOC;?></td>
            <td onclick="mostrarCotizacion('<?php echo $cotizacion ?>')"><?php echo $reg->RAZSOC;?></td>
            <td onclick="mostrarCotizacion('<?php echo $cotizacion ?>')"><?php echo $reg->FECDOC;?></td>
            <td onclick="mostrarCotizacion('<?php echo $cotizacion ?>')"><?php echo $reg->ESTCOT;?></td>
            <td onclick="mostrarCotizacion('<?php echo $cotizacion ?>')"><?php echo $reg->FACTURA;?></td>
            <td align="center">
                <a onclick="aceptarCotizacion('<?php echo $cotizacion;?>',);"><i class="fa fa-check"></i></a>
            </td>
        </tr>
        <?php }?>
    </tbody>        
</table>


<script type="text/javascript" src="js/tabla-mant-cotizaciones.js"></script> 
