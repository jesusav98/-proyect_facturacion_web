function llenardatos_usuario(datos){
    d=datos.split('||');
    $("#editar_DNI").val(d[0]);
    $("#editar_Nombres").val(d[1]);
    $("#editar_Ape_Paterno").val(d[2]);
    $("#editar_Ape_Materno").val(d[3]);
    $("#editar_Fec_Nac").val(d[4]);
    $("#editar_Correo").val(d[5]);
    $("#editar_Usuario").val(d[6]);
    $("#editar_Perfil").val(d[7]);
    $("#editar_Fec_Cad").val(d[8]);
    $("#editar_Estado").val(d[9]);
}
 
function llenardatos_usu_eli(Usuario_eli,Usuario_sesion){
    if(Usuario_eli==Usuario_sesion){
        alert("Usuario no se puede Eliminar")
        $('#btn_eliminar_usuario').attr("disabled", true);
    }else{
        $("#Usuario_eli").val(Usuario_eli);
        $("#Usuario_eli_").html(Usuario_eli);
        $('#btn_eliminar_usuario').attr("disabled", false);
    }
    
}

function llenardatos_cliente(datos){
    d=datos.split('||');
    $("#editar_Ruc").val(d[0]);
    $("#editar_raz_social").val(d[1]);
    $("#editar_Ape_Paterno").val(d[2]);
    $("#editar_Ape_Materno").val(d[3]);
    $("#editar_T_contribuyente").val(d[4]);
    $("#editar_Nom_comercial").val(d[5]);
    $("#editar_direccion").val(d[6]);

    $("#editar_Departamentos").val(d[7]);
    mostrar_editar_Provincias(d[7],d[8],d[9]);

    /*$("#editar_Provincias").val(d[8]);
    mostrar_editar_Distritos(d[7],d[8]);
    $("#editar_Distritos").val(d[9]);*/


    $("#editar_Fec_Aper").val(d[10]);
    $("#editar_Correo").val(d[11]);
    $("#editar_Telf").val(d[12]);
    $("#editar_Cel").val(d[13]);
    $("#editar_tipdocide").val(d[14]);
}

function llenardatos_cliente_eli(cliente_eli){
    $("#cliente_eli").val(cliente_eli);
    $("#cliente_eli_").html(cliente_eli);
    $('#btn_eliminar_cliente').attr("disabled", false);
}

function llenardatos_productos(datos){
    d=datos.split('||');
    $("#producto_id").val(d[0]);
    $("#editar_Desc_prod").val(d[1]);
    $("#editar_Precio").val(d[2]);
    $("#editar_Fec_Aper").val(d[3]);
    $("#editar_status").val(d[4]);
    $("#editar_und_med").val(d[5]);
    if(d[6]==1){
        $("#editar_servicio").prop("checked", true);
    }else{
        $("#editar_servicio").prop("checked", false);
    }
    if(d[7]==1){
        $("#editar_inafecto").prop("checked", true);
    }else{
        $("#editar_inafecto").prop("checked", false);
    }
    if(d[8]==1){
        $("#editar_exonerado").prop("checked", true);
    }else{
        $("#editar_exonerado").prop("checked", false);
    }
    $("#editar_puc").val(d[9]);
    $("#codigo").val(d[10]);
    $("#stolin").val(d[11]);

}

function llenardatos_productos_eli(producto_eli){
    $("#producto_id_eli").val(producto_eli);
}

function cargar_locales(datos,datos1){
    var  d=new String(datos);
    var  d1=new String(datos1);
    $.ajax({
        url: "clientes-locales.php?datos="+d+"&datos1="+d1
    }).done(function(data) {
            document.getElementById('clientes_locales').innerHTML=''
            $('#clientes_locales').html(data); 
            $("#ver_locales").modal("show")
    });
}

function llenardatos_anexoscliente(datos){
    d=datos.split('||');
    $("#_editar_NOMLOC").val(d[0]);
    $("#_editar_Contacto").val(d[1]);

    $("#_editar_Departamentos").val(d[2]);
    mostrar_editar_Provincias(d[2],d[3],d[4]);

    /*$("#_editar_Provincias").val(d[3]);
    mostrar_editar_Distritos(d[2],d[3]);
    $("#_editar_Distritos").val(d[4]);*/
    
    $("#_editar_Direccion").val(d[5]);
    $("#_editar_Telf").val(d[6]);
    $("#_editar_cel").val(d[7]);
    $("#_editar_Correo").val(d[8]);
    $("#_editar_Web").val(d[9]);
    $("#_editar_num").val(d[10]);
}

function llenardatos_anexocliente_eli(cliente_eli){
    $("#_anexocliente_eli").val(cliente_eli);
}

function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
} 

function cargar_almacenes(IDPROD,CODLIN,CODSLI,CODITE,DESITE){
    $('#ver_almacen').empty()
    $.ajax({
        url: "producto-almacen.php?IDPROD="+IDPROD+"&CODLIN="+CODLIN+"&CODSLI="+CODSLI+"&CODITE="+CODITE+"&DESITE="+DESITE
    }).done(function(data) {
            $('#producto_almacen').html(data); 
            $('#ver_almacen').modal('show')
            
    });
}

function llenardatos_almacenes(datos){
    d=datos.split('||');
    $("#_editar_almacen").val(d[0]);
    $("#__editar_almacen").val(d[0]);
    $("#_editar_codigo").val(d[1]);
    $("#_editar_fecAper").val(d[2]);
    $("#_editar_status").val(d[3]);
}

function llenardatos_proveedor(datos){
    d=datos.split('||');
    $("#editar_Tipo_Doc").val(d[0]);
    $("#editar_ruc").val(d[1]);
    $("#editar_estado").val(d[2]);
    $("#editar_Raz_Social").val(d[3]);
    $("#editar_Direccion").val(d[4]);
    $("#editar_NomCom").val(d[5]);
    $("#editar_Direccion2").val(d[6]);
    $("#editar_telefono1").val(d[7]);
    $("#editar_telefono2").val(d[8]);
    $("#editar_celular").val(d[9]);
    $("#editar_Repres").val(d[10]);
    $("#editar_Contacto").val(d[11]);
    $("#editar_intnet").val(d[12]);
    $("#editar_Pagweb").val(d[13]);
}

function llenardatos_proveedor_eli(cliente_eli){
    $("#proveedor_eli").val(cliente_eli);
}

function llenardatos_contador(datos){
    d=datos.split('||');
    $("#editar_Tipo_Doc").val(d[0]);
    $("#_editar_Tipo_Doc").val(d[0]);
    $("#editar_serie").val(d[1]);
    $("#editar_descripcion").val(d[2]);
    $("#editar_contador").val(d[3]);
    if(d[4]==1){
        $("#editar_predeterminado").prop("checked", true);
    }else{
        $("#editar_predeterminado").prop("checked", false);
    }
    $("#editar_Tipo_Emi").val(d[5]);
    $("#editar_Domicilio").val(d[6]);
    $("#editar_Almacen").val(d[7]);
    $("#editar_pv").val(d[8]); 
    $("#editar_formato").val(d[9]); 
}

function llenardatos_contador_eli(cladoc_eli,serie_eli){
    $("#cladoc_eli").val(cladoc_eli);
    $("#serie_eli").val(serie_eli);
} 


