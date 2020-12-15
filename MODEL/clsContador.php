<?php
require_once("clsconexion.php");
class clsContador extends clsConexion
{
    public $CLADOC;
    public $SERIE;
    public $DESCRI;
    public $CONTADOR;
    public $PREDETER;
    public $TIPEMI;
    public $DIRGUI;
    public $CODALM;
    public $PV;
    public $TIPIMP;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD; 
    public $FEC_MOD;

    public function cargarContador(){
        $this->conectarse();
        $sql="SELECT * FROM tbl_contador";
        $resultado=$this->cnx->query($sql);
        $this->cnx->close();
        return $resultado;
    }
    
    public function agregarContador(){
      $agregado=0;
      $this->conectarse();
      $sql="INSERT INTO `tbl_contador`(`CLADOC`, `SERIE`, `DESCRI`, `CONTADOR`, `PREDETER`, `TIPEMI`,
       `DIRGUI`, `CODALM`, `PV`, TIPIMP,
       `USU_CREA`, `FEC_CREA`)
        VALUES ('$this->CLADOC','$this->SERIE','$this->DESCRI','$this->CONTADOR','$this->PREDETER','$this->TIPEMI',
        '$this->DIRGUI','$this->CODALM','$this->PV','$this->TIPIMP',
        '$this->USU_CREA',now())";
      echo $sql;
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
 
    public function actualizarContador(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE `tbl_contador` SET `DESCRI`='$this->DESCRI',`CONTADOR`='$this->CONTADOR',`PREDETER`='$this->PREDETER',
      `TIPEMI`='$this->TIPEMI',`DIRGUI`='$this->DIRGUI',`CODALM`='$this->CODALM',`PV`='$this->PV',TIPIMP='$this->TIPIMP',
      `USU_MOD`='$this->USU_MOD',`FEC_MOD`=now()
      where `CLADOC`='$this->CLADOC' and `SERIE`='$this->SERIE'";
      echo $sql;
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }

    public function eliminarContador()
    {
      $actualizado=0;
      $this->conectarse();
      $sql="DELETE from tbl_contador
          WHERE `CLADOC`='$this->CLADOC' and `SERIE`='$this->SERIE'";
      $actualizado=$this->cnx->query($sql);
      $this->cnx->close();
      return $actualizado;
    }
}