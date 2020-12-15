$(document).ready(function() {
	mostrar_TipoDoc()
});

function mostrar_TipoDoc() {
	var resultado = '';
	$.get('../CONTROLLER/controller_contador.php?opc_Contador=4', function (data) {
		$(data).each(function(row) {
			var CLADOC = data[row].CLADOC;
            var DESCRI = data[row].DESCRI;
            var SERIE = data[row].SERIE;
			resultado = '<option value="'+CLADOC+SERIE+'">'+DESCRI + ' ' + SERIE+'</option>';
			$('#tipdoc').append(resultado);
			
		});
	}, 'json');
	return resultado;
}

function cargar_detalle_anulacion_doc(){
    var CLADOC=$('#tipdoc').val()
    var SERIE=(CLADOC.substring(2))
    CLADOC=(CLADOC.substring(0,2))
    var URL="detalle_anulacion_doc.php?CLADOC="+CLADOC+"&SERIE="+SERIE
	console.log(URL)
	$.ajax({
		url: URL
	}).done(function(data) {
			$("#detalle_anulacion_doc tr").remove()
			$('#detalle_anulacion_doc').html(data); 
	});
}

function cargarDocumento(DOCUMENTO,FECDOC,RAZSOC,IMPTOT){
    var CLADOC=DOCUMENTO.substring(0,2)
    var SERIE=DOCUMENTO.substring(3,7)
    var NUMDOC=DOCUMENTO.substring(8,18)
    $('#numdoc').val(NUMDOC)
    $('#fecdoc').val(FECDOC)
    $('#Raz_social').val(RAZSOC)
    $('#imp_total').val(IMPTOT)
    $('#buscar-documentos').modal("hide")
}

function anularDocumetno(){
    var CLADOC=$('#tipdoc').val()
    var SERIE=(CLADOC.substring(2))
    CLADOC=(CLADOC.substring(0,2))
    var NUMDOC= $('#numdoc').val()
    var dirDEt='../CONTROLLER/controller_facturacion.php?opc_Facturacion=2&SERIE='+SERIE+'&CLADOC='+CLADOC+'&NUMDOC='+NUMDOC
    console.log(dirDEt)
    $.ajax(
        {
            url: dirDEt,
            success: function( data ) {
                if(data){
                    alert("Documento "+NUMDOC +" anulado correctamente")
                    location.reload(true)
                }else{
                    alert("Error al anular documento")
                }

            }
        }
    )
}