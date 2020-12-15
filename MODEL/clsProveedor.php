<?php
require_once("clsconexion.php");
class clsProveedor extends clsConexion
{
    public $IDPROV;
    public $TIPDOCIDE;
    public $RUC;
    public $ESTADO;
    public $RAZSOC;
    public $DIRECC;
    public $NOMCOM;
    public $DIRECC1;
    public $TEL1;
    public $TEL2;
    public $CEL;
    public $REPRES;
    public $CONTACTO;
    public $INTNET;
    public $PAGWEB;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD; 
    public $FEC_MOD;

    public function cargarProveedor(){
        $this->conectarse();
        $sql="SELECT * FROM tbl_proveedores";
        $resultado=$this->cnx->query($sql);
        $this->cnx->close();
        return $resultado;
    }
    
    public function agregarProveedor(){
      $agregado=0;
      $this->conectarse();
      $sql="INSERT INTO `tbl_proveedores`(`TIPDOCIDE`, `RUC`, `ESTADO`, `RAZSOC`, `DIRECC`, `NOMCOM`,
       `DIRECC1`, `TEL1`, `TEL2`, `CEL`, `REPRES`, `CONTACTO`, `INTNET`, `PAGWEB`,
       `USU_CREA`, `FEC_CREA`)
        VALUES ('$this->TIPDOCIDE','$this->RUC','$this->ESTADO','$this->RAZSOC','$this->DIRECC','$this->NOMCOM',
        '$this->DIRECC1','$this->TEL1','$this->TEL2','$this->CEL','$this->REPRES','$this->CONTACTO','$this->INTNET','$this->PAGWEB',
        '$this->USU_CREA',now())";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
 
    public function actualizarProveedor(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE `tbl_proveedores` SET `ESTADO`='$this->ESTADO',`RAZSOC`='$this->RAZSOC',`DIRECC`='$this->DIRECC',
      `NOMCOM`='$this->NOMCOM',`DIRECC1`='$this->DIRECC1',`TEL1`='$this->TEL1',`TEL2`='$this->TEL2',
      `CEL`='$this->CEL',`REPRES`='$this->REPRES',`CONTACTO`='$this->CONTACTO',`INTNET`='$this->INTNET',
      `PAGWEB`='$this->PAGWEB',`USU_MOD`='$this->USU_MOD',`FEC_MOD`=now()
      where `RUC`='$this->RUC'";
      echo $sql;
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }

    public function eliminarProveedor()
    {
      $actualizado=0;
      $this->conectarse();
      $sql="DELETE from tbl_proveedores
          WHERE RUC='".$this->RUC."'";
      $actualizado=$this->cnx->query($sql);
      $this->cnx->close();
      return $actualizado;
    }
}