<?php
    session_name("adminsoft");
    session_start(); 
    $NUMDOC=$_REQUEST['numdoc'];
    $opc_consulta=12;
    include('../CONTROLLER/controller_consultas.php');
    echo  '<script language="javascript">cargarDatos("'.$NUMDOC.'","'.$DIRCLI.'","'.$FECDOC.'","'.$CODVEN.'","'.$TIPVEN.'","'.$CODMON.'");</script>'
?>
<!--Mantenimiento de cotizacion-->
<div class="modal fade" id="mant_cotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-xl modal-dialog-centered"  >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-signature"></i> Mantenimiento Cotizacion N° <?php echo $NUMDOC;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container facturacion">
          <div class="row">
            <div class="col-sm-3">
              <label for="Tipo-doc">Código</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-sm" readonly id="codigo" name=codigo required aria-describedby="button-addon2" value="<?php echo $RUC; ?>">
              </div>
            </div>
            <div class="col-sm-9">
              <label for="Raz-Social">Razón Social</label>
              <input type="text" class="form-control form-control-sm" readonly id="Raz_social" name=Raz_social value="<?php echo  $RAZSOC; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-9">
              <label for="Lugar_entrega">Lugar de entrega</label>
              <select class="custom-select" id="Lugar_entrega" name="Lugar_entrega">
              </select>
            </div>
              <div class="col-sm-3">
              <label for="Ruc">RUC</label>
              <input type="text" class="form-control form-control-sm" disabled id="ruc" name="ruc" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $RUC; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="Lugar-entrega">Atención a</label>
              <input type="text" class="form-control form-control-sm" id="actencion" value="<?php echo $ATEN; ?>">
            </div>
            <div class="col-sm-4">
              <label for="Lugar-entrega">Entrega</label>
              <input type="text" class="form-control form-control-sm" id="entrega" value="<?php echo $ENTRE; ?>">
            </div>
            <div class="col-sm-4">
              <label for="Lugar-entrega">Solicitud</label>
              <input type="text" class="form-control form-control-sm" id="solicitud" value="<?php echo $SOLI; ?>">
            </div> 
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="Lugar-entrega">Condición Venta</label>
              <input type="text" class="form-control form-control-sm" id="condvent" value="<?php echo $CONDVEN; ?>">
            </div>
            <div class="col-sm-4">
              <label for="Vendedor">Vendedor</label>
              <select class="custom-select" id="Vendedor" name="Vendedor"></select>
            </div>
            <div class="col-sm-4">
              <label for="ordencompra">N° O/C</label>
              <input type="text" class="form-control form-control-sm" id="ordencompra" value="<?php echo $ORDCOM; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="Fec_doc">Fecha Cotiz.</label>
              <input type="date" class="form-control form-control-sm" id="Fec_doc" name="Fec_doc" >
            </div>
            <div class="col-sm-4">
              <label for="forma_pago">Forma Pago</label>
              <select class="custom-select" id="forma_pago" name="forma_pago" ></select>
            </div>
            <div class="col-sm-4">
              <label for="moneda">Moneda</label>
              <select class="custom-select" id="moneda" name="moneda"></select>
            </div>
          </div>
          <br/>
          <div class="container table-responsive">
            <table class="table table-striped table-sm table-bordered" id="tabla_producto">
              <thead class="cabecera table-bordered">
                <tr>
                  <th class="codigo ">Código</th>
                  <th class="descrip">Descripción</th> 
                  <th class="Cant">Cant.</th>
                  <th class="STOLIN" style="display: none;">STOLIN</th>
                  <th class="precio_u">Precio Unit.</th>
                  <th class="Total">Total</th>
                  <th class="CODALM"style="display: none;">CODALM</th>
                  <th class="EXONER"style="display: none;">EXONER</th>
                  <th class="INAFEC"style="display: none;">INAFEC</th>
                  <th class="SERVIC"style="display: none;">SERVIC</th>
                  <th class="CODLIN">CODLIN</th>
                  <th class="CODSLI">CODSLI</th>
                  <th class="CODITE">CODITE</th>
                  <th class="IDPROD">IDPROD</th>
                  <th class="opc"></th>
                </tr>
              </thead> 
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <div class="container calculo">
          <div class="row justify-content-center">
            <div class="col-sm-8" align="right">
              <label>SubTotal:</label>
            </div>
            <div class="col-sm-2">
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="subTotal" value="<?php echo $IMPBRUSOL; ?>">
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8" align="right">
              <label>Base Imponible:</label>
            </div>
            <div class="col-sm-2">
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="basimp" value="<?php echo $BASIMPSOL; ?>">
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8" align="right">
              <label>Exoneración:</label>
            </div>
            <div class="col-sm-2">
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="exoneracion" value="<?php echo $EXONERSOL; ?>">
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8" align="right">
              <label>Inafectos:</label>
            </div>
            <div class="col-sm-2">
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="inafectos" value="<?php echo $INAFECSOL; ?>">
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8" align="right">
              <label>I.G.V (18%):</label>
            </div>
            <div class="col-sm-2">
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="igv" value="<?php echo $IMPIMPSOL; ?>">
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8" align="right">
              <label><strong>TOTAL:</strong></label>
            </div>
            <div class="col-sm-2">
              <input type="text" disabled="readonly" class="form-control form-control-sm" id="total" value="<?php echo $IMPTOTSOL; ?>">
            </div>
          </div>
          <button type="button" class="producto" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-shopping-cart"></i> Agregar Producto</button>
          <button type="button"  class="producto" data-toggle="modal" onclick="validar_campos()"><i class="fa fa-save"></i> Guardar</button>
          <button type="button"  class="producto" onclick="imprimir('<?php echo $NUMDOC; ?>')"><i class="fa fa-print"></i> Imprimir</button>
        </div>
      </div>
    </div>
  </div>
