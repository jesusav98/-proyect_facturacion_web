<?php
    require_once("clsconexion.php");
    class clsUbigeo extends clsConexion
    {
        public function cargarDepartamento(){
            $this->conectarse();
            $sql="SELECT * FROM st_dpto ORDER BY CODDPTO ASC";
            $resultado=$this->cnx->query($sql);
            $this->cnx->close();
            return $resultado;
        }
        public function cargarProvincia(){
            $this->conectarse();
            $sql="SELECT * FROM st_prov ORDER BY CODPROV ASC";
            $resultado=$this->cnx->query($sql);
            $this->cnx->close();
            return $resultado;
        }
        public function cargarDistrito(){
            $this->conectarse();
            $sql="SELECT * FROM st_dist ORDER BY CODDIST ASC";
            $resultado=$this->cnx->query($sql);
            $this->cnx->close();
            return $resultado;
        }
    }
?>