
$(document).ready(function() {
	mostrar_Vendedor()
	mostrar_forma_pago()
	mostrar_moneda()
});

function mostrar_Vendedor() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=06', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#Vendedor').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_forma_pago() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=07', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#forma_pago').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_moneda() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=08', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#moneda').append(resultado);
		});

	}, 'json');
	return resultado;
}

function cargar_datos_cliente_cot(cliente_cotizacion){
    d=cliente_cotizacion.split('||');
    $("#codigo").val(d[0]);
    $("#ruc").val(d[0]);
    $("#Raz_social").val(d[1]);
    $("#buscar_cliente").modal('hide')//cierra modal
    mostrar_direccion_cliente() 
}

function mostrar_direccion_cliente() {
	var resultado = '';
	var ruc=$("#ruc").val()
	$('#Lugar_entrega').empty()
	$.get('../CONTROLLER/controller_anexoscliente.php?opc_anexocliente=4&ruc='+ruc, function (data) {
		$(data).each(function(row) {
			var DIRENT = data[row].DIRENT;
			resultado = '<option value="'+DIRENT+'">'+DIRENT+'</option>';
			$('#Lugar_entrega').append(resultado);
		});
	}, 'json');
	return resultado;
}

function mostrarProducto(datos){
    d=datos.split('||');
    $("#IDPROD").val(d[0]);
    $("#CODIGO").val(d[1]);
    $("#DESITE").val(d[2]);
    $("#STOLIN").val(d[3]);
    $("#SIS_DESLAR").val(d[4]);
    $("#PRECLI01").val(d[5]);
    $("#CODALM").val(d[6]);
    $("#EXONER").val(d[7]);
    $("#INAFEC").val(d[8]);
    $("#SERVIC").val(d[9]);
    $("#CODLIN").val(d[10]);
    $("#CODSLI").val(d[11]);
    $("#CODITE").val(d[12]);
}

function calculartotal(){
	var cantidad=$("#cantidad").val()
	var PRECLI01=$("#PRECLI01").val()
	var total_item=(cantidad*PRECLI01)
	$("#total_item").val(total_item);
}

function agregarProducto(){
	var IDPROD=$("#IDPROD").val()
	var CODIGO=$("#CODIGO").val()
	var DESITE=$("#DESITE").val()
	var cantidad=$("#cantidad").val()
	var STOLIN=$("#STOLIN").val()
	var PRECLI01=$("#PRECLI01").val()
	var total_item=$("#total_item").val()
	var CODALM=$("#CODALM").val()
	var EXONER=$("#EXONER").val()
	var INAFEC=$("#INAFEC").val()
	var SERVIC=$("#SERVIC").val()
	var CODLIN=$("#CODLIN").val()
	var CODSLI=$("#CODSLI").val()
	var CODITE=$("#CODITE").val()

	var agregar=true
	if(SERVIC==0){
		if(cantidad>STOLIN){
			alert("Cantidad mayor al Stock Actual")
			agregar=false
		}
	}

	var id=""
	var alm=""
	var exist=false

	if(agregar==true){
		$('#tabla_producto tbody tr').each(function(idx,fila){
			id=$(this).find('td:eq(0)').html();
			alm=$(this).find('td:eq(6)').html();
			
			if(id==CODIGO && alm==CODALM){
				exist=true;
			}
		})
	}

	if (exist==false && agregar==true){
		var htmlTags = '<tr>'+
			'<td class="CODIGO" >' + CODIGO + '</td>'+
			'<td class="DESITE">' + DESITE + '</td>'+
			'<td class="cantidad" style="text-align:right;">' + cantidad + '</td>'+
			'<td class="STOLIN" style="display: none;">' + STOLIN + '</td>'+
			'<td class="PRECLI01" style="text-align:right;">' + PRECLI01 + '</td>'+
			'<td class="total_item" style="text-align:right;">' + total_item + '</td>'+
			'<td class="CODALM" style="display: none;">' + CODALM + '</td>'+
			'<td class="EXONER" style="display: none;">' + EXONER + '</td>'+
			'<td class="INAFEC" style="display: none;">' + INAFEC + '</td>'+
			'<td class="SERVIC" style="display: none; ">' + SERVIC + '</td>'+
			'<td class="CODLIN" >' + CODLIN + '</td>'+
			'<td class="CODSLI" >' + CODSLI + '</td>'+
			'<td class="CODITE" >' + CODITE + '</td>'+
			'<td class="IDPROD" >' + IDPROD + '</td>'+
			'<td>'+
			'	<a href="#" class="eliminarProducto" ><i class="fa fa-remove"></i></a>'+
			'	<a href="#" data-toggle="modal" data-target="#editar_producto" class="editarProducto"><i class="fa fa-pencil"></i></a></td>'+
		'</tr>';
		$('#tabla_producto tbody').append(htmlTags);
		calcularTotalCotizacion()
		$("#producto_agregado").modal('hide')
		$("#cantidad").val(0)
		$("#PRECLI01").val(0)
		$("#total_item").val(0)
	}else{
		alert("Producto ya existe")
		$("#cantidad").val(0)
		$("#total_item").val(0)
	}
}

