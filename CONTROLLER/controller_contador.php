<?php
    $opc_Contador=$_REQUEST["opc_Contador"];
    if($opc_Contador == "1" || $opc_Contador==1){/*nuevo Contador*/
        $Tipo_Doc=$_REQUEST["Tipo_Doc"];
        $serie=$_REQUEST["serie"];
        $contador=$_REQUEST["contador"];
        $descripcion=$_REQUEST["descripcion"];
        $Tipo_Emi=$_REQUEST["Tipo_Emi"];
        $pv=$_REQUEST["pv"];
        $Almacen=$_REQUEST["Almacen"];
        $Domicilio=$_REQUEST["Domicilio"];
        $predeterminado=$_REQUEST["predeterminado"];
        $TIPIMP=$_REQUEST["formato"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsContador.php");
        $objContador=new clsContador();
        $objContador->CLADOC=$Tipo_Doc;
        $objContador->SERIE=$serie;
        $objContador->DESCRI=$descripcion;
        $objContador->CONTADOR=$contador;
        $objContador->PREDETER=$predeterminado;
        $objContador->TIPEMI=$Tipo_Emi;
        $objContador->DIRGUI=$Domicilio;
        $objContador->CODALM=$Almacen;
        $objContador->PV=$pv;
        $objContador->TIPIMP=$TIPIMP;
        $objContador->USU_CREA=$_SESSION['TXCODIGOUSUARIO'];
        $objContador->FEC_CREA=date_create(date());
        if($objContador->agregarContador()){
            $_SESSION['estadoContador']=1;//creado exitosamente
            header("location:../VISTA/contadores.php");
        }else{
            $_SESSION['estadoContador']=2;//creado exitosamente
            header("location:../VISTA/contadores.php");
        }
    }
    if($opc_Contador == "2" || $opc_Contador==2){/*editar Contador*/
      $Tipo_Doc=$_REQUEST["_editar_Tipo_Doc"];
      $serie=$_REQUEST["editar_serie"];
      $contador=$_REQUEST["editar_contador"];
      $descripcion=$_REQUEST["editar_descripcion"];
      $Tipo_Emi=$_REQUEST["editar_Tipo_Emi"];
      $pv=$_REQUEST["editar_pv"];
      $Almacen=$_REQUEST["editar_Almacen"];
      $Domicilio=$_REQUEST["editar_Domicilio"];
      $predeterminado=$_REQUEST["editar_predeterminado"];
      $TIPIMP=$_REQUEST["editar_formato"];
      echo $Tipo_Doc;
      session_name("adminsoft");
      session_start();
      require_once("../MODEL/clsContador.php");
      $objContador=new clsContador();
      $objContador->CLADOC=$Tipo_Doc;
      $objContador->SERIE=$serie;
      $objContador->DESCRI=$descripcion;
      $objContador->CONTADOR=$contador;
      $objContador->PREDETER=$predeterminado;
      $objContador->TIPEMI=$Tipo_Emi;
      $objContador->DIRGUI=$Domicilio;
      $objContador->CODALM=$Almacen;
      $objContador->PV=$pv;
      $objContador->TIPIMP=$TIPIMP;
      $objContador->USU_MOD=$_SESSION['TXCODIGOUSUARIO'];
      $objContador->FEC_MOD=date_create(date());
      if($objContador->actualizarContador()){
        $_SESSION['estadoContador']=3;//creado exitosamente
        header("location:../VISTA/contadores.php");
    }else{
        $_SESSION['estadoContador']=4;//creado exitosamente
        header("location:../VISTA/contadores.php");
    }
    }
    if($opc_Contador == "3" || $opc_Contador==3){/*eliminar Contador*/
        $cladoc_eli=$_REQUEST["cladoc_eli"];
        $serie_eli=$_REQUEST["serie_eli"];
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsContador.php");
        $objContador=new clsContador();
        $objContador->CLADOC=$cladoc_eli;
        $objContador->SERIE=$serie_eli;
        echo $Contador_id; 
        if($objContador->eliminarContador()){
            header("location:../VISTA/contadores.php");
        }
    }
    if($opc_Contador == "4" || $opc_Contador==4){/*cargar tipo documento*/
        session_name("adminsoft");
        session_start();
        require_once("../MODEL/clsContador.php");
        $objContador=new clsContador();
        $filas=$objContador->cargarContador();
        if($filas->num_rows > 0){
            while($Fila = $filas->fetch_assoc()){
                $data[] = $Fila;
            }
            echo (json_encode($data));
        }
    }
?>