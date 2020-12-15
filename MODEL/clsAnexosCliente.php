<?php
require_once("clsconexion.php");
class clsAnexosCliente extends clsConexion
  {
    public $NUM;
    public $CODCLI;
    public $TX_RUC;
    public $DIRENT;
    public $CODDPTO;
    public $CODPROV;
    public $CODCIU;
    public $NOMLOC;
    public $CONTACTO;
    public $TELEFO;
    public $CELULAR;
    public $NEXTEL;
    public $CORREO;
    public $PAGWEB;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD;
    public $FEC_MOD;


    public function cargarAnexoClientes(){
      $this->conectarse();
      $sql="SELECT * FROM tbl_anexos_clientes where CODCLI='$this->CODCLI'";
      $resultado=$this->cnx->query($sql); 
      return $resultado;
    }

    public function agregarAnexoClientes(){
      $NUM_DIRE=1;
      $this->conectarse();
      $sql="SELECT CASE WHEN (SELECT MAX(NUM)+1  FROM tbl_anexos_clientes WHERE (CODCLI)='$this->CODCLI')>0 
      THEN (SELECT MAX(NUM)+1  FROM tbl_anexos_clientes WHERE (CODCLI)='$this->CODCLI') ELSE 1 END NUM_DIRE";
      $rSet=$this->cnx->query($sql);
      if($rSet->num_rows){
        $fila=$rSet->fetch_object();
        $NUM_DIRE=$fila->NUM_DIRE;
      }
      $agregado=0;
      $sql1="INSERT into tbl_anexos_clientes (NUM,CODCLI,TX_RUC,DIRENT,CODDPTO,CODPROV,CODCIU,NOMLOC,CONTACTO,TELEFO,CELULAR
      ,NEXTEL,CORREO,PAGWEB,USU_CREA,FEC_CREA) VALUES
       ('$NUM_DIRE','$this->CODCLI','$this->TX_RUC','$this->DIRENT','$this->CODDPTO','$this->CODPROV','$this->CODCIU',
       '$this->NOMLOC','$this->CONTACTO','$this->TELEFO','$this->CELULAR','$this->NEXTEL','$this->CORREO','$this->PAGWEB'
       ,'$this->USU_CREA',now())";
      $agregado=$this->cnx->query($sql1);
      $this->cnx->close();
      return $agregado;
    }
    
    public function actualizarAnexoClientes(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE tbl_anexos_clientes set DIRENT='$this->DIRENT',CODDPTO='$this->CODDPTO',CODPROV='$this->CODPROV',CODCIU='$this->CODCIU',NOMLOC='$this->NOMLOC'
      ,CONTACTO='$this->CONTACTO',TELEFO='$this->TELEFO',CELULAR='$this->CELULAR',NEXTEL='$this->NEXTEL',CORREO='$this->CORREO',PAGWEB='$this->PAGWEB'
      ,USU_MOD='$this->USU_MOD',FEC_MOD=now()
      where NUM='$this->NUM' and CODCLI='$this->CODCLI'";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
    
    public function eliminarAnexoClientes(){
      $agregado=0;
      $this->conectarse();
      $sql="DELETE FROM tbl_anexos_clientes 
      where NUM='$this->NUM' and CODCLI='$this->CODCLI'";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;  
    }
    public function cargarDireccionClientes(){
      $this->conectarse();
      $sql="SELECT * FROM tbl_anexos_clientes where TX_RUC='$this->TX_RUC'";
      $resultado=$this->cnx->query($sql);
      return $resultado;
    }
  }
?>
