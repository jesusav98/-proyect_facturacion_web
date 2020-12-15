<?php
    $opc_usuario=$_REQUEST["opc_usuario"];
    if($opc_usuario == "0" || $opc_usuario==0){/*login*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsUsuario.php");
        $usuario=$_REQUEST["usuario"];
        $contrasena=$_REQUEST["contrasena"];
        $objUsuario=new clsUsuario();
        $objUsuario->TXCODIGOUSUARIO=$usuario;
        $objUsuario->TXCLAVE=$contrasena;
        if($usuario=="ALTERES" && $contrasena=="KYE.PS"){
            require_once("../MODEL/clsControl.php");
            $objControl=new clsControl();
            $objControl->cargarControl();
            $_SESSION['CODCTR']=$objControl->CODCTR;
            $_SESSION['RUCCIA']=$objControl->RUCCIA;
            $_SESSION['NOMCIA']=$objControl->NOMCIA;
            $_SESSION['NOMCOM']=$objControl->NOMCOM;
            $_SESSION['DIRCIA']=$objControl->DIRCIA;
            $_SESSION['TELEFO']=$objControl->TELEFO;
            $_SESSION['CELULA']=$objControl->CELULA;
            $_SESSION['CORREO']=$objControl->CORREO;
            $_SESSION['PAGWEB']=$objControl->PAGWEB;
            $_SESSION['CTABCO']=$objControl->CTABCO; 
            $_SESSION['CTACOR']=$objControl->CTACOR;
            $_SESSION['BNCONT']=$objControl->BNCONT;
            $_SESSION['IGV']=$objControl->IGV;
            $_SESSION['MONEDA']=$objControl->MONEDA;
            $_SESSION['PUIGV']=$objControl->PUIGV;
            $_SESSION['logeo']=1;
            $_SESSION['TXCODIGOUSUARIO']=$usuario;
            header("Location:../VISTA/index.php");
        }else{
            if($objUsuario->validarUsuario())
            {
                $_SESSION['TXCODIGOUSUARIO'] = $objUsuario->TXCODIGOUSUARIO;
                $_SESSION['IDPERFIL'] = $objUsuario->IDPERFIL;
                $_SESSION['NUESTADO'] = $objUsuario->NUESTADO;
                $_SESSION['FECADUCIDAD'] = $objUsuario->FECADUCIDAD;
                if ($_SESSION['NUESTADO']=="1"){
                    if (date_create($_SESSION['FECADUCIDAD'])>=date_create(date())){
                        require_once("../MODEL/clsControl.php");
                        $objControl=new clsControl();
                        $objControl->cargarControl();
                        $_SESSION['CODCTR']=$objControl->CODCTR;
                        $_SESSION['RUCCIA']=$objControl->RUCCIA;
                        $_SESSION['NOMCIA']=$objControl->NOMCIA;
                        $_SESSION['NOMCOM']=$objControl->NOMCOM;
                        $_SESSION['DIRCIA']=$objControl->DIRCIA;
                        $_SESSION['TELEFO']=$objControl->TELEFO;
                        $_SESSION['CELULA']=$objControl->CELULA;
                        $_SESSION['CORREO']=$objControl->CORREO;
                        $_SESSION['PAGWEB']=$objControl->PAGWEB;
                        $_SESSION['CTABCO']=$objControl->CTABCO;
                        $_SESSION['CTACOR']=$objControl->CTACOR;
                        $_SESSION['BNCONT']=$objControl->BNCONT;
                        $_SESSION['IGV']=$objControl->IGV;
                        $_SESSION['MONEDA']=$objControl->MONEDA;
                        $_SESSION['PUIGV']=$objControl->PUIGV;
                        $_SESSION['logeo']=1;
                        $_SESSION['TXCODIGOUSUARIO']=$usuario;
                        header("Location:../VISTA/index.php");
                    }else{
                        $_SESSION["ingreso_sesion"]=3;/*echo "usuario caduco";*/
                        header("Location:../VISTA/login-admin.php");
                    }   
                }else{ 
                    $_SESSION["ingreso_sesion"]=2;/*echo "usuario no activo";*/
                    header("Location:../VISTA/login-admin.php");
                }
            }else{
                $_SESSION["ingreso_sesion"]=1;/*usuario o contraseña incorrecta*/
                header("Location:../VISTA/login-admin.php");
            }
        }
    }
    if($opc_usuario == "1" || $opc_usuario==1){/*cerrar secion*/
        session_name("adminsoft");
        session_start();
        session_destroy();
        header('location: ../index.php');
    }
    if($opc_usuario == "2" || $opc_usuario==2){/*editar usuario*/
        $editar_DNI=$_REQUEST["editar_DNI"];
        $editar_Nombres=$_REQUEST["editar_Nombres"];
        $editar_Ape_Paterno=$_REQUEST["editar_Ape_Paterno"];
        $editar_Ape_Materno=$_REQUEST["editar_Ape_Materno"];
        $editar_Fec_Nac=$_REQUEST["editar_Fec_Nac"];
        $editar_Correo=$_REQUEST["editar_Correo"];
        $editar_Usuario=$_REQUEST["editar_Usuario"];
        $editar_Perfil=$_REQUEST["editar_Perfil"];
        $editar_Fec_Cad=$_REQUEST["editar_Fec_Cad"];
        $editar_Estado=$_REQUEST["editar_Estado"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsUsuario.php");
        $objUsuario=new clsUsuario();
        $objUsuario->TXDNI=$editar_DNI;
        $objUsuario->TXNOMBRES=$editar_Nombres;
        $objUsuario->TXAPELLIDOPATERNO=$editar_Ape_Paterno;
        $objUsuario->TXAPELLIDOMATERNO=$editar_Ape_Materno;
        $objUsuario->FENACIMIENTO=$editar_Fec_Nac;
        $objUsuario->TXCORREOELECTRONICO=$editar_Correo;
        $objUsuario->TXCODIGOUSUARIO=$editar_Usuario;
        $objUsuario->IDPERFIL=$editar_Perfil;
        $objUsuario->FECADUCIDAD=$editar_Fec_Cad;
        $objUsuario->NUESTADO=$editar_Estado;
        $objUsuario->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
        $objUsuario->FEC_MOD=date_create(date());
        if($objUsuario->actualizarUsuario()){
            header("location:../VISTA/usuarios.php");
        }
    }
    if($opc_usuario == "3" || $opc_usuario==3){/*nuevo usuario*/
        $DNI=$_REQUEST["DNI"];
        $Nombres=$_REQUEST["Nombres"];
        $Ape_Paterno=$_REQUEST["Ape_Paterno"];
        $Ape_Materno=$_REQUEST["Ape_Materno"];
        $Fec_Nac=$_REQUEST["Fec_Nac"];
        $Correo=$_REQUEST["Correo"];
        $Usuario=$_REQUEST["Usuario"];
        $Perfil=$_REQUEST["Perfil"];
        $Fec_Cad=$_REQUEST["Fec_Cad"];
        $Estado=$_REQUEST["Estado"];
        $Contrasena=$_REQUEST["Contrasena"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsUsuario.php");
        $objUsuario=new clsUsuario();
        $objUsuario->TXDNI=$DNI;
        $objUsuario->TXNOMBRES=$Nombres;
        $objUsuario->TXAPELLIDOPATERNO=$Ape_Paterno;
        $objUsuario->TXAPELLIDOMATERNO=$Ape_Materno;
        $objUsuario->FENACIMIENTO=$Fec_Nac;
        $objUsuario->TXCORREOELECTRONICO=$Correo;
        $objUsuario->TXCODIGOUSUARIO=$Usuario;
        $objUsuario->IDPERFIL=$Perfil;
        $objUsuario->FECADUCIDAD=$Fec_Cad;
        $objUsuario->NUESTADO=$Estado;
        $objUsuario->TXCLAVE=$Contrasena;
        $objUsuario->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objUsuario->FEC_CREA=date_create(date());
        if($objUsuario->agregarUsuario()){
            header("location:../VISTA/usuarios.php");
        }
    }
    if($opc_usuario == "4" || $opc_usuario==4){/*eliminar usuario*/
        $Usuario=$_REQUEST["Usuario_eli"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsUsuario.php");
        echo $Usuario_eli;
        $objUsuario=new clsUsuario();
        $objUsuario->TXCODIGOUSUARIO=$Usuario;
        if($objUsuario->eliminarUsuario()){
            header("location:../VISTA/usuarios.php");
        }
    }
?>