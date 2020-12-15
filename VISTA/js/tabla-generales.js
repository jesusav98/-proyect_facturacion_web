$(document).ready(function() {    
    $('#tablas-generales').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});

function llenardatos_tablas(datos){
    d=datos.split('||');
    $("#editar_SubTabla").val(d[1]);
    $("#editar_Descrip_larga").val(d[2]);
    $("#editar_Descrip_corta").val(d[3]);
}

function llenardatos_tablas_eli(datos_eli){
    $("#tabla_eli").val(datos_eli);
}

function llenardatos_subtablas(datos,datos1){
    var  d=new String(datos);
    var  d1=new String(datos1);
    $.ajax({
        url: "sub_tabla.php?datos="+d+"&datos1="+d1
    }).done(function(data) {
        document.getElementById('sub_tabla').innerHTML=''
        $('#sub_tabla').html(data); 
        $("#ver_subtabla").modal("show")
    });
}

function llenardatos_subtablas_campos(datos){
    d=datos.split('||');
    $("#_editar_SubTabla").val(d[1]);
    $("#_editar_Descrip_larga").val(d[2]);
    $("#_editar_Descrip_corta").val(d[3]);
    $("#_editar_Orden").val(d[4]);
}

function llenardatos_subtablas_eli(datos_eli){
    $("#_tabla_eli").val(datos_eli);
}
