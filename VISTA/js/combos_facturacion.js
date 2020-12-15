 
$(document).ready(function() {
	mostrar_TipoDoc()
	mostrar_moneda()
	mostrar_forma_pago()
	mostrar_Vendedor()
});

function mostrar_TipoDoc() {
	var resultado = '';
	$.get('../CONTROLLER/controller_contador.php?opc_Contador=4', function (data) {
		$(data).each(function(row) {
			var CLADOC = data[row].CLADOC;
			var DESCRI = data[row].DESCRI;
			var SERIE = data[row].SERIE;
			var TIPIMP=data[row].TIPIMP;
			resultado = '<option value="'+CLADOC+''+TIPIMP+'">'+DESCRI + ' ' + SERIE+'</option>';
			$('#Tipo_doc').append(resultado);
		});
		mostrar_motivo()
	}, 'json');
	return resultado;
}

$('input[type="checkbox"]').on('change', function(e){
	var fecha=0
	if (this.checked) {
		$("#mon_detra").prop('disabled', false);
	} else {
		$("#mon_detra").prop('disabled', true);
		$("#mon_detra").val('0.00')
	}
	
});

function mostrar_motivo() {
	var resultado = '';
	var Tipo_doc=$('#Tipo_doc').val()
	Tipo_doc=Tipo_doc.substring(0,2)
	var TIPIMP=$('#Tipo_doc').val().substring(3,2)
	$('#TIPIMP').val(TIPIMP);
	$('#Motivo').empty()
	if(Tipo_doc=='01' || Tipo_doc=='03'){
		$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=10', function (data) {
			$(data).each(function(row) {
				var SIS_NUMELE = data[row].SIS_NUMELE;
				var SIS_DESLAR = data[row].SIS_DESLAR;
				resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
				$('#Motivo').append(resultado);
			});
			$("#Tipo_doc_ref").prop('disabled', true);
			$("#Fec_doc_ref").prop('disabled', true);
			$("#num_doc_ref").prop('disabled', true);
			$("#num_doc_ref").val('');
			$("#boton_buscar_doc_ref").prop('disabled', true);
			$('#Tipo_doc_ref').empty()
		}, 'json');
	}else if(Tipo_doc=='07'){
		$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=11', function (data) {
			$(data).each(function(row) {
				var SIS_NUMELE = data[row].SIS_NUMELE;
				var SIS_DESLAR = data[row].SIS_DESLAR;
				resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
				$('#Motivo').append(resultado);
			});
			$("#Tipo_doc_ref").prop('disabled', false);
			$("#Fec_doc_ref").prop('disabled', false);
			$("#num_doc_ref").prop('disabled', false);
			$("#boton_buscar_doc_ref").prop('disabled',false);
			mostrar_TipoDoc_ref()
		}, 'json');
	}else if(Tipo_doc=='08'){
		$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=12', function (data) {
			$(data).each(function(row) {
				var SIS_NUMELE = data[row].SIS_NUMELE;
				var SIS_DESLAR = data[row].SIS_DESLAR;
				resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
				$('#Motivo').append(resultado);
			});
			$("#Tipo_doc_ref").prop('disabled', false);
			$("#Fec_doc_ref").prop('disabled', false);
			$("#num_doc_ref").prop('disabled', false);
			$("#boton_buscar_doc_ref").prop('disabled', false);
			mostrar_TipoDoc_ref()
		}, 'json');
	}else{
		resultado=''
	}
	return resultado;
}

