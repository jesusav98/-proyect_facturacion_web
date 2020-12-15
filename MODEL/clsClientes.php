<?php
require_once("clsconexion.php");
class clsClientes extends clsConexion
{
    public $CODCLI;
    public $TX_RUC;
    public $RAZSOC;
    public $APEPAT;
    public $APEMAT;
    public $NOMBRES;
    public $NOMCOM;
    public $DIRECC;
    public $CODCIU;
    public $CODPROV;
    public $CODDPTO;
    public $TIPPER;
    public $TIPDOCIDE;
    public $FECAPE;
    public $INTNET;
    public $TELEFO;
    public $CELULAR;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD; 
    public $FE_MOD;

    public function cargarClientes(){
        $this->conectarse();
        $sql="SELECT * FROM tbl_clientes";
        $resultado=$this->cnx->query($sql);
        $this->cnx->close();
        return $resultado;
    }
    
    public function agregarClientes(){
      $agregado=0;
      $this->conectarse();
      $sql="INSERT INTO `tbl_clientes`(`TX_RUC`, `RAZSOC`, `APEPAT`, `APEMAT`, `NOMBRES`, `NOMCOM`,
       `DIRECC`, `CODCIU`, `CODPROV`, `CODDPTO`, `TIPPER`,TIPDOCIDE, `FECAPE`, `TELEFO`, `CELULAR`, `INTNET`, 
       `USU_CREA`, `FEC_CREA`)
        VALUES ('$this->TX_RUC','$this->RAZSOC','$this->APEPAT','$this->APEMAT',
        '$this->NOMBRES','$this->NOMCOM','$this->DIRECC','$this->CODCIU',
        '$this->CODPROV','$this->CODDPTO','$this->TIPPER','$this->TIPDOCIDE','$this->FECAPE','$this->TELEFO',
        '$this->CELULAR','$this->INTNET','$this->USU_CREA',now())";
      $agregado=$this->cnx->query($sql);

      $sql1="SELECT * from tbl_clientes where TX_RUC='$this->TX_RUC'";
      $rSet=$this->cnx->query($sql1);
      if($rSet->num_rows){
          $fila=$rSet->fetch_object();
          $CODCLI=$fila->CODCLI;
      }


      $agregado=0;
      $sql2="INSERT into tbl_anexos_clientes (NUM,CODCLI,NOMLOC,DIRENT,CODDPTO,CODPROV,CODCIU,DNI,CONTACTO,TELEFO,CELULAR
      ,NEXTEL,CORREO,PAGWEB,USU_CREA,FEC_CREA) VALUES
      (1,$CODCLI,'','$this->DIRECC','$this->CODDPTO','$this->CODPROV','$this->CODCIU',
      '$this->TX_RUC','$this->RAZSOC','$this->TELEFO','$this->CELULAR','','$this->INTNET',''
      ,'$this->USU_CREA',now())";
      echo $sql2;
      $agregado=$this->cnx->query($sql2);
      $this->cnx->close();
      return $agregado;
    }

    public function actualizarClientes(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE `tbl_clientes` SET `RAZSOC`='$this->RAZSOC',`APEPAT`='$this->APEPAT',`APEMAT`='$this->APEMAT',
      `NOMBRES`='$this->NOMBRES',`NOMCOM`='$this->NOMCOM',`DIRECC`='$this->DIRECC',`CODCIU`='$this->CODCIU',
      `CODPROV`='$this->CODPROV',`CODDPTO`='$this->CODDPTO',`TIPPER`='$this->TIPPER',TIPDOCIDE='$this->TIPDOCIDE',`FECAPE`='$this->FECAPE',
      `TELEFO`='$this->TELEFO',`CELULAR`='$this->CELULAR',`INTNET`='$this->INTNET',
      `USU_MOD`='$this->USU_MOD',`FE_MOD`=now()
      where `TX_RUC`='$this->TX_RUC'";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }

    public function eliminarCliente()
    {
      $actualizado=0;
      $this->conectarse();
      $sql="DELETE from tbl_clientes
          WHERE TX_RUC='".$this->TX_RUC."'";
      $actualizado=$this->cnx->query($sql);
      $this->cnx->close();
      return $actualizado;
    }
}