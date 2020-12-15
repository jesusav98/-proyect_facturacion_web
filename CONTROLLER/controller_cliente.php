<?php
    $opc_cliente=$_REQUEST["opc_cliente"];
    if($opc_cliente == "1" || $opc_cliente==1){/*nuevo cliente*/
        $Ruc=$_REQUEST["ruc"];
        $raz_social=$_REQUEST["raz_social"];
        $Ape_Paterno=$_REQUEST["Ape_Paterno"];
        $Ape_Materno=$_REQUEST["Ape_Materno"];
        $T_contribuyente=$_REQUEST["T_contribuyente"];
        $tipdocide=$_REQUEST["tipdocide"];
        $Nom_comercial=$_REQUEST["Nom_comercial"];
        $direccion=$_REQUEST["direccion"];
        $Departamentos=$_REQUEST["Departamentos"];
        $Provincias=$_REQUEST["Provincias"];
        $Distritos=$_REQUEST["Distritos"];
        $Fec_Aper=$_REQUEST["Fec_Aper"];
        $Correo=$_REQUEST["Correo"];
        $Telf=$_REQUEST["Telf"];
        $Cel=$_REQUEST["Cel"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsClientes.php");
        $objcliente=new clsClientes();
        $objcliente->TX_RUC=$Ruc;
        $objcliente->RAZSOC=$raz_social;
        $objcliente->APEPAT=$Ape_Paterno;
        $objcliente->APEMAT=$Ape_Materno;
        $objcliente->NOMBRES=$raz_social." ".$Ape_Paterno." ".$Ape_Materno;
        $objcliente->NOMCOM=$Nom_comercial;
        $objcliente->DIRECC=$direccion;
        $objcliente->CODCIU=$Distritos;
        $objcliente->CODPROV=$Provincias;
        $objcliente->CODDPTO=$Departamentos;
        $objcliente->TIPPER=$T_contribuyente;
        $objcliente->TIPDOCIDE=$tipdocide;
        $objcliente->FECAPE=$Fec_Aper;
        $objcliente->INTNET=$Correo;
        $objcliente->TELEFO=$Telf;
        $objcliente->CELULAR=$Cel;
        $objcliente->USU_CREA=$_SESSION['TXCODIGOcliente'];
        $objcliente->FEC_CREA=date_create(date());
        if($objcliente->agregarClientes()){
            $_SESSION['error_cliente']=1;//creado exitosamente
            header("location:../VISTA/clientes.php");
        }else{
            $_SESSION['error_cliente']=2;//error al crear
            header("location:../VISTA/clientes.php");
        }
    }
    if($opc_cliente == "2" || $opc_cliente==2){/*editar cliente*/
        $Ruc=$_REQUEST["editar_Ruc"];
        $raz_social=$_REQUEST["editar_raz_social"];
        $Ape_Paterno=$_REQUEST["editar_Ape_Paterno"];
        $Ape_Materno=$_REQUEST["editar_Ape_Materno"];
        $T_contribuyente=$_REQUEST["editar_T_contribuyente"];
        $tipdocide=$_REQUEST["editar_tipdocide"];
        $Nom_comercial=$_REQUEST["editar_Nom_comercial"];
        $direccion=$_REQUEST["editar_direccion"];
        $Departamentos=$_REQUEST["editar_Departamentos"];
        $Provincias=$_REQUEST["editar_Provincias"];
        $Distritos=$_REQUEST["editar_Distritos"];
        $Fec_Aper=$_REQUEST["editar_Fec_Aper"];
        $Correo=$_REQUEST["editar_Correo"];
        $Telf=$_REQUEST["editar_Telf"];
        $Cel=$_REQUEST["editar_Cel"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsClientes.php");
        $objcliente=new clsClientes();
        $objcliente->TX_RUC=$Ruc;
        $objcliente->RAZSOC=$raz_social;
        $objcliente->APEPAT=$Ape_Paterno;
        $objcliente->APEMAT=$Ape_Materno;
        $objcliente->NOMBRES=$raz_social." ".$Ape_Paterno." ".$Ape_Materno;
        $objcliente->NOMCOM=$Nom_comercial;
        $objcliente->DIRECC=$direccion;
        $objcliente->CODCIU=$Distritos;
        $objcliente->CODPROV=$Provincias;
        $objcliente->CODDPTO=$Departamentos;
        $objcliente->TIPPER=$T_contribuyente;
        $objcliente->TIPDOCIDE=$tipdocide;
        $objcliente->FECAPE=$Fec_Aper;
        $objcliente->INTNET=$Correo;
        $objcliente->TELEFO=$Telf;
        $objcliente->CELULAR=$Cel;
        $objcliente->USU_MOD=$_SESSION['TXCODIGOcliente'];
        $objcliente->FEC_MOD=date_create(date());
        if($objcliente->actualizarClientes()){
            $_SESSION['error_cliente']=3;//actualizado exitosamente
            header("location:../VISTA/clientes.php");
        }else{
            $_SESSION['error_cliente']=4;//error al actualizar 
            header("location:../VISTA/clientes.php");
        }
    }
    if($opc_cliente == "3" || $opc_cliente==3){/*eliminar cliente*/
        $Cliente=$_REQUEST["cliente_eli"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsClientes.php");
        echo $cliente_eli;
        $objcliente=new clsClientes();
        $objcliente->TX_RUC=$Cliente;
        if($objcliente->eliminarCliente()){
            header("location:../VISTA/clientes.php");
        }
    }
    
?>
