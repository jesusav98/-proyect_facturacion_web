<?php
require_once("clsconexion.php");
class clsFacturacion extends clsConexion
  {
    public $LOCALI;
    public $CLADOC;
    public $SERIE;
    public $NUMDOC;
    public $MOTIVO;
    public $FECDOC;
    public $FECVEN;
    public $RUC;
    public $RAZSOC;
    public $DIRCLI;
    public $NUMCOT;
    public $CODMON;
    public $TIPVEN;
    public $CONDVEN;
    public $ORDCOM;
    public $CODVEN;
    public $AFEDETRA;
    public $PORDETRA;
    public $AFEAGERET;
    public $PORAGERET;
    public $CLADOCGUIAS;
    public $SERIEGUIAS;
    public $NUMDOCGUIAS;
    public $PORDES;
    public $CLADOCAPLI;
    public $SERIEAPLI;
    public $NUMDOCAPLI;
    public $FECDOCAPLI;
    public $IMPBRU;
    public $IMPBI;
    public $IMPDES;
    public $IMPEXO;
    public $IMPINAFEC;
    public $IMPIMP;
    public $IMPTOT;
    public $TIPCAM;
    public $ANULAD;
    public $BUENCONTR;
    public $URL_FACTURA_E;
    public $ESTADO_FACTURA_E;
    public $CODIGO_QR;
    public $CODIGO_HASH;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD;
    public $FEC_MOD;

    function agregarFacturacion(){
      $NUMDOC=1;
      $this->conectarse();
      $sql="SELECT (CONTADOR+1) NUMDOC FROM tbl_contador where CLADOC='$this->CLADOC' and SERIE='$this->SERIE'";
      $rSet=$this->cnx->query($sql);
      if($rSet->num_rows){
          $fila=$rSet->fetch_object();
          $NUMDOC=$fila->NUMDOC;
      }
      
      $agregado=0;
      $sql1="INSERT into trf_facturacion (LOCALI,CLADOC,SERIE,NUMDOC,MOTIVO,FECDOC,FECVEN,RUC,RAZSOC,DIRCLI,NUMCOT,CODMON,TIPVEN,CONDVEN,ORDCOM
      ,CODVEN,AFEDETRA,PORDETRA,AFEAGERET,PORAGERET,PORDES,CLADOCAPLI,SERIEAPLI,NUMDOCAPLI,FECDOCAPLI,IMPBRU,IMPBI,IMPDES,IMPEXO,IMPINAFEC
      ,IMPIMP,IMPTOT,TIPCAM,BUENCONTR,USU_CREA,FEC_CREA) VALUES
      ('$this->LOCALI','$this->CLADOC','$this->SERIE',LPAD('$NUMDOC',10,'0'),'$this->MOTIVO','$this->FECDOC','$this->FECVEN','$this->RUC',
      '$this->RAZSOC','$this->DIRCLI','$this->NUMCOT','$this->CODMON','$this->TIPVEN','$this->CONDVEN','$this->ORDCOM','$this->CODVEN',
      '$this->AFEDETRA','$this->PORDETRA','$this->AFEAGERET','$this->PORAGERET','$this->PORDES','$this->CLADOCAPLI','$this->SERIEAPLI',
      '$this->NUMDOCAPLI','$this->FECDOCAPLI','$this->IMPBRU','$this->IMPBI','$this->IMPDES','$this->IMPEXO','$this->IMPINAFEC','$this->IMPIMP',
      '$this->IMPTOT','$this->TIPCAM','$this->BUENCONTR',
      '$this->USU_CREA',now())";
      $agregado=$this->cnx->query($sql1);
      

      $sql2="UPDATE tbl_contador SET CONTADOR='$NUMDOC' where CLADOC='$this->CLADOC' and SERIE='$this->SERIE'";
      $rSet2=$this->cnx->query($sql2);

      $N_cot=explode(',',$this->NUMCOT);
      $NUMCOT= (int)($this->NUMCOT);
      $sql3="UPDATE trf_cotizacion SET CLADOCFACT='$this->CLADOC' ,SERFACT='$this->SERIE',NUMFACT=LPAD('$NUMDOC',10,'0') ,ESTCOT='2',USU_MOD='$this->USU_MOD',FEC_MOD=now()
        where NUMDOC=LPAD('$NUMCOT',10,'0')";
        $agregado2=$this->cnx->query($sql3);
      foreach ($N_cot as $clave => $valor) {
        echo $$valor;
        $sql3="UPDATE trf_cotizacion SET CLADOCFACT='$this->CLADOC' ,SERFACT='$this->SERIE',NUMFACT=LPAD('$NUMDOC',10,'0') ESTCOT='2',USU_MOD='$this->USU_MOD',FEC_MOD=now()
        where NUMDOC=LPAD('$valor',10,'0')";
        $agregado2=$this->cnx->query($sql3);
      }

      $this->cnx->close();
      return $NUMDOC;
    }
 
    function cargarFacturacion(){
      $this->conectarse();
      $sql="SELECT DATE_FORMAT(FECDOC, '%d/%m/%Y')FECDOC,
      concat(t1.SIS_DESCOR,'-',t0.CLADOC)CLADOC,concat(t0.CLADOC,'-',t0.SERIE,'-',NUMDOC)NUMDOC
      ,SUBSTRING(NUMCOT,1,9)NUMCOT,RUC,RAZSOC,t2.SIS_DESCOR MOTIVO,t3.SIS_DESCOR TIPVEN ,t4.SIS_DESCOR CODMON ,IMPTOT,ANULAD,t5.TIPIMP
     
      from trf_facturacion t0
      INNER JOIN tbl_sistab t1 ON t1.SIS_NUMTAB='04' AND t1.SIS_NUMELE=CLADOC
       INNER JOIN tbl_sistab t2 ON 
      (t2.SIS_NUMTAB=(case when CLADOC in('07') then '11' else case when CLADOC in('08') then '12' else '10' end end))  
      AND t2.SIS_NUMELE=MOTIVO
      INNER JOIN tbl_sistab t3 ON t3.SIS_NUMTAB='07' AND t3.SIS_NUMELE=TIPVEN
      INNER JOIN tbl_sistab t4 ON t4.SIS_NUMTAB='08' AND t4.SIS_NUMELE=CODMON
			INNER JOIN tbl_contador t5 on t0.CLADOC=t5.CLADOC and t0.SERIE=t5.SERIE
      ORDER BY DATE_FORMAT(t0.FECDOC, '%d/%m/%Y'), concat(t0.CLADOC,'-',t0.SERIE,'-',t0.NUMDOC) ";
      
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }

    function buscarFactura(){
      $this->conectarse();
      $sql="SELECT concat(CLADOC,'-',SERIE,'-',NUMDOC)NUMDOC,RUC,RAZSOC,t3.SIS_DESCOR TIPVEN
      FROM trf_facturacion
      INNER JOIN tbl_sistab t3 ON t3.SIS_NUMTAB='07' AND t3.SIS_NUMELE=TIPVEN
      where IFNULL(ANULAD,'')<>'a'and 
      IFNULL(CLADOCAPLI,'')=''AND  RUC='$this->RUC' and CLADOC='$this->CLADOC' and SERIE='$this->SERIE'
      ORDER BY DATE_FORMAT(FECDOC, '%d/%m/%Y'), concat(CLADOC,'-',SERIE,'-',NUMDOC)  ";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }

    function reporteFactura(){
      $this->conectarse();
      $sql="SELECT t2.RUCCIA,t2.NOMCIA,t2.DIRCIA,CONCAT('Tel: ',t2.TELEFO,' Cel: ',t2.CELULA) telcel,t2.CORREO,
      t3.DESCRI CLADOC,CONCAT(t1.SERIE,'-',t1.NUMDOC)NUMDOC,t1.RUC, DATE_FORMAT(t1.FECDOC, '%d/%m/%Y')FECDOC,
      t1.RAZSOC,t4.SIS_DESLAR CODVEN,t1.CONDVEN,t5.SIS_DESLAR TIPVEN,t1.ORDCOM,t1.NUMCOT,t6.SIS_DESLAR CODMON,
      t1.IMPBRU,t1.IMPBI,t1.IMPEXO,t1.IMPINAFEC,t1.IMPIMP,t1.IMPTOT,
			case WHEN LENGTH(t1.RUC)=8 then '1' else 6 end TIPDOCIDE,t1.CODIGO_HASH
      FROM trf_facturacion t1
      INNER JOIN tbl_control t2 on 0=0
      INNER JOIN tbl_contador t3 on t1.CLADOC=t3.CLADOC and t1.SERIE=t3.SERIE
      INNER JOIN tbl_sistab t4 ON t1.CODVEN=t4.SIS_NUMELE AND t4.SIS_NUMTAB='06'
      INNER JOIN tbl_sistab t5 ON t1.TIPVEN=t5.SIS_NUMELE AND t5.SIS_NUMTAB='07'
      INNER JOIN tbl_sistab t6 ON t1.CODMON=t6.SIS_NUMELE AND t6.SIS_NUMTAB='08'
       where t1.CLADOC='$this->CLADOC' and t1.SERIE='$this->SERIE' and t1.NUMDOC=LPAD('$this->NUMDOC',10,'0')";
     
      $resultado=$this->cnx->query($sql);
      return $resultado;
    }

    function cargarFacturaAnu(){
      $this->conectarse();
      $sql="SELECT RUC,CONCAT(CLADOC,'-',SERIE,'-',NUMDOC)NUMDOC,RAZSOC,DATE_FORMAT(FECDOC, '%d/%m/%Y') FECDOC,IMPTOT 
      from trf_facturacion 
      where CLADOC='$this->CLADOC' and SERIE='$this->SERIE' and IFNULL(ANULAD,'')=''";
      $resultado=$this->cnx->query($sql);
      return $resultado;
    }

    function anularFacturacion(){
      $this->conectarse();
      $sql="UPDATE trf_facturacion SET ANULAD='A' 
      where CLADOC='$this->CLADOC' and SERIE='$this->SERIE' and NUMDOC='$this->NUMDOC'";
      $resultado=$this->cnx->query($sql);
      $sql2="UPDATE trf_kardex SET STATUS='A' 
      where CLADOCFACT='$this->CLADOC' and SERIEFACT='$this->SERIE' and FACTURA='$this->NUMDOC'";
      $resultado=$this->cnx->query($sql2);

      $sql3="CALL SP_REESTRUCTURAR_SALDO";
      $resultado2=$this->cnx->query($sql3);

      return $resultado;
    }

    function motoLetra(){
      $this->conectarse();
      $sql="CALL Numeros_a_Letras ($this->IMPTOT)";
      $resultado=$this->cnx->query($sql);
      return $resultado;
    }
  }
?>
