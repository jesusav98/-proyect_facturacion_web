

function cargartabla_notaingreso(){
	var fecha=$('#Fec_doc').val()
	var URL="tabla_eliminar_notaingreso.php?fecha="+fecha
		$.ajax({
			url: URL
		}).done(function(data) {
				$("#tabla_eliminar_notaingreso tr").remove()
				$('#tabla_eliminar_notaingreso').html(data); 
        $("#buscar_documentos").modal("show")
		});


}
function mostrarNotaIngreso(params) {
	var d=params.split('||');
	$("#NUMERO").val(d[0]);
	$("#ALMDES").val(d[2]);
	$("#CODTRAN").val(d[3]);
	$("#RAZON").val(d[4]);
	$("#CODPRO").val(d[5]);
	$("#CLADOC").val(d[6]);
	$("#SERIE").val(d[7]);
	$("#FACTURA").val(d[8]);
	$("#buscar_documentos").modal("hide")
} 
function eliminar() {
	var NUMERO=$("#NUMERO").val()
	var dirDEt='../CONTROLLER/controller_notaingreso.php?opc_Noting=2&NOTING='+NUMERO
	console.log(dirDEt)
	$.ajax(
			{
					url: dirDEt,
					success: function( data ) {
							if(data){
									alert("Documento "+NUMERO +" anulado correctamente")
									location.reload(true)
							}else{
									alert("Error al anular documento")
							}

					}
			}
	)
}