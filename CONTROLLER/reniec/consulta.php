<?php
  require 'simple_html_dom.php';
  error_reporting(E_ALL ^ E_NOTICE);
  $dni = $_REQUEST['dni'];
  $consulta = file_get_html('https://dni.optimizeperu.com/api/persons/'.$dni);
  echo $consulta;
?>