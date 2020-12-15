<?php
    $opc_producto=$_REQUEST["opc_producto"];
    if($opc_producto == "1" || $opc_producto==1){/*nuevo producto*/
        $codlin=$_REQUEST["codlin"];
        $codsli=$_REQUEST["codsli"];
        $codite=$_REQUEST["codite"];
        $Desc_prod=$_REQUEST["Desc_prod"];
        $Fec_Aper=$_REQUEST["Fec_Aper"];
        $und_med=$_REQUEST["und_med"];
        $status=$_REQUEST["status"];
        $Precio=$_REQUEST["Precio"];
        $puc=$_REQUEST["puc"];
        $servicio=$_REQUEST["servicio"];
        $exonerado=$_REQUEST["exonerado"];
        $inafecto=$_REQUEST["inafecto"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsProductos.php");
        $objProductos=new clsProductos();
        $objProductos->CODLIN=$codlin;
        $objProductos->CODSLI=$codsli;
        $objProductos->CODITE=$codite;
        $objProductos->CODIGO=$codlin.$codsli.$codite;
        $objProductos->DESITE=$Desc_prod;
        $objProductos->FECAPE=$Fec_Aper;
        $objProductos->UNIMED=$und_med;
        $objProductos->STATUS=$status;
        $objProductos->PRECLI01=$Precio;
        $objProductos->PUC=$puc;
        $objProductos->SERVIC=$servicio;
        $objProductos->EXONER=$exonerado;
        $objProductos->INAFEC=$inafecto;
        $objProductos->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objProductos->FEC_CREA=date_create(date());
        if($objProductos->agregarProductos()){
            $_SESSION['estadoproducto']=1;//creado exitosamente
            header("location:../VISTA/productos.php");
        }else{
            $_SESSION['estadoproducto']=2;//eror
            header("location:../VISTA/productos.php");
        }
    }

    if($opc_producto == "2" || $opc_producto==2){/*editar producto*/
        $producto_id=$_REQUEST["producto_id"];
        $Desc_prod=$_REQUEST["editar_Desc_prod"];
        $Fec_Aper=$_REQUEST["editar_Fec_Aper"];
        $und_med=$_REQUEST["editar_und_med"];
        $status=$_REQUEST["editar_status"];
        $Precio=$_REQUEST["editar_Precio"];
        $puc=$_REQUEST["editar_puc"];
        $servicio=$_REQUEST["editar_servicio"];
        $exonerado=$_REQUEST["editar_exonerado"];
        $inafecto=$_REQUEST["editar_inafecto"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsProductos.php");
        $objProductos=new clsProductos();
        $objProductos->IDPROD=$producto_id;
        $objProductos->DESITE=$Desc_prod;
        $objProductos->FECAPE=$Fec_Aper;
        $objProductos->UNIMED=$und_med;
        $objProductos->STATUS=$status;
        $objProductos->PRECLI01=$Precio;
        $objProductos->PUC=$puc;
        $objProductos->SERVIC=$servicio;
        $objProductos->EXONER=$exonerado;
        $objProductos->INAFEC=$inafecto;
        $objProductos->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
        $objProductos->FEC_MOD=date_create(date());
        if($objProductos->actualizarProductos()){
            $_SESSION['estadoproducto']=3;//creado exitosamente
            header("location:../VISTA/productos.php");
        }else{
            $_SESSION['estadoproducto']=4;//eror
            header("location:../VISTA/productos.php");
        }
    }

    if($opc_producto == "3" || $opc_producto==3){/*eliminar producto*/
        $producto_id=$_REQUEST["producto_id_eli"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsProductos.php");
        $objProductos=new clsProductos();
        $objProductos->IDPROD=$producto_id;
        echo $producto_id;
        if($objProductos->eliminarProductos()){
            header("location:../VISTA/productos.php");
        }
    }
?>