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
    $fila=$objFacturacion->reporteFactura();
    $filas=$fila->fetch_object();
    
    
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

    $pdf = new FPDF('P','mm',array(297,80));
    $pdf->AddPage();
    $pdf->SetFillColor('255','255','255');
    $pdf->SetFont('Arial','B',12);
    $pdf->MultiCell(60,7, $RAZSOC,0,'C',true);
    $pdf->Cell(60,7, $RUC,0,1,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->MultiCell(60,7,$DIRCIA,0,'C');
    $pdf->Cell(60,7, $DESCLADOC,0,1,'C');
    $pdf->Cell(60,7, $NUMERODOC,0,1,'C');

    $pdf->SetFont('Arial','',7);
    $pdf->Cell(12,5,'Fecha',0,0,'L'); 
    $pdf->Cell(48,5,': '.$FECDOC,0,1,'L'); 
    $pdf->Cell(12,5,'Tipo.V',0,0,'L'); 
    $pdf->Cell(48,5,': '.$TIPVEN,0,1,'L'); 
    $pdf->Cell(12,5,'RUC/DNI',0,0,'L'); 
    $pdf->Cell(48,5,': '.$RUC,0,1,'L'); 
    $pdf->Cell(12,5,'Cliente',0,0,'L'); 
    $pdf->MultiCell(48,5,': '.$RAZSOC,0,'L'); 
    $pdf->Cell(12,5,'Direccion',0,0,'L'); 
    $pdf->MultiCell(48,5,': '.$DIRCLI,0,'L'); 

    $pdf->Ln(2);
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(27,6,'Producto',1,0,'L',1);
    $pdf->Cell(10,6,'Cant.',1,0,'R',1);
    $pdf->Cell(11,6,'PU',1,0,'R',1);
    $pdf->Cell(12,6,'Importe',1,1,'R',1);
    require_once("../MODEL/clsDetalleFacturacion.php");
    $objDetalleFacturacion=new clsDetalleFacturacion();
    $objDetalleFacturacion->NUMDOC=$CLADOC."-".$SERIE."-".str_pad($NUMDOC, 10, "0", STR_PAD_LEFT);
    $filas=$objDetalleFacturacion->cargarDetalleFacturacion();
    $pdf->SetFont('Arial','',8);
    while($row = $filas->fetch_assoc())
    {
        $pdf->Cell(27,6,utf8_decode($row['DESART']),0,0,'L');
        $pdf->Cell(10,6,ROUND($row['CANPED'],2),0,0,'R');
        $pdf->Cell(11,6,ROUND($row['PREUNI'],4),0,0,'R');
        $pdf->Cell(12,6,ROUND($row['IMPART'],2),0,1,'R');
    }
    $pdf->Cell(30,6,'Sub Total',0,0,'R',0);
	$pdf->Cell(30,6,$IMPBRU,0,1,'R',0);
    $pdf->Cell(30,6,'Base imponible',0,0,'R',0);
    $pdf->Cell(30,6,$IMPBI,0,1,'R',0);
    $pdf->Cell(30,6,'Exonerado',0,0,'R',0);
    $pdf->Cell(30,6,$IMPEXO,0,1,'R',0);
    $pdf->Cell(30,6,'Inafecto',0,0,'R',0);
    $pdf->Cell(30,6,$IMPINAFEC,0,1,'R',0);
    $pdf->Cell(30,6,'IGV 18%',0,0,'R',0);
    $pdf->Cell(30,6,$IMPIMP,0,1,'R',0);
    $pdf->Cell(30,6,'Total',0,0,'R',0);
    $pdf->Cell(30,6,$IMPTOT,0,1,'R',0);

    $objFacturacion=new clsFacturacion();
    $objFacturacion->IMPTOT=number_format($IMPTOT,2);
    $filaLetra=$objFacturacion->motoLetra();
    $filasLetra=$filaLetra->fetch_object();

    $pdf->SetFont('Arial','',10);
    $pdf->Ln(2);
    $pdf->MultiCell(60,6,'Son '.$filasLetra->letra,0,'L');
    $pdf->Cell(15,6,"",0,0,'R',0);
    $PARAM=$RUCCIA.'|'.$CLADOC.'|'.$NUMDOC.'|'.$IMPIMP.'|'.$IMPTOT.'|'.$FECDOC.'|'.$TIPDOCIDE.'|'.$RUC.'|'.$CODIGO_HASH.'|';
    $pdf->Cell(30,20,$pdf->Image('http://alteresperu.baunz.com.pe/proyect_facturacion/CONTROLLER/QR.php?par='.$PARAM,$pdf->GetX(), $pdf->GetY(),30,30,'PNG'),0,1,'C');
    $pdf->Output();
?>