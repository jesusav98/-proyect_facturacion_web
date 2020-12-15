<?php
require_once("clsconexion.php");
class clsDetalleFacturacion extends clsConexion
  {
    public $LOCALI;
    public $SERIE;
    public $CLADOC;
    public $NUMDOC;
    public $NUMITE;
    public $IDPROD;
    public $CODLIN;
    public $CODSLI;
    public $CODITE;
    public $CODIGO;
    public $DESART;
    public $CANPED;
    public $PREUNI;
    public $IMPART;
    public $CODMON;
    public $TIPCAM;
    public $CODALM;
    public $EXONER;
    public $INAFEC;
    public $SERVIC;


    function agregarDetalleFacturacion(){
        $agregado=0;
        $this->conectarse();
        $sql1="INSERT into trd_detalle_facturacion (LOCALI,SERIE,CLADOC,NUMDOC,NUMITE,IDPROD,CODLIN,CODSLI,CODITE,CODIGO,DESART,CANPED,PREUNI,IMPART
        ,CODMON,TIPCAM,CODALM,EXONER,INAFEC,SERVIC) VALUES
        ('$this->LOCALI','$this->SERIE','$this->CLADOC',LPAD('$this->NUMDOC',10,'0'),'$this->NUMITE','$this->IDPROD','$this->CODLIN','$this->CODSLI','$this->CODITE',
        '$this->CODIGO','$this->DESART','$this->CANPED','$this->PREUNI','$this->IMPART','$this->CODMON','$this->TIPCAM','$this->CODALM','$this->EXONER',
        '$this->INAFEC','$this->SERVIC')";
        //echo $sql1;
        $agregado=$this->cnx->query($sql1);

        $sql2="CALL SP_INSERTA_DETALLE_FACTURA
        ('$this->LOCALI','$this->SERIE','$this->CLADOC',LPAD('$this->NUMDOC',10,'0'),'$this->NUMITE','$this->CODLIN','$this->CODSLI','$this->CODITE',
        '$this->IDPROD','$this->DESART','$this->CANPED','$this->PREUNI','$this->IMPART','$this->CODMON','$this->TIPCAM','$this->CODALM','$this->EXONER',
        '$this->INAFEC','$this->SERVIC')";

        $agregado=$this->cnx->query($sql2);
        $this->cnx->close();
        return $NUMDOC;
    }

     function cargarDetalleFacturacion(){
      $this->conectarse();
      $sql="SELECT t1.* FROM trd_detalle_facturacion t1
       where concat(t1.CLADOC,'-',t1.SERIE,'-',t1.NUMDOC)='$this->NUMDOC'";
      
      $resultado=$this->cnx->query($sql);
      return $resultado;
    }

    
  }
?>
