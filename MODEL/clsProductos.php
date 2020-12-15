<?php
require_once("clsconexion.php");
class clsProductos extends clsConexion
  {
    public $IDPROD;
    public $CODLIN;
    public $CODSLI;
    public $CODITE;
    public $PRECLI01;
    public $PUC;
    public $DESITE;
    public $FECAPE;
    public $STATUS;
    public $STOLIN;
    public $UNIMED;
    public $SERVIC;
    public $INAFEC;
    public $EXONER;
    public $USU_CREA;
    public $FEC_CREA;
    public $USU_MOD;
    public $FEC_MOD;

    public function cargarProductos(){
        $this->conectarse();
        $sql="SELECT * FROM tbl_producto";
        $resultado=$this->cnx->query($sql);
        $this->cnx->close();
        return $resultado;
    }

    public function agregarProductos(){
      $agregado=0;
      $this->conectarse();
      $sql="INSERT into tbl_producto (CODLIN,CODSLI,CODITE,DESITE,PRECLI01,PUC,FECAPE,STOLIN,STATUS,UNIMED,SERVIC,INAFEC,EXONER,USU_CREA,FEC_CREA)
      VALUES ('$this->CODLIN','$this->CODSLI','$this->CODITE','$this->DESITE','$this->PRECLI01','$this->PUC','$this->FECAPE',0,'$this->STATUS','$this->UNIMED','$this->SERVIC','$this->INAFEC','$this->EXONER'
      ,'$this->USU_CREA',now())"; 
      $agregado=$this->cnx->query($sql);

      $sql1="SELECT max(IDPROD) IDPROD from tbl_producto ";
      $rSet=$this->cnx->query($sql1);
      if($rSet->num_rows){
          $fila=$rSet->fetch_object();
          $IDPROD=$fila->IDPROD;
      }

      $sql2="INSERT into tbl_almacen_productos (IDPROD,CODALM,CODLIN,CODSLI,CODITE,CODIGO,STOLIN,STOINI,STATUS,FECHA_APE,USU_CREA,FEC_CREA) VALUES
      ('$IDPROD','01','$this->CODLIN','$this->CODSLI','$this->CODITE','$this->CODIGO','$this->STOLIN','$this->STOINI','$this->STATUS','$this->FECAPE'
      ,'$this->USU_CREA',now())";
      $agregado=$this->cnx->query($sql2);
      echo $sql2;
      $this->cnx->close();
      return $agregado;
    }
    
    public function actualizarProductos(){
      $agregado=0;
      $this->conectarse();
      $sql="UPDATE tbl_producto SET DESITE='$this->DESITE',PRECLI01='$this->PRECLI01',PUC='$this->PUC',FECAPE='$this->FECAPE',STATUS='$this->STATUS',
      UNIMED='$this->UNIMED',SERVIC='$this->SERVIC',INAFEC='$this->INAFEC',EXONER='$this->EXONER',USU_MOD='$this->USU_MOD',FEC_MOD=now()
      WHERE IDPROD='$this->IDPROD'";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }
    
    public function eliminarProductos(){
      $agregado=0;
      $this->conectarse();
      $sql="DELETE from tbl_producto 
      WHERE IDPROD='$this->IDPROD'";
      $agregado=$this->cnx->query($sql);
      $this->cnx->close();
      return $agregado;
    }

    public function cargarProductosAlmacen(){
      $this->conectarse();
      $sql="SELECT t1.IDPROD,t1.CODLIN,t1.CODSLI,t1.CODITE,DESITE,t2.STOLIN,SIS_DESLAR,PRECLI01,CODALM,EXONER,INAFEC,SERVIC from tbl_producto t1
      INNER JOIN tbl_almacen_productos t2 on t1.IDPROD=t2.IDPROD
      INNER JOIN tbl_sistab t3 on t2.CODALM=t3.SIS_NUMELE and t3.SIS_NUMTAB=02";
      $resultado=$this->cnx->query($sql); 
      $this->cnx->close();
      return $resultado;
  }
  }
?>
