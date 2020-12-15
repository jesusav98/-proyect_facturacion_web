<?php

  $parametro=$_REQUEST['par'];
  $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
  //html PNG location prefix
  $PNG_WEB_DIR = 'temp/';
  include "QR/qrlib.php";    
  //ofcourse we need rights to create temp dir
  if (!file_exists($PNG_TEMP_DIR))
      mkdir($PNG_TEMP_DIR);
  $filename = $PNG_TEMP_DIR.'test.png';
  $matrixPointSize = 10;
  $errorCorrectionLevel = 'L';
  $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
  QRcode::png($parametro);