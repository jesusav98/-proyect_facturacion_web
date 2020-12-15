<?php
    $opc_almacenproducto=$_REQUEST["opc_almacenproducto"];
    if($opc_almacenproducto == "1" || $opc_almacenproducto==1){/*nuevo almacen producto*/
        $IDPROD=$_REQUEST["IDPROD"];
        $CODIGO=$_REQUEST["_codigo"];
        $CODALM=$_REQUEST["_almacen"];
        $FECHA_APE=$_REQUEST["_fecAper"];
        $STATUS=$_REQUEST["_status"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAlmacenProducto.php");
        echo $STATUS;
        $objAlmacenProductos=new clsAlmacenProducto();
        $objAlmacenProductos->IDPROD=$IDPROD; 
        $objAlmacenProductos->CODALM=$CODALM;
        $objAlmacenProductos->CODIGO=$CODIGO;
        $objAlmacenProductos->STATUS=$status;
        $objAlmacenProductos->FECHA_APE=$FECHA_APE;
        $objAlmacenProductos->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objAlmacenProductos->FEC_CREA=date_create(date());
        if($objAlmacenProductos->agregarAlamcenProductos()){
            $_SESSION['estadoalmacen']=1;//creado exitosamente
            header("location:../VISTA/productos.php");
        }else{
            $_SESSION['estadoalmacen']=2;//error
            header("location:../VISTA/productos.php");
        }
    }
    if($opc_almacenproducto == "2" || $opc_almacenproducto==2){/*editar alamcen producto*/
        $IDPROD=$_REQUEST["_editar_IDPROD"];
        $CODIGO=$_REQUEST["_editar_codigo"];
        $CODALM=$_REQUEST["__editar_almacen"];
        $FECHA_APE=$_REQUEST["_editar_fecAper"];
        $STATUS=$_REQUEST["_editar_status"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAlmacenProducto.php");
        $objAlmacenProductos=new clsAlmacenProducto();
        $objAlmacenProductos->IDPROD=$IDPROD;
        $objAlmacenProductos->CODALM=$CODALM;
        $objAlmacenProductos->CODIGO=$CODIGO;
        $objAlmacenProductos->STATUS=$STATUS;
        $objAlmacenProductos->FECHA_APE=$FECHA_APE;
        $objAlmacenProductos->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
        $objAlmacenProductos->FEC_MOD=date_create(date());
        if($objAlmacenProductos->actualizarAlamcenProductos()){
            $_SESSION['estadoalmacen']=3;//creado exitosamente
            header("location:../VISTA/productos.php");
        }else{
            $_SESSION['estadoalmacen']=4;//error
            header("location:../VISTA/productos.php");
        }
    }
    if($opc_almacenproducto == "3" || $opc_almacenproducto==3){/*eliminar almacen producto*/
        $producto_id=$_REQUEST["producto_id_eli"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsAlmacenProducto.php");
        $objAlmacenProductos=new clsAlmacenProducto();
        $objAlmacenProductos->IDPROD=$producto_id;
        echo $producto_id;
        /*if($objAlmacenProductos->eliminarProductos()){
            header("location:../VISTA/productos.php");
        }*/
    }
?>