<?php
require_once("clsconexion.php");
class clsControl extends clsConexion
  {
    public $CODCTR;
    public $RUCCIA;
    public $NOMCIA;
    public $NOMCOM;
    public $DIRCIA;
    public $TELEFO;
    public $CELULA;
    public $CORREO;
    public $PAGWEB;
    public $CTABCO;
    public $CTACOR;
    public $BNCONT;
    public $IGV;
    public $MONEDA;
    public $PUIGV;

    public function clsControlDatos($CODCTR="",$RUCCIA="",$NOMCIA="",$NOMCOM="",$DIRCIA="",$TELEFO="",$CELULA="",$CORREO="",$PAGWEB="",$CTABCO="",$CTACOR="",
        $BNCONT="",$IGV="",$MONEDA="",$PUIGV=""){
        $this->CODCTR=$CODCTR;
        $this->RUCCIA=$RUCCIA;
        $this->NOMCIA=$NOMCIA;
        $this->NOMCOM=$NOMCOM;
        $this->DIRCIA=$DIRCIA;
        $this->TELEFO=$TELEFO;
        $this->CELULA=$CELULA;
        $this->CORREO=$CORREO;
        $this->PAGWEB=$PAGWEB;
        $this->CTABCO=$CTABCO;
        $this->CTACOR=$CTACOR;
        $this->BNCONT=$BNCONT;      
        $this->IGV=$IGV;      
        $this->MONEDA=$MONEDA;      
        $this->PUIGV=$PUIGV;      
    }

    public function cargarControl(){
      $this->conectarse();
      $sql="SELECT * FROM tbl_control";
      $resultado=$this->cnx->query($sql);
      if($resultado->num_rows){
        $fila=$resultado->fetch_object();
        $this->clsControlDatos($fila->CODCTR,$fila->RUCCIA,$fila->NOMCIA,$fila->NOMCOM,$fila->DIRCIA,$fila->TELEFO,$fila->CELULA,$fila->CORREO,$fila->PAGWEB,$fila->CTABCO,$fila->CTACOR,
        $fila->BNCONT,$fila->IGV,$fila->MONEDA,$fila->PUIGV);
        return true;
      }else
        return false;
    }

    public function agregarControl(){
      $agregado=0;
      $this->conectarse();
      $sql="INSERT into tbl_control (RUCCIA,NOMCIA,NOMCOM,DIRCIA,TELEFO,CELULA,CORREO,PAGWEB,CTABCO,CTACOR,BNCONT) VALUES
       ('$this->RUCCIA','$this->NOMCIA','$this->NOMCOM','$this->DIRCIA','$this->TELEFO','$this->CELULA','$this->CORREO','$this->PAGWEB','$this->CTABCO','$this->CTACOR','$this->BNCONT')";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
    
    public function actualizarControl(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE tbl_control set NOMCIA='$this->NOMCIA',NOMCOM='$this->NOMCOM',DIRCIA='$this->DIRCIA',TELEFO='$this->TELEFO',CELULA='$this->CELULA',CORREO='$this->CORREO',PAGWEB='$this->PAGWEB'
      ,CTABCO='$this->CTABCO',CTACOR='$this->CTACOR',BNCONT='$this->BNCONT'
        where CODCTR='$this->CODCTR'";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }

    public function actualizarControl1(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE tbl_control set IGV='$this->IGV',MONEDA='$this->MONEDA',PUIGV='$this->PUIGV'
        where CODCTR='$this->CODCTR'";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
  }
?>