$(document).on('click', '.eliminarProducto', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});

$(document).on('click', '.editarProducto', function (event) {
	var IDPROD = $(this).closest("tr").find(".IDPROD").text();
	var DESITE = $(this).closest("tr").find(".DESITE").text();
	var cantidad = $(this).closest("tr").find(".cantidad").text();
	var STOLIN = $(this).closest("tr").find(".STOLIN").text();
	var PRECLI01 = $(this).closest("tr").find(".PRECLI01").text();
	var total_item = $(this).closest("tr").find(".total_item").text();
	var CODALM = $(this).closest("tr").find(".CODALM").text();
	var SERVIC = $(this).closest("tr").find(".SERVIC").text();

	$('#editar_IDPROD').val(IDPROD)
	$('#editar_DESITE').val(DESITE)
	$('#editar_cantidad').val(cantidad)
	$('#editar_STOLIN').val(STOLIN)
	$('#editar_PRECLI01').val(PRECLI01)
	$('#editar_total_item').val(total_item)
	$('#editar_CODALM').val(CODALM)
	$('#editar_SERVIC').val(SERVIC)

});


function calcularTotalCotizacion(){
	var suma=0.00;
	var exonerado=0.00;
	var inafecto=0.00;
	$('#tabla_producto tbody tr').each(function(idx,fila){
		if($(this).find('td:eq(7)').html()==1){
			exonerado+=parseFloat($(this).find('td:eq(5)').html());
		}else if($(this).find('td:eq(8)').html()==1){
			inafecto+=parseFloat($(this).find('td:eq(5)').html());
		}else{
			suma+=parseFloat($(this).find('td:eq(5)').html());
		}
	})
	var igv=0.00
	var total=0.00
	suma=parseFloat(suma)
	igv=parseFloat(suma*0.18)
	total=parseFloat(igv+suma)

	$('#subTotal').val(suma+exonerado+inafecto)
	$('#basimp').val(suma)
	$('#exoneracion').val(exonerado)
	$('#inafectos').val(inafecto)
	$('#igv').val(igv)
	$('#total').val(total+exonerado+inafecto)

}

function calculareditartotal(){
	var cantidad=$("#editar_cantidad").val()
	var PRECLI01=$("#editar_PRECLI01").val()
	var total_item=(cantidad*PRECLI01)
	$("#editar_total_item").val(total_item);
}

function editarProducto(){
	var IDPROD=$("#editar_IDPROD").val()
	var DESITE=$("#editar_DESITE").val()
	var cantidad=$("#editar_cantidad").val()
	var STOLIN=$("#editar_STOLIN").val()
	var PRECLI01=$("#editar_PRECLI01").val()
	var total_item=$("#editar_total_item").val()
	var CODALM=$("#editar_CODALM").val()
	var SERVIC=$("#editar_SERVIC").val()

	var agregar=true
	if(SERVIC==0){
		if(cantidad>STOLIN){
			alert("Cantidad mayor al Stock Actual")
			agregar=false
		}
	}
	if (agregar==true){
		$('#tabla_producto tbody tr').each(function(idx,fila){
			if($(this).find('td:eq(13)').html()==IDPROD && $(this).find('td:eq(6)').html()==CODALM){
				$(this).find('td:eq(2)').html(cantidad)
				$(this).find('td:eq(4)').html(PRECLI01)
				$(this).find('td:eq(5)').html(total_item)
			}
		})
		calcularTotalCotizacion()
		$("#editar_producto").modal('hide')
		$("#editar_cantidad").val(0)
		$("#editar_PRECLI01").val(0)
		$("#editar_total_item").val(0)
	}
}

function validar_campos(){
	var ruc=$("#codigo").val()
	var total=$("#total").val()
	var mostrar=true
	if(ruc==""){
		alert("Ingrese un Cliente")
		mostrar=false
	}
	if(total==0){
		alert("Ingrese un Producto")
		mostrar=false
	}
	if(mostrar==true){
		$("#generar-cotizacion").modal('show')
	}
}

