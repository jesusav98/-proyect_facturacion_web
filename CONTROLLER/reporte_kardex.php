<?php
    $desde=$_REQUEST['desde'];
    $hasta=$_REQUEST['hasta'];
    $codalm=$_REQUEST['codalm'];
    $idprod=$_REQUEST['idprod'];

    $html= '<table id="tabla_kardex" class="table table-striped table-bordered" style="width:100%">
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
    </table>';
    require('WriteHTML.php');
    $pdf=new PDF_HTML();
    $pdf->AddPage();
    $pdf->SetFont('Arial');
    $pdf->WriteHTML($html);
    $pdf->Output();

?>