<?php
require_once("clsconexion.php");
class clsDetalleNotaIngreso extends clsConexion
  {
    public $NUMORD;
    public $FECTRAN;
    public $NUMITE;
    public $CODLIN;
    public $CODSLI;
    public $CODITE;
    public $CODIGO;
    public $DESART;
    public $UNIMED;
    public $CANTID;
    public $COSUNI;
    public $IMPART;
    public $CODALM;
    public $EXONER;
    public $SERVIC;


    function agregarDetalleNotaIngreso(){
        $agregado=0;
        $this->conectarse();
        $sql1="INSERT into trd_detalle_nota_ingreso (NUMORD,FECTRAN,NUMITE,CODLIN,CODSLI,CODITE,CODIGO,DESART,UNIMED,CANTID,COSUNI
        ,IMPART,CODALM,EXONER) VALUES
        (LPAD('$this->NUMORD',10,'0'),'$this->FECTRAN','$this->NUMITE','$this->CODLIN','$this->CODSLI','$this->CODITE',
        '$this->CODIGO','$this->DESART','$this->UNIMED','$this->CANTID','$this->COSUNI','$this->IMPART','$this->CODALM','$this->EXONER')";
        $agregado=$this->cnx->query($sql1);

        $sql2="CALL SP_INSERTA_DETALLE_NOTA_INGRESO
        (LPAD('$this->NUMORD',10,'0'),'$this->FECTRAN','$this->NUMITE','$this->CODLIN','$this->CODSLI','$this->CODITE',
        '$this->CODIGO','$this->DESART','$this->UNIMED','$this->CANTID','$this->COSUNI','$this->IMPART','$this->CODALM','$this->EXONER',
        '$this->SERVIC')";
        $agregado=$this->cnx->query($sql2); 
        $this->cnx->close();
        return $agregado;
    }
    public function cargarDetalleNotaIngreso()
    {
      $this->conectarse();
      $sql="SELECT *
      FROM `trd_detalle_nota_ingreso`
        where NUMORD='$this->NUMORD'";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }
  }
?>
