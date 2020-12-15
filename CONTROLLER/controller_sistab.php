<?php
    $opc_sistab=$_REQUEST["opc_sistab"];
    if($opc_sistab == "1" || $opc_sistab==1){/*nuevo tabla*/
        $Tabla=$_REQUEST["Tabla"];
        $SubTabla=$_REQUEST["SubTabla"];
        $Descrip_corta=$_REQUEST["Descrip_corta"];
        $Descrip_larga=$_REQUEST["Descrip_larga"];
        $Orden=$_REQUEST["Orden"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsSisTab.php");
        $objSisTab=new clsSisTab();
        $objSisTab->SIS_NUMTAB=$Tabla;
        $objSisTab->SIS_NUMELE=$SubTabla;
        $objSisTab->SIS_DESLAR=$Descrip_larga;
        $objSisTab->SIS_DESCOR=$Descrip_corta;
        $objSisTab->SIS_DESNUM=$Orden;
        $objSisTab->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objSisTab->FEC_CREA=date_create(date());
        if($objSisTab->agregarSisTab()){
            $_SESSION['error_sistab']=1;
            header("location:../VISTA/tablas-generales.php");
        }else{
            $_SESSION['error_sistab']=2;
            header("location:../VISTA/tablas-generales.php");
        }
    }
    if($opc_sistab == "2" || $opc_sistab==2){/*editar tabla*/
        $Tabla=$_REQUEST["Tabla"];
        $SubTabla=$_REQUEST["editar_SubTabla"];
        $Descrip_corta=$_REQUEST["editar_Descrip_corta"];
        $Descrip_larga=$_REQUEST["editar_Descrip_larga"];
        $Orden=$_REQUEST["Orden"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsSisTab.php");
        $objSisTab=new clsSisTab();
        $objSisTab->SIS_NUMTAB=$Tabla;
        $objSisTab->SIS_NUMELE=$SubTabla;
        $objSisTab->SIS_DESLAR=$Descrip_larga;
        $objSisTab->SIS_DESCOR=$Descrip_corta;
        $objSisTab->SIS_DESNUM=$Orden;
        $objSisTab->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
        $objSisTab->FEC_MOD=date_create(date());
        if($objSisTab->actualizarSisTab()){
            $_SESSION['error_sistab']=3;
            header("location:../VISTA/tablas-generales.php");
        }else{
            $_SESSION['error_sistab']=4;
            header("location:../VISTA/tablas-generales.php");
        }
    }
    if($opc_sistab == "3" || $opc_sistab==3){/*eliminar tabla*/
        $Tabla=$_REQUEST["Tabla"];
        $SubTabla=$_REQUEST["tabla_eli"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsSisTab.php");
        $objSisTab=new clsSisTab();
        $objSisTab->SIS_NUMTAB=$Tabla;
        $objSisTab->SIS_NUMELE=$SubTabla;
        if($objSisTab->eliminarSisTab()){
            header("location:../VISTA/tablas-generales.php");
        }
    }
    /* Sub tablas*/ 
    if($opc_sistab == "4" || $opc_sistab==4){/*nuevo subtabla*/
        $Tabla=$_REQUEST["_Tabla"];
        $SubTabla=$_REQUEST["_SubTabla"];
        $Descrip_corta=$_REQUEST["_Descrip_corta"];
        $Descrip_larga=$_REQUEST["_Descrip_larga"];
        $Orden=$_REQUEST["_Orden"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsSisTab.php");
        $objSisTab=new clsSisTab();
        $objSisTab->SIS_NUMTAB=$Tabla;
        $objSisTab->SIS_NUMELE=$SubTabla;
        $objSisTab->SIS_DESLAR=$Descrip_larga;
        $objSisTab->SIS_DESCOR=$Descrip_corta;
        $objSisTab->SIS_DESNUM=$Orden;
        $objSisTab->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objSisTab->FEC_CREA=date_create(date());
        if($objSisTab->agregarSisTab()){
            $_SESSION['error_sistab']=1;
            header("location:../VISTA/tablas-generales.php");
        }else{
            $_SESSION['error_sistab']=2;
            header("location:../VISTA/tablas-generales.php");
        }
    }
    if($opc_sistab == "5" || $opc_sistab==5){/*editar SUBtabla*/
        $Tabla=$_REQUEST["_editar_Tabla"];
        $SubTabla=$_REQUEST["_editar_SubTabla"];
        $Descrip_corta=$_REQUEST["_editar_Descrip_corta"];
        $Descrip_larga=$_REQUEST["_editar_Descrip_larga"];
        $Orden=$_REQUEST["_editar_Orden"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsSisTab.php");
        $objSisTab=new clsSisTab();
        $objSisTab->SIS_NUMTAB=$Tabla;
        $objSisTab->SIS_NUMELE=$SubTabla;
        $objSisTab->SIS_DESLAR=$Descrip_larga;
        $objSisTab->SIS_DESCOR=$Descrip_corta;
        $objSisTab->SIS_DESNUM=$Orden;
        $objSisTab->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
        $objSisTab->FEC_MOD=date_create(date());
        if($objSisTab->actualizarSisTab()){
            $_SESSION['error_sistab']=3;
            header("location:../VISTA/tablas-generales.php");
        }else{
            $_SESSION['error_sistab']=4;
            header("location:../VISTA/tablas-generales.php");
        }
    }
    if($opc_sistab == "6" || $opc_sistab==6){/*eliminar subtabla*/
        $Tabla=$_REQUEST["_Tabla"];
        $SubTabla=$_REQUEST["_tabla_eli"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsSisTab.php");
        $objSisTab=new clsSisTab();
        $objSisTab->SIS_NUMTAB=$Tabla;
        $objSisTab->SIS_NUMELE=$SubTabla;
        if($objSisTab->eliminarSisTab()){
            header("location:../VISTA/tablas-generales.php");
        }
    }
?>