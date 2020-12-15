//Código para Datables

//$('#example').DataTable(); //Para inicializar datatables de la manera más simple

$(document).ready(function() {    
    $('#facturaciones').DataTable({
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

function cargar_detalle_factura(numdoc,){
	var RUTA="detalle_factura.php?numdoc="+numdoc
    $.ajax({
        url: RUTA
    }).done(function(data) {
            $('#detalle_factura').html(data); 
    });
}

function cargar_reporte_factura(numdoc,TIPIMP){
    var CLADOC=numdoc.substr(0,2)
    var SERIE=numdoc.substr(3,4)
    var NUMDOC=numdoc.substr(8,10)
    if(TIPIMP==1){
        window.open("../CONTROLLER/reporte_factura.php?SERIE="+SERIE+"&CLADOC="+CLADOC+"&NUMDOC="+NUMDOC, "Reporte facturacion")
    }else{
        window.open("../CONTROLLER/reporte_facturaticket.php?SERIE="+SERIE+"&CLADOC="+CLADOC+"&NUMDOC="+NUMDOC, "Reporte facturacion")
    }
}