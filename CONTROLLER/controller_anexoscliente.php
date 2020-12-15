<?php
    $opc_anexocliente=$_REQUEST["opc_anexocliente"];
    if($opc_anexocliente == "1" || $opc_anexocliente==1){/*nuevo anexocliente*/
        $_CODCLI=$_REQUEST["_CODCLI"];
        $_TX_RUC=$_REQUEST["_TX_RUC"];
        $_NOMLOC=$_REQUEST["_NOMLOC"];
        $_Contacto=$_REQUEST["_Contacto"];
        $_Departamentos=$_REQUEST["_Departamentos"];
        $_Provincias=$_REQUEST["_Provincias"];
        $_Distritos=$_REQUEST["_Distritos"];
        $_Direccion=$_REQUEST["_Direccion"];
        $_Telf=$_REQUEST["_Telf"];
        $_cel=$_REQUEST["_cel"];
        $_Correo=$_REQUEST["_Correo"];
        $_Web=$_REQUEST["_Web"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAnexosCliente.php");
        $objAnexoClientes=new clsAnexosCliente();
        $objAnexoClientes->CODCLI=$_CODCLI;
        $objAnexoClientes->TX_RUC=$_TX_RUC;
        $objAnexoClientes->NOMLOC=$_NOMLOC;
        $objAnexoClientes->CONTACTO=$_Contacto;
        $objAnexoClientes->CODDPTO=$_Departamentos;
        $objAnexoClientes->CODPROV=$_Provincias;
        $objAnexoClientes->CODCIU=$_Distritos;
        $objAnexoClientes->DIRENT=$_Direccion;
        $objAnexoClientes->TELEFO=$_Telf;
        $objAnexoClientes->CELULAR=$_cel;
        $objAnexoClientes->CORREO=$_Correo;
        $objAnexoClientes->PAGWEB=$_Web;
        $objAnexoClientes->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objAnexoClientes->FEC_CREA=date_create(date());
        if($objAnexoClientes->agregarAnexoClientes()){
            $_SESSION['estadoAnexoCliente']=1;//creado exitosamente
            header("location:../VISTA/clientes.php");
        }else{
            $_SESSION['estadoAnexoCliente']=2;//error al crear 
            header("location:../VISTA/clientes.php");
        }
    }
    if($opc_anexocliente == "2" || $opc_anexocliente==2){/*editar anexocliente*/
        $_editar_num=$_REQUEST["_editar_num"];
        $_CODCLI=$_REQUEST["_CODCLI"];
        $_TX_RUC=$_REQUEST["_TX_RUC"];
        $_NOMLOC=$_REQUEST["_editar_NOMLOC"];
        $_Contacto=$_REQUEST["_editar_Contacto"];
        $_Departamentos=$_REQUEST["_editar_Departamentos"];
        $_Provincias=$_REQUEST["_editar_Provincias"];
        $_Distritos=$_REQUEST["_editar_Distritos"];
        $_Direccion=$_REQUEST["_editar_Direccion"];
        $_Telf=$_REQUEST["_editar_Telf"];
        $_cel=$_REQUEST["_editar_cel"];
        $_Correo=$_REQUEST["_editar_Correo"];
        $_Web=$_REQUEST["_editar_Web"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAnexosCliente.php");
        $objAnexoClientes=new clsAnexosCliente();
        $objAnexoClientes->NUM=$_editar_num;
        $objAnexoClientes->CODCLI=$_CODCLI;
        $objAnexoClientes->TX_RUC=$_TX_RUC;
        $objAnexoClientes->NOMLOC=$_NOMLOC;
        $objAnexoClientes->CONTACTO=$_Contacto;
        $objAnexoClientes->CODDPTO=$_Departamentos;
        $objAnexoClientes->CODPROV=$_Provincias;
        $objAnexoClientes->CODCIU=$_Distritos;
        $objAnexoClientes->DIRENT=$_Direccion;
        $objAnexoClientes->TELEFO=$_Telf;
        $objAnexoClientes->CELULAR=$_cel;
        $objAnexoClientes->CORREO=$_Correo;
        $objAnexoClientes->PAGWEB=$_Web;
        $objAnexoClientes->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
        $objAnexoClientes->FEC_MOD=date_create(date());
        if($objAnexoClientes->actualizarAnexoClientes()){
            $_SESSION['estadoAnexoCliente']=3;//actualizado exitosamente
            header("location:../VISTA/clientes.php");
        }else{
            $_SESSION['estadoAnexoCliente']=4;//error al actualizar
            header("location:../VISTA/clientes.php");
        }
    }
    if($opc_anexocliente == "3" || $opc_anexocliente==3){/*eliminar usuario*/
        $NUM=$_REQUEST["_anexocliente_eli"];
        $_CODCLI=$_REQUEST["_CODCLI"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAnexosCliente.php");
        $objAnexoClientes=new clsAnexosCliente();
        $objAnexoClientes->NUM=$NUM;
        $objAnexoClientes->CODCLI=$_CODCLI;
        if($objAnexoClientes->eliminarAnexoClientes()){
            header("location:../VISTA/clientes.php");
        }
    }
    if($opc_anexocliente == "4" || $opc_anexocliente==4){/*cargar direccion cliente*/
        $ruc=$_REQUEST["ruc"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAnexosCliente.php");
        $objAnexoClientes=new clsAnexosCliente();
        $objAnexoClientes->TX_RUC=$ruc;
        $filas=$objAnexoClientes->cargarDireccionClientes();
        if($filas->num_rows > 0){
            while($Fila = $filas->fetch_assoc()){
                $data[] = $Fila;
            }
            echo (json_encode($data));
        }
    }
?>