<?php
    require 'FPDF/fpdf.php';
    require_once("../MODEL/clsFacturacion.php");
    $CLADOC=$_REQUEST['CLADOC'];
    $SERIE=$_REQUEST['SERIE'];
    $NUMDOC=$_REQUEST['NUMDOC'];
    $NUMDOC=(int)$NUMDOC;
    $objFacturacion=new clsFacturacion();
    $objFacturacion->CLADOC=$CLADOC;
    $objFacturacion->NUMDOC=$NUMDOC;
    $objFacturacion->SERIE=$SERIE;
    $resultado=$objFacturacion->reporteFactura();
     
    $filas=$resultado->fetch_object();
    
    $RUCCIA=$filas->RUCCIA;
    $NOMCIA=$filas->NOMCIA;
    $DIRCIA=$filas->DIRCIA;
    $telcel=$filas->telcel;
    $CORREO=$filas->CORREO;
    $DESCLADOC=$filas->CLADOC;
    $NUMERODOC=$filas->NUMDOC;

    $RUC=$filas->RUC;
    $RAZSOC=$filas->RAZSOC;
    $DIRCLI=$filas->DIRCLI;
    $LUGENT=$filas->LUGENT;
    $ATEN=$filas->ATEN;
    $ENTRE=$filas->ENTRE;
    $SOLI=$filas->SOLI;
    $CONDVEN=$filas->CONDVEN;
    $CODVEN=$filas->CODVEN;
    $ORDCOM=$filas->ORDCOM;
    $NUMCOT=$filas->NUMCOT;
    $FECDOC=$filas->FECDOC;
    $TIPVEN=$filas->TIPVEN;
    $CODMON=$filas->CODMON;
    $TIPDOCIDE=$filas->TIPDOCIDE;
    $CODIGO_HASH=$filas->CODIGO_HASH;
    $IMPBRU=$filas->IMPBRU;
    $IMPBI=$filas->IMPBI;
    $IMPEXO=$filas->IMPEXO;
    $IMPINAFEC=$filas->IMPINAFEC;
    $IMPIMP=$filas->IMPIMP;
    $IMPTOT=$filas->IMPTOT;

    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(40,10,'',0);
    $pdf->Cell(100,10,$NOMCIA,0,0,'C');
    $pdf->Cell(50,30,'',1,1,'C');

    $pdf->Cell(140,0,'',0);
    $pdf->Cell(50,-50,'R.U.C: '.$RUCCIA,0,1,'C');
    $pdf->Cell(140,0,'',0);
    $pdf->Cell(50,70,$DESCLADOC,0,1,'C');
    $pdf->Cell(140,0,'',0);
    $pdf->Cell(50,-50,$NUMERODOC,0,1,'C');
    $pdf->Cell(140,0,'',0,1);


    $pdf->SetFont('Arial','',8);
    $pdf->Cell(40,10,'',0,1);
    $pdf->Cell(40,6,'',0);
    $pdf->Cell(100,6,$DIRCIA,0,1,'C');
    $pdf->Cell(40,6,'',0);
    $pdf->Cell(100,6,$telcel,0,1,'C');
    $pdf->Cell(40,6,'',0);
    $pdf->Cell(100,6,$CORREO,0,1,'C');
    $pdf->Ln(5);


    $pdf->Cell(20,8,'R.U.C',0);
    $pdf->Cell(120,8,": ".$RUC,0,0,'L');
    $pdf->Cell(20,8,'Fecha Emision',0);
    $pdf->Cell(30,8,": ".$FECDOC,0,0,'L');
    $pdf->Ln(5);
    $pdf->Cell(20,8,'Razon Social',0);
    $pdf->Cell(120,8,": ".$RAZSOC,0,0,'L');
    $pdf->Cell(20,8,'Vendedor',0);
    $pdf->Cell(30,8,": ".$CODVEN,0,0,'L');
    $pdf->Ln(5);
    $pdf->Cell(20,8,'Direccion',0);
    $pdf->Cell(120,8,": ".$DIRCLI,0,0,'L');
    $pdf->Cell(20,8,'Tipo Venta',0);
    $pdf->Cell(30,8,": ".$TIPVEN,0,0,'L');
    $pdf->Ln(5);
    $pdf->Cell(20,8,'Condicion Venta',0);
    $pdf->Cell(120,8,": ".$CONDVEN,0,0,'L');
    $pdf->Cell(20,8,'Cotizacion',0);
    $pdf->Cell(30,8,": ".$NUMCOT,0,0,'L');
    $pdf->Ln(5);
    $pdf->Cell(20,8,'Orden Compra',0);
    $pdf->Cell(120,8,": ".$ORDCOM,0,0,'L');
    $pdf->Ln(5);
    $pdf->Cell(20,8,'Moneda',0);
    $pdf->Cell(120,8,": ".$CODMON,0,0,'L');
    
    $pdf->Ln(10);
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(30,6,'Codigo',1,0,'C',1);
    $pdf->Cell(20,6,'Cantidad',1,0,'C',1);
    $pdf->Cell(80,6,'Descripcion',1,0,'C',1);
    $pdf->Cell(30,6,'Precio',1,0,'C',1);
    $pdf->Cell(30,6,'Importe',1,1,'C',1);

    require_once("../MODEL/clsDetalleFacturacion.php");
    $objDetalleFacturacion=new clsDetalleFacturacion();
    $objDetalleFacturacion->NUMDOC=$CLADOC."-".$SERIE."-".str_pad($NUMDOC, 10, "0", STR_PAD_LEFT);
    $filas=$objDetalleFacturacion->cargarDetalleFacturacion();
    
    while($row = $filas->fetch_assoc())
    {
        $pdf->Cell(30,6,utf8_decode($row['CODIGO']),0,0,'L');
        $pdf->Cell(20,6,$row['CANPED'],0,0,'R');
        $pdf->Cell(80,6,utf8_decode($row['DESART']),0,0,'L');
        $pdf->Cell(30,6,$row['PREUNI'],0,0,'R');
        $pdf->Cell(30,6,utf8_decode($row['IMPART']),0,1,'R');
    }

    $objFacturacion=new clsFacturacion();
    $objFacturacion->IMPTOT=number_format($IMPTOT,2);
    $filaLetra=$objFacturacion->motoLetra();
    $filasLetra=$filaLetra->fetch_object();

    $pdf->SetFont('Arial','',10);
    $pdf->Ln(5);
    $pdf->Cell(130,6,'Son '.$filasLetra->letra,0,1,'L');

    $PARAM=$RUCCIA.'|'.$CLADOC.'|'.$NUMDOC.'|'.$IMPIMP.'|'.$IMPTOT.'|'.$FECDOC.'|'.$TIPDOCIDE.'|'.$RUC.'|'.$CODIGO_HASH.'|';
    $pdf->Cell(130,20,$pdf->Image('http://alteresperu.baunz.com.pe/proyect_facturacion/CONTROLLER/QR.php?par='.$PARAM,$pdf->GetX(), $pdf->GetY(),30,30,'PNG'),0,0,'C');

	$pdf->Cell(30,6,'Sub Total',0,0,'L',0);
	$pdf->Cell(30,6,$IMPBRU,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'Base imponible',0,0,'L',0);
    $pdf->Cell(30,6,$IMPBI,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'Exonerado',0,0,'L',0);
    $pdf->Cell(30,6,$IMPEXO,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'Inafecto',0,0,'L',0);
    $pdf->Cell(30,6,$IMPINAFEC,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'IGV 18%',0,0,'L',0);
    $pdf->Cell(30,6,$IMPIMP,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'Total',0,0,'L',0);
    $pdf->Cell(30,6,$IMPTOT,0,1,'R',0);

    $pdf->Cell(190,6,'Resumen',0,1,'L',0);
    $pdf->Ln(1);
    $pdf->Cell(190,6,'Representacion impresa de la FACTURA ELECTRONICA. visita www.sunat.gob.pe',0,0,'L',0);
    $pdf->Output();
?>