function generarCortizacion(){
	var codigo=$("#codigo").val()
	var Raz_social=$("#Raz_social").val()
	var Lugar_entrega=$("#Lugar_entrega").val()
	var ruc=$("#ruc").val()
	var actencion=$("#actencion").val()
	var entrega=$("#entrega").val()
	var solicitud=$("#solicitud").val()
	var condvent=$("#condvent").val()
	var Vendedor=$("#Vendedor").val()
	var ordencompra=$("#ordencompra").val()
	var Fec_doc=$("#Fec_doc").val()
	var forma_pago=$("#forma_pago").val()
	var moneda=$("#moneda").val()

	var subTotal=$("#subTotal").val()
	var basimp=$("#basimp").val()
	var exoneracion=$("#exoneracion").val()
	var inafectos=$("#inafectos").val()
	var igv=$("#igv").val()
	var total=$("#total").val()

	/*alert(codigo +" "+Raz_social +" "+Lugar_entrega +" "+ruc +" "+actencion +" "+entrega +" "+solicitud +" "+condvent +" "+Vendedor 
	+" "+ordencompra  +" "+Fec_doc +" "+forma_pago +" "+moneda)*/
	var dir='../CONTROLLER/controller_cotizacion.php?opc_Cotizacion=1&codigo='+codigo+'&Raz_social='+Raz_social+'&Lugar_entrega='+Lugar_entrega+'&ruc='+ruc+'&actencion='+actencion
	+'&entrega='+entrega+'&solicitud='+solicitud+'&condvent='+condvent+'&Vendedor='+Vendedor+'&ordencompra='+ordencompra
	+'&Fec_doc='+Fec_doc+'&forma_pago='+forma_pago+'&moneda='+moneda+'&subTotal='+subTotal+'&basimp='+basimp
	+'&exoneracion='+exoneracion+'&inafectos='+inafectos+'&igv='+igv+'&total='+total
	var numdoc=1
	$.ajax(
		{
			url: dir,
			success: function( data ) {
				numdoc=data
				valores=new Array();
				var NUMITE=0
				$('#tabla_producto tr').each(function () {
					var CODIGO = $(this).closest("tr").find(".CODIGO").text();
					var DESITE = $(this).closest("tr").find(".DESITE").text();
					var cantidad = $(this).closest("tr").find(".cantidad").text();
					var PRECLI01 = $(this).closest("tr").find(".PRECLI01").text();
					var total_item = $(this).closest("tr").find(".total_item").text();
					var CODMON=$("#moneda").val()
					var CODALM = $(this).closest("tr").find(".CODALM").text();
					var EXONER = $(this).closest("tr").find(".EXONER").text();
					var INAFEC = $(this).closest("tr").find(".INAFEC").text();
					var SERVIC = $(this).closest("tr").find(".SERVIC").text();
					var CODLIN = $(this).closest("tr").find(".CODLIN").text();
					var CODSLI = $(this).closest("tr").find(".CODSLI").text();
					var CODITE = $(this).closest("tr").find(".CODITE").text();
					var IDPROD = $(this).closest("tr").find(".IDPROD").text();
					if(SERVIC!="SERVIC"){
						NUMITE+=1;
						var dirDEt='../CONTROLLER/controller_detallecotizacion.php?opc_DetalleCotizacion=1&numdoc='+numdoc+'&NUMITE='+NUMITE+'&IDPROD='+IDPROD+'&DESITE='+DESITE+'&cantidad='+cantidad
							+'&PRECLI01='+PRECLI01+'&total_item='+total_item+'&CODMON='+CODMON+'&CODALM='+CODALM+'&EXONER='+EXONER
							+'&INAFEC='+INAFEC+'&SERVIC='+SERVIC+'&CODLIN='+CODLIN+'&CODSLI='+CODSLI+'&CODITE='+CODITE+'&CODIGO='+CODIGO
						$.ajax(
							{
								url: dirDEt,
								success: function( data ) {
									if (data>0){
										alert("Cotizacion "+data +" generada correctamente")
										window.open("../CONTROLLER/reporte_cotizacion.php?NUMDOC="+numdoc, "Reporte Cotizacion")
										location.reload(true)
									}else{
										alert("Error al generar la cotizacion")
									}
								}
							}
						)
					}
				});
			}
		}
	)
	
}