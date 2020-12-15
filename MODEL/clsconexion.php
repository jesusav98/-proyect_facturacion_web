<?php
class clsConexion
{
  public $cnx;
  public function conectarse(){
    //$this->cnx=new mysqli("localhost", "root", "12345678", "db_facturacion");
    $this->cnx=new mysqli("dbadminsoft.cy7oxykz3fhv.us-east-1.rds.amazonaws.com:3306", "dbadminsoft", "dbadminsoft","dbadminsoft");
    
    if ($this->cnx->connect_errno) {
      printf("Connect failed: %s\n", $this->cnx->connect_errno);
      printf("Errormessage: %s\n", $this->cnx->error);
      printf(sprintf("[%d] %s\n", mysqli_connect_errno(), mysqli_connect_error()));

      /* Conexión 1, la conexión vincula una variable SQL de usuario, no se ejecuta ningún SELECT en el maestro */
      if (!$this->cnx->query("SET @myrole='master'")) {
        printf("[%d] %s\n", $this->cnx->errno, $this->cnx->error);
      }
      
      /* Conexión 2, primer esclavo */
      $resultado = $this->cnx->query("SELECT VERSION() AS _version");
      /* Tolerancia a fallos manual */
      if (2002 == $this->cnx->errno || 2003 == $this->cnx->errno || 2004 == $this->cnx->errno) {
        /* Conexión 3, falló la conexión al primer esclavo, se intenta con el siguiente */
        $resultado = $this->cnx->query("SELECT VERSION() AS _version");
      }
      
      if (!$resultado) {
        printf("ERROR, [%d] '%s'\n", $this->cnx->errno, $this->cnx->error);
      } else {
        /* Los mensajes de error se toman de la conexión 3, por lo que no hay errores */
        printf("SUCCESS, [%d] '%s'\n", $this->cnx->errno, $this->cnx->error);
        $fila = $resultado->fetch_assoc();
        $resultado->close();
        printf("version = %s\n", $fila['_version']);
      }
      die(sprintf("[%d] %s\n", mysqli_connect_errno(), mysqli_connect_error()));
    }
  }
}
?>
