<?php
require_once("clsconexion.php");
class clsSisTab extends clsConexion
  {
    public $SIS_NUMTAB;
    public $SIS_NUMELE;
    public $SIS_DESLAR;
    public $SIS_DESCOR;
    public $SIS_DESNUM;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD;
    public $FEC_MOD;

    public function clsSisTabDatos($SIS_NUMTAB="",$SIS_NUMELE="",$SIS_DESLAR="",$SIS_DESCOR="",$SIS_DESNUM="",$USU_CREA="",$FEC_CREA="",$USU_MOD="",$FEC_MOD=""){
        $this->SIS_NUMTAB=$SIS_NUMTAB;
        $this->SIS_NUMELE=$SIS_NUMELE;
        $this->SIS_DESLAR=$SIS_DESLAR;
        $this->SIS_DESCOR=$SIS_DESCOR;
        $this->SIS_DESNUM=$SIS_DESNUM;
        $this->USU_CREA=$USU_CREA;
        $this->FEC_CREA=$FEC_CREA;
        $this->USU_MOD=$USU_MOD;
        $this->FEC_MOD=$FEC_MOD;
    }

    public function cargarSisTab(){
      $this->conectarse();
      $sql="SELECT * FROM tbl_sistab where SIS_NUMTAB='$this->SIS_NUMTAB'" ;
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }

    public function agregarSisTab(){
      $agregado=0;
      $this->conectarse();
      $sql="INSERT into tbl_sistab (SIS_NUMTAB,SIS_NUMELE,SIS_DESLAR,SIS_DESCOR,SIS_DESNUM,USU_CREA,FEC_CREA) VALUES
       ('$this->SIS_NUMTAB','$this->SIS_NUMELE','$this->SIS_DESLAR','$this->SIS_DESCOR','$this->SIS_DESNUM','$this->USU_CREA',now())";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
    
    public function actualizarSisTab(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE tbl_sistab set SIS_DESLAR='$this->SIS_DESLAR',SIS_DESCOR='$this->SIS_DESCOR',SIS_DESNUM='$this->SIS_DESNUM',USU_MOD='$this->USU_MOD',FEC_MOD=now()
      where SIS_NUMTAB='$this->SIS_NUMTAB' and SIS_NUMELE='$this->SIS_NUMELE' ";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
    
    public function eliminarSisTab(){
      $agregado=0;
      $this->conectarse();
      $sql="DELETE FROM tbl_sistab 
      where SIS_NUMTAB='$this->SIS_NUMTAB' and SIS_NUMELE='$this->SIS_NUMELE' ";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;  
    }
    public function cargarComboSisTab(){
      $this->conectarse();
      $sql="SELECT SIS_NUMELE,SIS_DESCOR,SIS_DESLAR FROM tbl_sistab where SIS_NUMTAB='$this->SIS_NUMTAB'
      ORDER BY SIS_DESNUM DESC" ;
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }
  }
?>