function mostrar_TipoDoc_ref(){
	var resultado = '';
	$('#Tipo_doc_ref').empty()
	$.get('../CONTROLLER/controller_contador.php?opc_Contador=4', function (data) {
		$(data).each(function(row) {
			var CLADOC = data[row].CLADOC;
            var DESCRI = data[row].DESCRI;
			var SERIE = data[row].SERIE;
			if(CLADOC=='01'||CLADOC=='03'){
				resultado = '<option value="'+CLADOC+'">'+DESCRI + ' ' + SERIE+'</option>';
				$('#Tipo_doc_ref').append(resultado);
			}
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

function cargar_datos_cliente_fac(cliente_fac){
    d=cliente_fac.split('||');
    $("#ruc").val(d[0]);
    $("#Raz_social").val(d[1]);
    $("#buscar_cliente").modal('hide')//cierra modal
    mostrar_direccion_cliente() 
}

function mostrar_direccion_cliente() {
	var resultado = '';
	var ruc=$("#ruc").val()
	$('#Lugar_entrega').empty()
	RUTA='../CONTROLLER/controller_anexoscliente.php?opc_anexocliente=4&ruc='+ruc
	$.get(RUTA, function (data) {
		$(data).each(function(row) {
			var DIRENT = data[row].DIRENT;
			resultado = '<option value="'+DIRENT+'">'+DIRENT+'</option>';
			$('#Lugar_entrega').append(resultado);
		});
	}, 'json');
	return resultado;
}

function mostar_buscar_cotizaion(){
	var ruc=$('#ruc').val()
	var RUTA="buscar_cotizacion.php?ruc="+ruc
    $.ajax({
        url: RUTA
    }).done(function(data) {
            $('#buscar_cotizacion').html(data); 
    });
}

function agregarCotizacion(){
	var result = [];
	var i = 0;
	// para cada checkbox "chequeado"
	$('#tabla_producto tbody').empty()
	var col=0
	var N_cot=''
	$("input[type=checkbox]:checked").each(function(){
		// buscamos el td más cercano en el DOM hacia "arriba"
		// luego encontramos los td adyacentes a este
		$(this).closest('td').siblings().each(function(){
			// obtenemos el texto del td 
			result[i] = $(this).closest("tr").find(".NUMDOC").text();
			if(col==0){
				mostrar_detalle_cotizacion(result[i])
				N_cot=N_cot+result[i]+','
				
				
			}
			if(col==4){
				col=0
			}else{
				++col;
			}
			++i;
		});
	});
	N_cot=N_cot.substring(N_cot.length-1,1)
	$("#n_cotizacion").val(N_cot);
}


function mostrar_detalle_cotizacion(NUMDOC) {
	var RUTA='../CONTROLLER/controller_detallecotizacion.php?opc_DetalleCotizacion=2&NUMDOC='+NUMDOC
	$.get(RUTA, function (data) {
		$(data).each(function(row) {
			var htmlTags = '<tr>'+
				'<td class="CODIGO" >' + data[row].CODIGO + '</td>'+
				'<td class="DESITE">' + data[row].DESART + '</td>'+
				'<td class="cantidad" style="text-align:right;">' + data[row].CANPED + '</td>'+
				'<td class="STOLIN" style="display: none;">' + data[row].CANPED + '</td>'+
				'<td class="PRECLI01" style="text-align:right;">' +data[row]. PREUNI + '</td>'+
				'<td class="total_item" style="text-align:right;">' + data[row].IMPART + '</td>'+
				'<td class="CODALM" style="display: none;">' + data[row].COD_ALM + '</td>'+
				'<td class="EXONER" style="display: none;">' + data[row].EXONER + '</td>'+
				'<td class="INAFEC" style="display: none;">' + data[row].INAFEC + '</td>'+
				'<td class="SERVIC" style="display: none; ">' + data[row].SERVIC + '</td>'+
				'<td class="CODLIN" >' + data[row].CODLIN + '</td>'+
				'<td class="CODSLI" >' + data[row].CODSLI + '</td>'+
				'<td class="CODITE" >' + data[row].CODITE + '</td>'+
				'<td class="IDPROD" >' + data[row].IDPROD + '</td>'+
				'<td>'+
				'	<a href="#" class="eliminarProducto" ><i class="fa fa-remove"></i></a>'+
				'	<a href="#" data-toggle="modal" data-target="#editar_producto" class="editarProducto"><i class="fa fa-pencil"></i></a></td>'+
				'</tr>';
			$('#tabla_producto tbody').append(htmlTags);
			calcularTotalFactura();
		});
	}, 'json');
	//return resultado;
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

	var cantidad=parseFloat($("#cantidad").val()).toFixed(4)
	var PRECLI01=parseFloat($("#PRECLI01").val()).toFixed(4)
	var total_item=parseFloat(cantidad*PRECLI01).toFixed(4)
	$("#total_item").val(total_item);
}

function agregarProducto(PUIGV,IGV){
	var IDPROD=$("#IDPROD").val()
	var CODIGO=$("#CODIGO").val()
	var DESITE=$("#DESITE").val()
	var cantidad=parseFloat($("#cantidad").val())
	var STOLIN=parseFloat($("#STOLIN").val())
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
		calcularTotalFactura(PUIGV,IGV)
		$("#producto_agregado").modal('hide')
		$("#cantidad").val(0)
		$("#PRECLI01").val(0)
		$("#total_item").val(0)
	}else{
		if(agregar==true){
			alert("Producto ya existe")
			$("#cantidad").val(0)
			$("#total_item").val(0)
		}
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

function calcularTotalFactura(PUIGV,VALIGV){
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
	if(PUIGV==0){
		suma=parseFloat(suma).toFixed(4)
		igv=parseFloat(suma*(VALIGV/100)).toFixed(4)
		total=parseFloat(igv+suma).toFixed(4)
	}else{
		suma=parseFloat(suma/(1+(VALIGV/100))).toFixed(4)
		igv=parseFloat(suma*(VALIGV/100)).toFixed(4)
		total=Number(igv)+Number(suma)
		console.log(suma+igv,total)
	}
	

	$('#subTotal').val(parseFloat(suma+exonerado+inafecto).toFixed(4))
	$('#basimp').val(parseFloat(suma).toFixed(4))
	$('#exoneracion').val(parseFloat(exonerado).toFixed(4))
	$('#inafectos').val(parseFloat(inafecto).toFixed(4))
	$('#igv').val(parseFloat(igv).toFixed(4))
	$('#total').val(parseFloat(total+exonerado+inafecto).toFixed(4))

}

function calculareditartotal(){
	var cantidad=$("#editar_cantidad").val()
	var PRECLI01=$("#editar_PRECLI01").val()
	var total_item=(cantidad*PRECLI01)
	$("#editar_total_item").val(total_item);
}

function editarProducto(PUIGV,VALIGV){
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
		calcularTotalFactura(PUIGV,VALIGV)
		$("#editar_producto").modal('hide')
		$("#editar_cantidad").val(0)
		$("#editar_PRECLI01").val(0)
		$("#editar_total_item").val(0)
	}
}

function validar_campos(){
	var ruc=$("#ruc").val()
	var total=$("#total").val()
	var mostrar=true
	if(ruc==""){
		alert("Ingrese un Cliente")
		mostrar=false
	}

	if(total==0 && mostrar==true){
		alert("Ingrese un Producto")
		mostrar=false
	}

	if(mostrar==true){
		$("#generar-factura").modal('show')
	}
}

function generarFactura(){
	var Tipo_doc=$("#Tipo_doc").val()
	Tipo_doc=Tipo_doc.substring(0,2)
	var combo = document.getElementById("Tipo_doc");
	var selected = combo.options[combo.selectedIndex].text
	var Serie=selected.substring(selected.length-4)
	var Motivo=$("#Motivo").val()
	var Fec_doc=$("#Fec_doc").val()
	var Fec_ven=$("#Fec_ven").val()
	var ruc=$("#ruc").val()
	var Raz_social=$("#Raz_social").val()
	var cotizacion=$("#n_cotizacion").val()
	var Lugar_entrega=$("#Lugar_entrega").val()
	var moneda=$("#moneda").val()
	var forma_pago=$("#forma_pago").val()
	var cond_vent=$("#cond_vent").val()
	var ord_com=$("#ord_com").val()
	var Vendedor=$("#Vendedor").val()
	var afe_detra=$("#afe_detra").val()
	var mon_detra=$("#mon_detra").val()
	var descuento=$("#descuento").val()
	
	if (Tipo_doc=="07" || Tipo_doc=='08'){
		var Tipo_doc_ref=$("#Tipo_doc_ref").val()

		var combo_ref = document.getElementById("Tipo_doc_ref");
		var selected_ref = combo_ref.options[combo_ref.selectedIndex].text
		var Ser_doc_ref=selected_ref.substring(selected_ref.length-4)
		var num_doc_ref=$("#num_doc_ref").val()
		var Fec_doc_ref=$("#Fec_doc_ref").val()
	}else{
		var Tipo_doc_ref=""
		var Ser_doc_ref=""
		var num_doc_ref=""
		var Fec_doc_ref=""
	}

	var subTotal=$("#subTotal").val()
	var basimp=$("#basimp").val()
	var exoneracion=$("#exoneracion").val()
	var inafectos=$("#inafectos").val()
	var igv=$("#igv").val()
	var total=$("#total").val()

	var nomdoc=selected.substring(0,selected.length-4)

	var dir='../CONTROLLER/controller_facturacion.php?opc_Facturacion=1&Tipo_doc='+Tipo_doc+'&Serie='+Serie+'&Motivo='+Motivo+'&Fec_doc='+Fec_doc
	+'&Fec_ven='+Fec_ven+'&ruc='+ruc+'&Raz_social='+Raz_social+'&n_cotizacion='+cotizacion+'&Lugar_entrega='+Lugar_entrega+'&moneda='+moneda
	+'&forma_pago='+forma_pago+'&cond_vent='+cond_vent+'&ord_com='+ord_com+'&Vendedor='+Vendedor+'&afe_detra='+afe_detra+'&mon_detra='+mon_detra
	+'&descuento='+descuento+'&Tipo_doc_ref='+Tipo_doc_ref+'&Ser_doc_ref='+Ser_doc_ref+'&num_doc_ref='+num_doc_ref+'&Fec_doc_ref='+Fec_doc_ref
	+'&subTotal='+subTotal+'&basimp='+basimp+'&exoneracion='+exoneracion+'&inafectos='+inafectos+'&igv='+igv+'&total='+total
	$.ajax(
		{
			url: dir,
			success: function( data ) {
				var NUMDOC=data
				valores=new Array();
				var NUMITE=0
				var cantidadItem=0
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
						var dirDEt='../CONTROLLER/controller_detallefacturacion.php?opc_DetalleFacturacion=1&SERIE='+Serie+'&CLADOC='+Tipo_doc+'&NUMDOC='+NUMDOC+'&NUMITE='
							+NUMITE+'&IDPROD='+IDPROD+'&DESITE='+DESITE+'&cantidad='+cantidad
							+'&PRECLI01='+PRECLI01+'&total_item='+total_item+'&CODMON='+CODMON+'&CODALM='+CODALM+'&EXONER='+EXONER
							+'&INAFEC='+INAFEC+'&SERVIC='+SERVIC+'&CODLIN='+CODLIN+'&CODSLI='+CODSLI+'&CODITE='+CODITE+'&CODIGO='+CODIGO
						console.log(dirDEt)
							$.ajax(
							{
								url: dirDEt,
								success: function( data ) {
									if (data>0){
										cantidadItem+=1
										if(NUMITE==cantidadItem){
											alert(nomdoc+" "+NUMDOC +" generada correctamente")
											var TIPIMP=$('#TIPIMP').val()

											if(TIPIMP==1){
												window.open("../CONTROLLER/reporte_factura.php?SERIE="+Serie+"&CLADOC="+Tipo_doc+"&NUMDOC="+NUMDOC, "Reporte facturacion")
											}else{
												window.open("../CONTROLLER/reporte_facturaticket.php?SERIE="+Serie+"&CLADOC="+Tipo_doc+"&NUMDOC="+NUMDOC, "Reporte facturacion")
											}
											location.reload(true)
										}
									}else{
										alert("Error al generar "+nomdoc)
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

function buscar_doc_ref(){
	var docref=$('#Tipo_doc_ref').val()
	var combo = document.getElementById("Tipo_doc_ref");
	var selected = combo.options[combo.selectedIndex].text
	var serref=selected.substring(selected.length-4)
	var ruc=$('#ruc').val()
	if(ruc!=''){
		$('#buscar-n-referencia').modal("show")
		var RUTA="buscar_docunento_referencia.php?ruc="+ruc+"&docref="+docref+"&serref="+serref
		$.ajax({
			url: RUTA
		}).done(function(data) {
				$('#buscar_doc_ref').html(data); 
		});
	}else{
		alert("Seleccione un cliente")
	}
}

function cargar_documento_referencia(docref,serref,NUMDOC){
	NUMDOC=docref+"-"+serref+"-"+NUMDOC.substring(NUMDOC.length-10)
	
	var RUTA='../CONTROLLER/controller_detallefacturacion.php?opc_DetalleFacturacion=2&NUMDOC='+NUMDOC
	$('#tabla_producto tbody').empty()
	$.get(RUTA, function (data) {
		$(data).each(function(row) {
			var htmlTags = '<tr>'+
				'<td class="CODIGO" >' + data[row].CODIGO + '</td>'+
				'<td class="DESITE">' + data[row].DESART + '</td>'+
				'<td class="cantidad" style="text-align:right;">' + data[row].CANPED + '</td>'+
				'<td class="STOLIN" style="display: none;">' + data[row].CANPED + '</td>'+
				'<td class="PRECLI01" style="text-align:right;">' +data[row]. PREUNI + '</td>'+
				'<td class="total_item" style="text-align:right;">' + data[row].IMPART + '</td>'+
				'<td class="CODALM" style="display: none;">' + data[row].COD_ALM + '</td>'+
				'<td class="EXONER" style="display: none;">' + data[row].EXONER + '</td>'+
				'<td class="INAFEC" style="display: none;">' + data[row].INAFEC + '</td>'+
				'<td class="SERVIC" style="display: none; ">' + data[row].SERVIC + '</td>'+
				'<td class="CODLIN" >' + data[row].CODLIN + '</td>'+
				'<td class="CODSLI" >' + data[row].CODSLI + '</td>'+
				'<td class="CODITE" >' + data[row].CODITE + '</td>'+
				'<td class="IDPROD" >' + data[row].IDPROD + '</td>'+
				'<td>'+
				'	<a href="#" class="eliminarProducto" ><i class="fa fa-remove"></i></a>'+
				'	<a href="#" data-toggle="modal" data-target="#editar_producto" class="editarProducto"><i class="fa fa-pencil"></i></a></td>'+
				'</tr>';
			$('#num_doc_ref').val(NUMDOC.substring(NUMDOC.length-10))
			$('#Fec_doc_ref').val(data[row].FECDOC)
			$('#tabla_producto tbody').append(htmlTags);
			calcularTotalFactura();
		});
	}, 'json');
	$('#buscar-n-referencia').modal("hide")
	//return resultado;
}
