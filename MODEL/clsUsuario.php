<?php
require_once("clsconexion.php");
class clsUsuario extends clsConexion
  {
    public $IDUSURIO;
    public $TXCODIGOUSUARIO;
    public $TXAPELLIDOPATERNO;
    public $TXAPELLIDOMATERNO;
    public $TXNOMBRES;
    public $TXDNI;
    public $FENACIMIENTO;
    public $TXCORREOELECTRONICO;
    public $TXCLAVE;
    public $FECADUCIDAD;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD;
    public $FEC_MOD;
    public $NUESTADO;
    public $IDPERFIL;

    public function clsUsuarioLogin($TXCODIGOUSUARIO="",$IDPERFIL="",$NUESTADO="",$FECADUCIDAD=""){
      $this->TXCODIGOUSUARIO=$TXCODIGOUSUARIO;
      $this->IDPERFIL=$IDPERFIL;
      $this->NUESTADO=$NUESTADO;
      $this->FECADUCIDAD=$FECADUCIDAD;
    }

    public function validarUsuario(){
      $this->conectarse();
      $sql="SELECT * FROM sgu_tbl_usuario WHERE TXCODIGOUSUARIO='".$this->TXCODIGOUSUARIO."' AND TXCLAVE=md5('".$this->TXCLAVE."')";
      $rSet=$this->cnx->query($sql);
      if($rSet->num_rows){
        $fila=$rSet->fetch_object();
        $this->clsUsuarioLogin($fila->TXCODIGOUSUARIO,$fila->IDPERFIL,$fila->NUESTADO,$fila->FECADUCIDAD);
        return true;
      }else
        return false;
    }

    public function cargarUsuario(){
      $this->conectarse();
      $sql="SELECT * FROM sgu_tbl_usuario";
      $resultado=$this->cnx->query($sql);
      $this->cnx->close();
      return $resultado;
    }

    public function agregarUsuario(){
      $agregado=0;
      $this->conectarse();
      $sql="INSERT into sgu_tbl_usuario (TXDNI,TXNOMBRES,TXAPELLIDOPATERNO,TXAPELLIDOMATERNO,FENACIMIENTO,TXCORREOELECTRONICO,
      TXCODIGOUSUARIO,IDPERFIL,FECADUCIDAD,NUESTADO,TXCLAVE,USU_CREA,FEC_CREA)
       VALUES ('$this->TXDNI','$this->TXNOMBRES','$this->TXAPELLIDOPATERNO','$this->TXAPELLIDOMATERNO',
       '$this->FENACIMIENTO','$this->TXCORREOELECTRONICO','$this->TXCODIGOUSUARIO','$this->IDPERFIL',
       '$this->FECADUCIDAD','$this->NUESTADO',MD5('$this->TXCLAVE'),'$this->USU_CREA',
       now())";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }

    public function actualizarUsuario(){
      $actualizado=false;
      $this->conectarse();
      $sql="UPDATE sgu_tbl_usuario SET TXAPELLIDOPATERNO='".$this->TXAPELLIDOPATERNO."',
      TXAPELLIDOPATERNO='".$this->TXAPELLIDOPATERNO."',TXAPELLIDOMATERNO='".$this->TXAPELLIDOMATERNO."',
      FENACIMIENTO='".$this->FENACIMIENTO."',TXCORREOELECTRONICO='".$this->TXCORREOELECTRONICO."',IDPERFIL='".$this->IDPERFIL."',
      FECADUCIDAD='".$this->FECADUCIDAD."',NUESTADO='".$this->NUESTADO."',USU_MOD='".$this->USU_MOD."',
      FEC_MOD=now()
          WHERE TXCODIGOUSUARIO='".$this->TXCODIGOUSUARIO."'";
      $actualizado=$this->cnx->query($sql);
      $this->cnx->close();
      return $actualizado;
    }

    public function eliminarUsuario()
    {
      $actualizado=0;
      $this->conectarse();
      $sql="DELETE from sgu_tbl_usuario
          WHERE TXCODIGOUSUARIO='".$this->TXCODIGOUSUARIO."'";
      $actualizado=$this->cnx->query($sql);
      $this->cnx->close();
      return $actualizado;
    }
  }
?>
