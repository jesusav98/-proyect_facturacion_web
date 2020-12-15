<?php
    $opc_proveedor=$_REQUEST["opc_proveedor"];
    if($opc_proveedor == "1" || $opc_proveedor==1){/*nuevo usuario*/
      $Tipo_Doc=$_REQUEST["Tipo_Doc"];
      $ruc=$_REQUEST["ruc"];
      $estado=$_REQUEST["estado"];
      $Raz_Social=$_REQUEST["Raz_Social"];
      $Direccion=$_REQUEST["Direccion"];
      $NomCom=$_REQUEST["NomCom"];
      $Direccion2=$_REQUEST["Direccion2"];
      $telefono1=$_REQUEST["telefono1"];
      $telefono2=$_REQUEST["telefono2"];
      $celular=$_REQUEST["celular"];
      $Repres=$_REQUEST["Repres"];
      $Contacto=$_REQUEST["Contacto"];
      $intnet=$_REQUEST["intnet"];
      $Pagweb=$_REQUEST["Pagweb"];
      session_name("adminsoft");
      session_start();
      require_once("../MODEL/clsProveedor.php");
      $objProveedor=new clsProveedor();
      $objProveedor->TIPDOCIDE=$Tipo_Doc;
      $objProveedor->RUC=$ruc;
      $objProveedor->ESTADO=$estado;
      $objProveedor->RAZSOC=$Raz_Social;
      $objProveedor->DIRECC=$Direccion;
      $objProveedor->NOMCOM=$NomCom;
      $objProveedor->DIRECC1=$Direccion2;
      $objProveedor->TEL1=$telefono1;
      $objProveedor->TEL2=$telefono2;
      $objProveedor->CEL=$celular;
      $objProveedor->REPRES=$Repres;
      $objProveedor->CONTACTO=$Contacto;
      $objProveedor->INTNET=$intnet;
      $objProveedor->PAGWEB=$Pagweb;
      $objProveedor->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
      $objProveedor->FEC_CREA=date_create(date());
      if($objProveedor->agregarProveedor()){
        $_SESSION['estadoProveedor']=1;//creado exitosamente
        header("location:../VISTA/proveedores.php");
      }else{
        $_SESSION['estadoProveedor']=2;//creado exitosamente
        header("location:../VISTA/proveedores.php");
      }
    }
    if($opc_proveedor == "2" || $opc_proveedor==2){/*nuevo proveedor*/
      $Tipo_Doc=$_REQUEST["editar_Tipo_Doc"];
      $ruc=$_REQUEST["editar_ruc"];
      $estado=$_REQUEST["editar_estado"];
      $Raz_Social=$_REQUEST["editar_Raz_Social"];
      $Direccion=$_REQUEST["editar_Direccion"];
      $NomCom=$_REQUEST["editar_NomCom"];
      $Direccion2=$_REQUEST["editar_Direccion2"];
      $telefono1=$_REQUEST["editar_telefono1"];
      $telefono2=$_REQUEST["editar_telefono2"];
      $celular=$_REQUEST["editar_celular"];
      $Repres=$_REQUEST["editar_Repres"];
      $Contacto=$_REQUEST["editar_Contacto"];
      $intnet=$_REQUEST["editar_intnet"];
      $Pagweb=$_REQUEST["editar_Pagweb"];
      echo $ruc;
      session_name("adminsoft");
      session_start();
      require_once("../MODEL/clsProveedor.php");
      $objProveedor=new clsProveedor();
      $objProveedor->TIPDOCIDE=$Tipo_Doc;
      $objProveedor->RUC=$ruc;
      $objProveedor->ESTADO=$estado;
      $objProveedor->RAZSOC=$Raz_Social;
      $objProveedor->DIRECC=$Direccion;
      $objProveedor->NOMCOM=$NomCom;
      $objProveedor->DIRECC1=$Direccion2;
      $objProveedor->TEL1=$telefono1;
      $objProveedor->TEL2=$telefono2;
      $objProveedor->CEL=$celular;
      $objProveedor->REPRES=$Repres;
      $objProveedor->CONTACTO=$Contacto;
      $objProveedor->INTNET=$intnet;
      $objProveedor->PAGWEB=$Pagweb;
      $objProveedor->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
      $objProveedor->FEC_MOD=date_create(date());
      if($objProveedor->agregarProveedor()){
        $_SESSION['estadoProveedor']=3;//creado exitosamente
        header("location:../VISTA/proveedores.php");
      }else{
        $_SESSION['estadoProveedor']=4;//creado exitosamente
        header("location:../VISTA/proveedores.php");
      }
    }
    if($opc_proveedor == "3" || $opc_proveedor==3){/*eliminar usuario*/
        $ruc=$_REQUEST["proveedor_eli"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsProveedor.php");
        echo $Usuario_eli;
        $objProveedor=new clsProveedor();
        $objProveedor->RUC=$ruc;
        if($objProveedor->eliminarProveedor()){
            header("location:../VISTA/proveedores.php");
        }
    }
?>