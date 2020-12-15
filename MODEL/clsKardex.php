<?php
require_once("clsconexion.php");
class clsKardex extends clsConexion
  {
    public $desde;
    public $hasta;
    public $codalm;
    public $idprod;
    function cargarKardex(){
      $this->conectarse();
      $sql="SELECT * FROM(
        SELECT CO,FECTRAN,CODTRAN,NUMDOC,NOTINGRE,RAZSOC,SUM(INGRESO)INGRESO,SUM(SALIDA)SALIDA,SUM(saldo)saldo
				FROM(SELECT concat(codlin,codsli,codite) CO,'' FECTRAN,'SALDO INI' CODTRAN, '' NUMDOC,'' NOTINGRE,'' RAZSOC,
        CASE WHEN t1.INGSAL ='I' THEN SUM(CANTID) ELSE 0 END INGRESO,
        CASE WHEN t1.INGSAL='S' THEN SUM(CANTID) ELSE 0 END SALIDA,
        sum(case t1.INGSAL when'I' then CANTID else 0 end-case t1.INGSAL when'S' then CANTID else 0 end) saldo 
        FROM trf_kardex T1 where t1.CODALM='$this->codalm' and t1.idprod='$this->idprod' and t1.FECTRAN<'$this->desde' and IFNULL(status,'')=''
				GROUP BY INGSAL)X
        UNION 
          SELECT concat(codlin,codsli,codite)CO,DATE_FORMAT(FECTRAN,'%d/%m/%Y') FECTRAN,t2.SIS_DESCOR CODTRAN, 
          CONCAT(t1.CLADOCFACT,'-',t1.SERIEFACT,'-',t1.FACTURA) NUMDOC,t1.NOTINGRE,t3.RAZSOC, 
          CASE WHEN t1.INGSAL ='I' THEN CANTID ELSE 0 END INGRESO, 
          CASE WHEN t1.INGSAL='S' THEN CANTID ELSE 0 END SALIDA,
          sum(case t1.INGSAL when'I' then CANTID else 0 end-case t1.INGSAL when'S' then CANTID else 0 end) saldo 
          FROM trf_kardex t1 
          INNER JOIN tbl_sistab t2 on t2.SIS_NUMTAB=15 and t1.CODTRAN=t2.SIS_NUMELE 
          INNER JOIN tbl_clientes t3 on t1.CODPRO=t3.TX_RUC 
          where t1.CODALM='$this->codalm' and t1.idprod='$this->idprod' and t1.FECTRAN>='$this->desde' and t1.FECTRAN<='$this->hasta'  and IFNULL(status,'')=''
          group by concat(codlin,codsli,codite),t1.FECTRAN,t2.SIS_DESCOR,CONCAT(t1.CLADOCFACT,'-',t1.SERIEFACT,'-',t1.FACTURA),t1.NOTINGRE,t3.RAZSOC)x
          ";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }

  }
?>
