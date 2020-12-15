<?php
require_once("clsconexion.php");
class clsDetalleCotizacion extends clsConexion
  {
    public $LOCALI;
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
    public $COD_ALM;
    public $EXONER;
    public $INAFEC;
    public $SERVIC;
    public $ANULAD;


    function agregarDetalleCotizacion(){
        $agregado=0;
        $this->conectarse();
        $sql1="INSERT into trd_detalle_cotizacion (LOCALI,NUMDOC,NUMITE,IDPROD,CODLIN,CODSLI,CODITE,CODIGO,DESART,CANPED,PREUNI,IMPART,CODMON,TIPCAM,COD_ALM,
        EXONER,INAFEC,SERVIC,ANULAD) VALUES
        ('$this->LOCALI',LPAD('$this->NUMDOC',10,'0'),'$this->NUMITE','$this->IDPROD','$this->CODLIN','$this->CODSLI','$this->CODITE','$this->CODIGO','$this->DESART',
        '$this->CANPED','$this->PREUNI','$this->IMPART','$this->CODMON','$this->TIPCAM','$this->COD_ALM','$this->EXONER',
        '$this->INAFEC','$this->SERVIC','$this->ANULAD')";
        //echo $sql1;
        $agregado=$this->cnx->query($sql1);
        $this->cnx->close();
        return $NUMDOC;
    }

    function actualizarDetalleCotizacion(){

      $agregado=0;
      $this->conectarse();

      if($this->NUMITE==1){
        $sql="DELETE FROM trd_detalle_cotizacion  where NUMDOC=LPAD('$this->NUMDOC',10,'0')";
        //echo $sql1;
        $agregado=$this->cnx->query($sql);
      }

      $sql1="INSERT into trd_detalle_cotizacion (LOCALI,NUMDOC,NUMITE,IDPROD,CODLIN,CODSLI,CODITE,CODIGO,DESART,CANPED,PREUNI,IMPART,CODMON,TIPCAM,COD_ALM,
      EXONER,INAFEC,SERVIC,ANULAD) VALUES
      ('$this->LOCALI',LPAD('$this->NUMDOC',10,'0'),'$this->NUMITE','$this->IDPROD','$this->CODLIN','$this->CODSLI','$this->CODITE','$this->CODIGO','$this->DESART',
      '$this->CANPED','$this->PREUNI','$this->IMPART','$this->CODMON','$this->TIPCAM','$this->COD_ALM','$this->EXONER',
      '$this->INAFEC','$this->SERVIC','$this->ANULAD')";
      //echo $sql1;
      $agregado=$this->cnx->query($sql1);
      $this->cnx->close();
      return $NUMDOC;
    }

    public function cargarDetalleCotizacion(){
      $this->conectarse();
      $sql="SELECT * FROM trd_detalle_cotizacion where NUMDOC=LPAD('$this->NUMDOC',10,'0')";
      $resultado=$this->cnx->query($sql);
      return $resultado;
    }
  }
?>
