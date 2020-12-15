function cargarkardex(datosKardex){
	/*var desde=$('#Fec_desde').val()
	var hasta=$('#Fec_hasta').val()
	var URL="tabla_consultacotizacion.php?fecha="+fecha+"&desde="+desde+"&hasta="+hasta
	if(fecha>=0){
		$.ajax({
			url: URL
		}).done(function(data) {
				$("#tabla_consultakardex tr").remove()
				$('#tabla_consultakardex').html(data); 
		});
		
	}*/
} 

function cargarkardex(idprod,codalm){
	var desde=$('#Fec_desde').val()
	var hasta=$('#Fec_hasta').val()
	var URL="tabla_consultaKardex.php?desde="+desde+"&hasta="+hasta+"&codalm="+codalm+"&idprod="+idprod
	console.log(URL)
	$.ajax({
		url: URL
	}).done(function(data) {
			$("#tabla_consultaKardex tr").remove()
			$('#tabla_consultaKardex').html(data); 
	});
} 
function imprimirkardex(idprod,codalm){
	var desde=$('#Fec_desde').val()
	var hasta=$('#Fec_hasta').val()
	window.open("../CONTROLLER/reporte_kardex.php?desde="+desde+"&hasta="+hasta+"&codalm="+codalm+"&idprod="+idprod, "Reporte Kardex")
											
}