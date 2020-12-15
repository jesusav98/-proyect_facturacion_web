<?php
    $CLADOC=$_REQUEST['CLADOC'];
    $SERIE=$_REQUEST['SERIE'];
?>
<form>
  <div class="container tabla">
    <div class="row">
      <div class="col-sm-12">
        <div class="table-responsive">        
          <table id="tabla-documentos" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th class="Ruc">RUC</th>
                <th class="Num">N. Dcmto</th>
                <th class="Raz-social">Raz. Social</th>
                <th class="Fecha">Fecha</th>
                <th class="Importe">Importe</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $opc_consulta=20;
                include('../CONTROLLER/controller_consultas.php');
                while ($reg=$filas->fetch_object()) { 
              ?>
              <tr onclick="cargarDocumento('<?php echo $reg->NUMDOC ?>','<?php echo $reg->FECDOC;?>','<?php echo $reg->RAZSOC;?>','<?php echo $reg->IMPTOT;?>')">
                <td><?php echo $reg->RUC;?></td>
                <td><?php echo $reg->NUMDOC;?></td>
                <td><?php echo $reg->RAZSOC;?></td>
                <td><?php echo $reg->FECDOC;?></td>
                <td align="right"><?php echo $reg->IMPTOT;?></td>
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
</form>

<script src="js/tabla-documentos.js"></script>
