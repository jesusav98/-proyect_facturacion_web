<?php
    $numdoc=$_REQUEST['numdoc'];
?>
<form>
            <div class="container table-responsive">
              <table class="table table-striped table-sm table-bordered">
                <thead class="cabecera table-bordered">
                  <tr>
                    <th class="item">Item</th>
                    <th class="cod">Código</th>
                    <th class="descrip">Descripción</th>
                    <th class="Cant">Cant.</th>
                    <th class="p-u">P.U.</th>
                    <th class="Total">Total</th>
                  </tr>
                </thead>
                <tbody>
                     <?php 
                        $opc_consulta=15;
                        include('../CONTROLLER/controller_consultas.php');
                        while ($reg=$filas->fetch_object()) { 
                    ?>
                    <tr>
                      <td><?php echo $reg->NUMITE; ?></td>
                      <td><?php echo $reg->CODIGO; ?></td>
                      <td><?php echo $reg->DESART; ?></td>
                      <td><?php echo $reg->CANPED; ?></td>
                      <td align="right"><?php echo $reg->PREUNI; ?></td>
                      <td align="right"><?php echo $reg->IMPART; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
              </table>
            </div>
          </form> 