<?php
    require 'FPDF/fpdf.php';
    require_once("../MODEL/clsCotizacion.php");
    $NUMDOC=$_REQUEST['NUMDOC'];

    $objCotizacion=new clsCotizacion();
    $objCotizacion->NUMDOC=$NUMDOC;
    $fila=$objCotizacion->reporteCotizacion();
    $filas=$fila->fetch_object();

    $RUCCIA=$filas->RUCCIA;
    $NOMCIA=$filas->NOMCIA;
    $DIRCIA=$filas->DIRCIA;
    $telcel=$filas->telcel;
    $CORREO=$filas->CORREO;
    $NUMDOC=$filas->NUMDOC;

    $RAZSOC=$filas->RAZSOC;
    $FECDOC=$filas->FECDOC;
    $ATEN=$filas->ATEN;
    $CONDVEN=$filas->CONDVEN;
    $DIRCLI=$filas->DIRCLI;
    $ENTRE=$filas->ENTRE;
    $CODVEN=$filas->CODVEN;
    $IMPBRUSOL=$filas->IMPBRUSOL;
    $BASIMPSOL=$filas->BASIMPSOL;
    $EXONERSOL=$filas->EXONERSOL;
    $INAFECSOL=$filas->INAFECSOL;
    $IMPIMPSOL=$filas->IMPIMPSOL;
    $IMPTOTSOL=$filas->IMPTOTSOL;

    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(40,10,'',0);
    $pdf->Cell(100,10,$NOMCIA,0,0,'C');
    $pdf->Cell(50,30,'',1,1,'C');

    $pdf->Cell(140,0,'',0);
    $pdf->Cell(50,-50,'R.U.C: '.$RUCCIA,0,1,'C');
    $pdf->Cell(140,0,'',0);
    $pdf->Cell(50,70,'COTIZACION',0,1,'C');
    $pdf->Cell(140,0,'',0);
    $pdf->Cell(50,-50,$NUMDOC,0,1,'C');
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


    $pdf->Cell(20,6,'Cliente');
    $pdf->Cell(80,6,': '.$RAZSOC);
    $pdf->Cell(30,6,'Fecha Emision',0,0,'L');
    $pdf->Cell(60,6,': '.$FECDOC,0,0,'L');
    $pdf->Ln(7);
    $pdf->Cell(20,6,'Atencion');
    $pdf->Cell(80,6,': '.$ATEN);
    $pdf->Cell(30,6,'Condicion de venta',0,0,'L');
    $pdf->Cell(60,6,': '.$CONDVEN,0,0,'L');
    $pdf->Ln(7);
    $pdf->Cell(20,6,'Direccion');
    $pdf->Cell(80,6,': '.$DIRCLI);
    $pdf->Cell(30,6,'Entrega',0,0,'L');
    $pdf->Cell(60,6,': '.$ENTRE,0,0,'L');
    $pdf->Ln(7);
    $pdf->Cell(20,6,'Vendedor');
    $pdf->Cell(80,6,': '.$CODVEN);

    $pdf->Ln(10);
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(30,6,'Cantidad',1,0,'C',1);
	$pdf->Cell(100,6,'Descripcion',1,0,'C',1);
	$pdf->Cell(30,6,'Precio',1,0,'C',1);
    $pdf->Cell(30,6,'Total US$',1,1,'C',1);

    require_once("../MODEL/clsDetalleCotizacion.php");
    $objDetalleCotizacion=new clsDetalleCotizacion();
    $objDetalleCotizacion->NUMDOC=$NUMDOC;
    $filas=$objDetalleCotizacion->cargarDetalleCotizacion();
    while($row = $filas->fetch_assoc())
	{
		$pdf->Cell(30,6,$row['CANPED'],0,0,'R');
		$pdf->Cell(100,6,($row['DESART']),0,0,'L');
		$pdf->Cell(30,6,$row['PREUNI'],0,0,'R');
		$pdf->Cell(30,6,($row['IMPART']),0,1,'R');
    }
	$pdf->SetFont('Arial','',11);
    $pdf->Ln(5);

    $pdf->Cell(130,6,'',0,0,'C');
	$pdf->Cell(30,6,'Sub Total',0,0,'L',0);
	$pdf->Cell(30,6,$IMPBRUSOL,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'Base imponible',0,0,'L',0);
    $pdf->Cell(30,6,$BASIMPSOL,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'Exonerado',0,0,'L',0);
    $pdf->Cell(30,6,$EXONERSOL,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'Inafecto',0,0,'L',0);
    $pdf->Cell(30,6,$INAFECSOL,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'IGV 18%',0,0,'L',0);
    $pdf->Cell(30,6,$IMPIMPSOL,0,1,'R',0);
    $pdf->Cell(130,6,'',0,0,'C');
    $pdf->Cell(30,6,'Total',0,0,'L',0);
    $pdf->Cell(30,6,$IMPTOTSOL,0,1,'R',0);;
    
    $pdf->Output();
?>