<?php
require_once("clsconexion.php");
class clsNotaIngreso extends clsConexion
  {
    public $NOTING;
    public $CODTRAN;
    public $RAZON;
    public $ALMDES;
    public $CODPRO;
    public $DESCRI;
    public $INGSAL;
    public $FECTRAN;
    public $CODMON;
    public $TIPCAM;
    public $FACTURA;
    public $ORDCOM;
    public $CLADOC;
    public $SERIE;
    public $TOTNETO;
    public $TOTIGV;
    public $TOTBRU;
    public $TOTEXO;
    public $ANULAD;
    public $TOTBRU2;
    public $TOTIGV2;
    public $TOTEXO2;
    public $TOTNETO2;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD;
    public $FEC_MOD;

    function agregarNotaIngreso(){
        $NOTING=1;
        $this->conectarse();
        $sql="SELECT CASE WHEN (SELECT MAX(NOTING*1)+1  FROM trf_nota_ingreso )>0 THEN (SELECT MAX(NOTING)+1  FROM trf_nota_ingreso ) ELSE 1 END NOTING";
        $rSet=$this->cnx->query($sql);
        if($rSet->num_rows){
            $fila=$rSet->fetch_object();
            $NOTING=$fila->NOTING;
        }
        $agregado=0;
        $sql1="INSERT into trf_nota_ingreso (NOTING,CODTRAN,RAZON,ALMDES,CODPRO,DESCRI,INGSAL,FECTRAN,CODMON,TIPCAM,FACTURA,ORDCOM,CLADOC,SERIE
        ,TOTNETO,TOTIGV,TOTBRU,TOTEXO,ANULAD,TOTBRU2,TOTIGV2,TOTEXO2,TOTNETO2,USU_CREA,FEC_CREA) VALUES
        (LPAD('$NOTING',10,'0'),'$this->CODTRAN','$this->RAZON','$this->ALMDES','$this->CODPRO','$this->DESCRI','$this->INGSAL','$this->FECTRAN',
        '$this->CODMON','$this->TIPCAM','$this->FACTURA','$this->ORDCOM','$this->CLADOC','$this->SERIE','$this->TOTNETO','$this->TOTIGV',
        '$this->TOTBRU','$this->TOTEXO','$this->ANULAD','$this->TOTBRU2','$this->TOTIGV2','$this->TOTEXO2','$this->TOTNETO2',
        '$this->USU_CREA',now())";
        $agregado=$this->cnx->query($sql1);
        $this->cnx->close();
        return $NOTING; 
    }
 
    function cargarNotaIngreso(){
      $this->conectarse();
      $sql="SELECT DATE_FORMAT(t1.FECTRAN, '%d/%m/%Y')FECTRAN,t1.NOTING,
      t2.SIS_DESLAR ALMDES,t1.DESCRI,t3.SIS_DESCOR RAZON,ANULAD
      FROM trf_nota_ingreso t1
      INNER JOIN tbl_sistab t2 ON t2.SIS_NUMTAB='02' AND t2.SIS_NUMELE=t1.ALMDES
      INNER JOIN tbl_sistab t3 ON t3.SIS_NUMTAB='16' AND t3.SIS_NUMELE=t1.RAZON
      ORDER BY DATE_FORMAT(t1.FECTRAN, '%d/%m/%Y'), t1.NOTING ";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }
    
    function reporteNotaIngreso(){
      $this->conectarse();
      $sql="SELECT t2.NOMCIA,date_format(now(), '%d/%m/%Y') fecha,DATE_FORMAT(now(),'%H:%i')hora,t1.NOTING,
      DATE_FORMAT(t1.FECTRAN,'%d/%m/%Y') FECTRAN,ORDCOM,FACTURA,MONEDA,t1.DESCRI
      ,CONCAT(ALMDES,' ',t3.SIS_DESCOR)ALMDES
      ,CONCAT(CODTRAN,' ',t4.SIS_DESCOR)CODTRAN
      ,CONCAT(RAZON,' ',t5.SIS_DESCOR)RAZON
      FROM `trf_nota_ingreso` t1
      INNER JOIN tbl_control t2 on 0=0
      INNER JOIN tbl_sistab t3 on t1.ALMDES=t3.SIS_NUMELE and t3.SIS_NUMTAB='02'
      INNER JOIN tbl_sistab t4 on t1.CODTRAN=t4.SIS_NUMELE and t4.SIS_NUMTAB='15'
      INNER JOIN tbl_sistab t5 on t1.RAZON=t5.SIS_NUMELE and t5.SIS_NUMTAB='16'
       where NOTING='$this->NOTING'";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }

    function cargarAnularNotaIngreso(){
      $this->conectarse();
      $sql="SELECT t1.NOTING NUMERO,DATE_FORMAT(t1.FECTRAN, '%d/%m/%Y')FECHA,
      CONCAT(t1.ALMDES,' ',t2.SIS_DESCOR) ALMDES
			,CONCAT(t1.CODTRAN,' ',t4.SIS_DESCOR)CODTRAN
			,CONCAT(t1.RAZON,' ',t3.SIS_DESCOR)RAZON,t1.CODPRO
			,CONCAT(t1.CLADOC,' ',t5.SIS_DESLAR)CLADOC
			,t1.SERIE,t1.FACTURA
      FROM trf_nota_ingreso t1
      INNER JOIN tbl_sistab t2 ON t2.SIS_NUMTAB='02' AND t2.SIS_NUMELE=t1.ALMDES
      INNER JOIN tbl_sistab t3 ON t3.SIS_NUMTAB='16' AND t3.SIS_NUMELE=t1.RAZON
      INNER JOIN tbl_sistab t4 ON t4.SIS_NUMTAB='15' AND t4.SIS_NUMELE=t1.CODTRAN
      INNER JOIN tbl_sistab t5 ON t5.SIS_NUMTAB='04' AND t5.SIS_NUMELE=t1.CLADOC
      where 
      DATE_FORMAT(t1.FECTRAN, '%d/%m/%Y')=DATE_FORMAT('$this->FECTRAN', '%d/%m/%Y') and IFNULL(ANULAD,'')=''
      ORDER BY DATE_FORMAT(t1.FECTRAN, '%d/%m/%Y'), t1.NOTING ";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }
    function eliminarNotaIngreso(){
      $NOTING=1;
      $this->conectarse();
      $sql="UPDATE trf_nota_ingreso SET ANULAD='A' 
      where NOTING='$this->NOTING' ";
      $resultado=$this->cnx->query($sql);

      $sql2="UPDATE trf_kardex SET STATUS='A' 
      where NOTINGRE='$this->NOTING' ";
      $resultado=$this->cnx->query($sql2);

      $sql3="CALL SP_REESTRUCTURAR_SALDO";
      $resultado2=$this->cnx->query($sql3);
      return $resultado; 
  }
  }
?>