</div> 

  <!-- Modal agregar producto -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-shopping-cart"></i> Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="container">
              <div class="container tabla">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">        
                      <table id="producto" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th class="cod-pro">Código</th>
                            <th class="descrip-product">Descripción</th>
                            <th class="Cantidad">Cantidad</th>
                            <th class="Almacen">Almacen</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $opc_consulta=10;
                            include('../CONTROLLER/controller_consultas.php');
                            while ($reg=$filas->fetch_object()) { 
                              $IDPROD=$reg->IDPROD;
                              $datosProAlm=$reg->IDPROD."||".
                              $reg->CODLIN. $reg->CODSLI. $reg->CODITE."||".
                              $reg->DESITE."||".
                              $reg->STOLIN."||".
                              $reg->SIS_DESLAR."||".
                              $reg->PRECLI01."||".
                              $reg->CODALM."||".
                              $reg->EXONER."||".
                              $reg->INAFEC."||".
                              $reg->SERVIC."||".
                              $reg->CODLIN."||".
                              $reg->CODSLI."||".
                              $reg->CODITE;
                          ?>
                          <tr data-toggle="modal" data-target="#producto_agregado" onClick="mostrarProducto('<?php echo $datosProAlm?>')">
                            <td><?php echo $reg->CODLIN.$reg->CODSLI.$reg->CODITE;?></td>
                            <td><?php echo $reg->DESITE;?></td>
                            <td><?php echo $reg->STOLIN;?></td>
                            <td><?php echo $reg->SIS_DESLAR;?></td>
                          </tr>
                          <?php } ?>
                        </tbody>        
                      </table>                  
                    </div>
                  </div>
                </div>  
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal producto  agregado-->
  <div class="modal fade" id="producto_agregado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check"></i> Item seleccionado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form>
              <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                    <label for="Producto">Codigo</label>
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="CODIGO">
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="CODLIN">
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="CODSLI">
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="CODITE">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-7">
                    <label for="Producto">Producto</label>
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="IDPROD">
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="DESITE">
                  </div>
                  <div class="col-sm-5">
                    <label for="Producto">Almacén</label>
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="SIS_DESLAR">
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="CODALM">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control form-control-sm" id="cantidad" onkeyup ="calculartotal()" style="text-align:right;">
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="STOLIN">
                  </div>
                  <div class="col-sm-4">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control form-control-sm" id="PRECLI01" onkeyup="calculartotal()" style="text-align:right;">
                  </div>
                  <div class="col-sm-5">
                    <label for="total_item">Total</label>
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="total_item" style="text-align:right;">
                  </div>
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="EXONER">
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="INAFEC">
                  <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="SERVIC">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn-eliminar" onclick="agregarProducto()">Agregar</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>

<!-- Modal editar producto de cotizacion-->
<div class="modal fade" id="editar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-box-open"></i> Editar Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form>
              <div class="container">
                <div class="row">
                  <div class="col-sm-5">
                    <label for="Producto">Producto</label>
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="editar_DESITE">
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="editar_IDPROD">
                  </div>
                  <div class="col-sm-2">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control form-control-sm" id="editar_cantidad" onkeyup ="calculareditartotal()" style="text-align:right;">
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="editar_STOLIN">
                  </div>
                  <div class="col-sm-2">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control form-control-sm" id="editar_PRECLI01" onkeyup ="calculareditartotal()" style="text-align:right;">
                  </div>
                  <div class="col-sm-3">  
                    <label for="total-item">Total</label>
                    <input type="text" disabled="readonly" class="form-control form-control-sm" id="editar_total_item" style="text-align:right;">
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="editar_CODALM">
                    <input type="hidden" disabled="readonly" class="form-control form-control-sm" id="editar_SERVIC">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn-eliminar" onclick="editarProducto()">Guardar</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div> 
   



<!-- Modal Generar cotizacion-->

<div class="modal fade" id="generar-cotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-alt"></i> Actualizar Cotización</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form>
              <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                      <h5 align="center">¿Desea actualizar la cotización?</h5>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn-eliminar" onclick="actualizarCortizacion('<?php echo $NUMDOC; ?>')">Si, actualizar</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src="js/combos_mantcotizacion.js"></script>  
    <script type="text/javascript" src="js/productos.js"></script> 