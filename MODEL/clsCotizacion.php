<?php
require_once("clsconexion.php");
class clsCotizacion extends clsConexion
  {
    public $LOCALI;
    public $NUMDOC;
    public $CODCLI;
    public $RUC;
    public $RAZSOC;
    public $DIRCLI;
    public $LUGENT;
    public $ATEN;
    public $ENTRE;
    public $SOLI;
    public $CONDVEN;
    public $CODVEN;
    public $ORDCOM;
    public $FECDOC;
    public $TIPVEN;
    public $CODMON;
    public $TIPCAM;
    public $ANULAD;
    public $ESTCOT;
    public $CLADOCFACT;
    public $SERFACT;
    public $NUMFACT;
    public $CLADOCGUIA;
    public $SERGUIA;
    public $NUMGUIA;
    public $IMPBRUSOL;
    public $BASIMPSOL;
    public $IMPDCTSOL;
    public $EXONERSOL;
    public $INAFECSOL;
    public $IMPIMPSOL;
    public $IMPTOTSOL;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD;
    public $FEC_MOD;

    public $fecha;
    public $desde;
    public $hasta;

    public function clsCotizacionDatos($NUMDOC="",$RUC="",$RAZSOC="",$DIRCLI="",$LUGENT="",$ATEN="",$ENTRE="",$SOLI="",$CONDVEN="",$CODVEN="",$ORDCOM="",$FECDOC="",$TIPVEN="",$CODMON="",
    $IMPBRUSOL="",$BASIMPSOL="",$EXONERSOL="",$INAFECSOL="",$IMPIMPSOL="",$IMPTOTSOL=""){
      $this->NUMDOC=$NUMDOC;
      $this->RUC=$RUC;
      $this->RAZSOC=$RAZSOC;
      $this->DIRCLI=$DIRCLI;
      $this->LUGENT=$LUGENT;
      $this->ATEN=$ATEN;
      $this->ENTRE=$ENTRE;
      $this->SOLI=$SOLI;
      $this->CONDVEN=$CONDVEN;
      $this->CODVEN=$CODVEN;
      $this->ORDCOM=$ORDCOM;
      $this->FECDOC=$FECDOC;
      $this->TIPVEN=$TIPVEN;
      $this->CODMON=$CODMON;
      $this->IMPBRUSOL=$IMPBRUSOL;
      $this->BASIMPSOL=$BASIMPSOL;
      $this->EXONERSOL=$EXONERSOL;
      $this->INAFECSOL=$INAFECSOL;
      $this->IMPIMPSOL=$IMPIMPSOL;
      $this->IMPTOTSOL=$IMPTOTSOL;
  }
 
    function agregarCotizacion(){
        $NUMDOC=1;
        $this->conectarse();
        $sql="SELECT CASE WHEN (SELECT MAX(NUMDOC*1)+1  FROM trf_cotizacion )>0 THEN (SELECT MAX(NUMDOC)+1  FROM trf_cotizacion ) ELSE 1 END NUMDOC";
        $rSet=$this->cnx->query($sql);
        if($rSet->num_rows){
            $fila=$rSet->fetch_object();
            $NUMDOC=$fila->NUMDOC;
        }
        $agregado=0;
        $sql1="INSERT into trf_cotizacion (LOCALI,NUMDOC,CODCLI,RUC,RAZSOC,DIRCLI,LUGENT,ATEN,ENTRE,SOLI,CONDVEN,CODVEN,ORDCOM,FECDOC,TIPVEN,CODMON
        ,TIPCAM,ESTCOT,IMPBRUSOL,BASIMPSOL,IMPDCTSOL,EXONERSOL,INAFECSOL,IMPIMPSOL,IMPTOTSOL,USU_CREA,FEC_CREA) VALUES
        ('$this->LOCALI',LPAD('$NUMDOC',10,'0'),'$this->CODCLI','$this->RUC','$this->RAZSOC','$this->DIRCLI','$this->LUGENT','$this->ATEN',
        '$this->ENTRE','$this->SOLI','$this->CONDVEN','$this->CODVEN','$this->ORDCOM','$this->FECDOC','$this->TIPVEN',
        '$this->CODMON','$this->TIPCAM',0,'$this->IMPBRUSOL','$this->BASIMPSOL','$this->IMPDCTSOL','$this->EXONERSOL','$this->INAFECSOL',
        '$this->IMPIMPSOL','$this->IMPTOTSOL'
        ,'$this->USU_CREA',now())";
        $agregado=$this->cnx->query($sql1);
        $this->cnx->close();
        return $NUMDOC;
    }

    function actializarCotizacion(){
      $NUMDOC=1;
      $this->conectarse();
      $agregado=0;
      $sql1="UPDATE trf_cotizacion SET DIRCLI='$this->DIRCLI',LUGENT='$this->LUGENT',ATEN='$this->ATEN',ENTRE='$this->ENTRE',SOLI='$this->SOLI',CONDVEN='$this->CONDVEN'
      ,CODVEN='$this->CODVEN',ORDCOM='$this->ORDCOM',FECDOC='$this->FECDOC',TIPVEN='$this->TIPVEN',CODMON='$this->CODMON'
      ,IMPBRUSOL='$this->IMPBRUSOL',BASIMPSOL='$this->BASIMPSOL',IMPDCTSOL='$this->IMPDCTSOL',EXONERSOL='$this->EXONERSOL',INAFECSOL='$this->INAFECSOL',IMPIMPSOL='$this->IMPIMPSOL'
      ,IMPTOTSOL='$this->IMPTOTSOL',USU_MOD='$this->USU_MOD',FEC_MOD=now()
      where NUMDOC=LPAD('$this->NUMDOC',10,'0')";
      $agregado=$this->cnx->query($sql1);
      $this->cnx->close();
      return $agregado;
    } 

    function cargarCotizacion(){
      $this->conectarse();
      if($this->fecha==0){
        $sql="SELECT NUMDOC,RAZSOC,DATE_FORMAT(FECDOC, '%d/%m/%Y')FECDOC,SIS_DESLAR ESTCOT,
        CONCAT(CLADOCFACT,'-',SERFACT,'-',NUMFACT) FACTURA,IMPTOTSOL FROM trf_cotizacion
        INNER JOIN tbl_sistab ON SIS_NUMTAB='09' AND SIS_NUMELE=ESTCOT
        where ESTCOT=0
        ORDER BY DATE_FORMAT(FECDOC, '%d/%m/%Y') DESC";
        $resultado=$this->cnx->query($sql);
        $this->cnx->close();
        return $resultado;
      }else{
        $sql="SELECT NUMDOC,RAZSOC,DATE_FORMAT(FECDOC, '%d/%m/%Y')FECDOC,SIS_DESLAR ESTCOT,
        CONCAT(CLADOCFACT,'-',SERFACT,'-',NUMFACT) FACTURA,IMPTOTSOL FROM trf_cotizacion
        INNER JOIN tbl_sistab ON SIS_NUMTAB='09' AND SIS_NUMELE=ESTCOT
        where ESTCOT=0
        and FECDOC>='$this->desde' and FECDOC<='$this->hasta'
        ORDER BY DATE_FORMAT(FECDOC, '%d/%m/%Y') DESC";
        $resultado=$this->cnx->query($sql);
        $this->cnx->close();
        return $resultado;
      }
    }

    public function buscarCotizacion(){
      $this->conectarse();
      $sql="SELECT * FROM trf_cotizacion where NUMDOC=LPAD('$this->NUMDOC',10,'0')";
      $resultado=$this->cnx->query($sql);
      if($resultado->num_rows){
        $fila=$resultado->fetch_object();
        $this->clsCotizacionDatos($fila->NUMDOC,$fila->RUC,$fila->RAZSOC,$fila->DIRCLI,$fila->LUGENT,$fila->ATEN,$fila->ENTRE,$fila->SOLI,$fila->CONDVEN,$fila->CODVEN,$fila->ORDCOM,$fila->FECDOC,
        $fila->TIPVEN,$fila->CODMON,$fila->IMPBRUSOL,$fila->BASIMPSOL,$fila->EXONERSOL,$fila->INAFECSOL,$fila->IMPIMPSOL,$fila->IMPTOTSOL);
        return true;
      }else
        return false;
    }

    function aprobarCotizacion(){
      $NUMDOC=1;
      $this->conectarse();
      $agregado=0;
      $sql1="UPDATE trf_cotizacion SET ESTCOT=1,USU_MOD='$this->USU_MOD',FEC_MOD=now()
      where NUMDOC=LPAD('$this->NUMDOC',10,'0')";
      $agregado=$this->cnx->query($sql1);
      $this->cnx->close();
      return $agregado;
    } 
    
    public function buscarCotizacionFactura(){
      $this->conectarse();
      $sql="SELECT * FROM trf_cotizacion where RUC=$this->RUC and ESTCOT=1";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }

    function consultaCotizacion(){
      $this->conectarse();
      $sql="SELECT NUMDOC,RAZSOC,DATE_FORMAT(FECDOC, '%d/%m/%Y')FECDOC,SIS_DESLAR ESTCOT,
      CONCAT(CLADOCFACT,'-',SERFACT,'-',NUMFACT) FACTURA,IMPTOTSOL FROM trf_cotizacion
      INNER JOIN tbl_sistab ON SIS_NUMTAB='09' AND SIS_NUMELE=ESTCOT
      ORDER BY DATE_FORMAT(FECDOC, '%d/%m/%Y') DESC";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }
    public function reporteCotizacion()
    {
      $this->conectarse();
      $sql="SELECT t2.RUCCIA,t2.NOMCIA,t2.DIRCIA,CONCAT('Tel: ',t2.TELEFO,' Cel: ',t2.CELULA) telcel,t2.CORREO,NUMDOC,
      t1.RAZSOC,DATE_FORMAT(t1.FECDOC,'%d/%m/%Y')FECDOC,t1.ATEN,t1.CONDVEN,t1.DIRCLI,t1.ENTRE,
      t3.SIS_DESCOR CODVEN,t1.IMPBRUSOL,t1.BASIMPSOL,t1.EXONERSOL,t1.INAFECSOL,t1.IMPIMPSOL,t1.IMPTOTSOL
      from trf_cotizacion t1
      inner JOIN tbl_control t2 on 0=0
      INNER JOIN tbl_sistab t3 ON t1.CODVEN=t3.SIS_NUMELE AND t3.SIS_NUMTAB='06'
      where NUMDOC='$this->NUMDOC'";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }
  }
?>
