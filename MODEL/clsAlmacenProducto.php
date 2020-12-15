<?php
require_once("clsconexion.php");
class clsAlmacenProducto extends clsConexion
  {
    public $IDPROD;
    public $CODALM;
    public $CODLIN;
    public $CODSLI;
    public $CODITE;
    public $CODIGO;
    public $STOLIN;
    public $STOINI;
    public $STATUS;
    public $FECHA_APE;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD;
    public $FEC_MOD;


    public function cargarAlamcenProductos(){
      $this->conectarse();
      $sql="SELECT * FROM tbl_almacen_productos where IDPROD='$this->IDPROD'";
      $resultado=$this->cnx->query($sql);
      return $resultado;
    }

    public function agregarAlamcenProductos(){
      $agregado=0;
      $this->conectarse();
      $sql="INSERT into tbl_almacen_productos (IDPROD,CODALM,CODLIN,CODSLI,CODITE,CODIGO,STOLIN,STOINI,STATUS,FECHA_APE,USU_CREA,FEC_CREA) VALUES
       ('$this->IDPROD','$this->CODALM','$this->CODLIN','$this->CODSLI','$this->CODITE','$this->CODIGO','$this->STOLIN','$this->STOINI','$this->STATUS','$this->FECHA_APE'
       ,'$this->USU_CREA',now())";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
    
    public function actualizarAlamcenProductos(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE tbl_almacen_productos set STATUS='$this->STATUS'
      ,USU_MOD='$this->USU_MOD',FEC_MOD=now()
      where IDPROD='$this->IDPROD' and CODALM='$this->CODALM'";
      echo $sql;
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
    
    public function eliminarAlamcenProductos(){
      $agregado=0;
      $this->conectarse();
      $sql="DELETE FROM tbl_almacen_productos 
      where IDPROD='$this->IDPROD' and CODALM='$this->CODALM'";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;  
    }
  }
?>
