
$(document).ready(function() {
	mostrar_almacen()
	mostrar_tipo_transaccion()
	mostrar_razon_movimiento()
	mostrar_moneda()
	mostrar_TipoDoc()
});


function mostrar_almacen() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=02', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
			var SIS_DESCOR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#alm_des').append(resultado);
		});
	}, 'json');
	return resultado;
}

function mostrar_tipo_transaccion() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=15', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
			var SIS_DESCOR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#codtran').append(resultado);
		});
	}, 'json');
	return resultado;
}

function mostrar_razon_movimiento() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=16', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
			var SIS_DESCOR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#razmov').append(resultado);
		});
		$('#razmov').val("CO")
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

function mostrar_TipoDoc() {
	var resultado = '';
	$.get('../CONTROLLER/controller_contador.php?opc_Contador=4', function (data) {
		$(data).each(function(row) {
			var CLADOC = data[row].CLADOC;
            var DESCRI = data[row].DESCRI;
            var SERIE = data[row].SERIE;
			resultado = '<option value="'+CLADOC+'">'+DESCRI + ' ' + SERIE+'</option>';
			$('#tipdoc').append(resultado);
			
		});
	}, 'json');
	return resultado;
}

$('#codtran').change(function() {
	if($('#codtran').val()=="02"){
		$('#razmov').val("CO")
	}
	if($('#codtran').val()=="01"){
		$('#razmov').val("VT")
	}
	if($('#codtran').val()=="28"){
		$('#razmov').val("AS")
	}
});


function buscarClienteProveedor(){
    var codtran=$("#codtran").val()
    if(codtran=="02"){
        $("#buscar_proveedor").modal("show")
    }else{
        $("#buscar_cliente").modal("show")
    }
}

function cargar_datos_cliente_proveedor(cliente_proveedor){
    d=cliente_proveedor.split('||');
    $("#ruc").val(d[0]);
    $("#raz_social").val(d[1]);
    $("#buscar_cliente").modal('hide')//cierra modal
    $("#buscar_proveedor").modal('hide')//cierra modal
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
	var codtran=$("#codtran").val()
	var razmov=$("#razmov").val()
	if(codtran!='02'){
		if(SERVIC==0){
			if(cantidad>STOLIN){
				alert("Cantidad mayor al Stock Actual")
				agregar=false
			}
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
		calcularTotal()
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

function calcularTotal(){
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
		calcularTotal()
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
	if(total==0){
		alert("Ingrese un Producto")
		mostrar=false
	}
	if(mostrar==true){
		$("#generar_notaingreso").modal('show')
	}
}

function generar(){
	var codtran=$("#codtran").val()
	var razmov=$("#razmov").val()
	var alm_des=$("#alm_des").val()
	var ruc=$("#ruc").val()
	var raz_social=$("#raz_social").val()
	var INGSAL=""
	if(codtran=="02" || (codtran=="28" && razmov=="AS")){
		INGSAL="I"
	}else if(codtran=="01" || (codtran=="28" && razmov=="SA")){
		INGSAL="S"
	}
	var Fec_doc=$("#Fec_doc").val()
	var moneda=$("#moneda").val()
	var numdoc=$("#numdoc").val()
	var numord=$("#numord").val()
	var tipdoc=$("#tipdoc").val()
	var serie=$("#serie").val()
	var TOTNETO=$("#TOTNETO").val()
	var TOTIGV=$("#TOTIGV").val()
	var TOTBRU=$("#TOTBRU").val()
	var TOTEXO=$("#TOTEXO").val()
	var subTotal=$("#subTotal").val()
	var igv=$("#igv").val()
	var exoneracion=$("#exoneracion").val()
	var total=$("#total").val()
	
	var dir='../CONTROLLER/controller_notaingreso.php?opc_Noting=1&codtran='+codtran+'&razmov='+razmov+'&alm_des='+alm_des+'&ruc='+ruc
	+'&raz_social='+raz_social+'&INGSAL='+INGSAL+'&Fec_doc='+Fec_doc+'&moneda='+moneda+'&numdoc='+numdoc+'&numord='+numord
	+'&tipdoc='+tipdoc+'&serie='+serie+'&TOTNETO='+TOTNETO+'&TOTIGV='+TOTIGV+'&TOTBRU='+TOTBRU+'&TOTEXO='+TOTEXO
	+'&subTotal='+subTotal+'&igv='+igv+'&exoneracion='+exoneracion+'&total='+total
	console.log(dir)
	$.ajax(
		{
			url: dir,
			success: function( data ) {
                var NUMDOC=data
                console.log(NUMDOC)
				valores=new Array();
				var NUMITE=0
				var cantidadItem=0
				 $('#tabla_producto tr').each(function () {
					var CODIGO = $(this).closest("tr").find(".CODIGO").text();
					var DESART = $(this).closest("tr").find(".DESITE").text();
					var CANTID = $(this).closest("tr").find(".cantidad").text();
					var COSUNI = $(this).closest("tr").find(".PRECLI01").text();
					var IMPART = $(this).closest("tr").find(".total_item").text();
					var CODALM = $(this).closest("tr").find(".CODALM").text();
					var EXONER = $(this).closest("tr").find(".EXONER").text();
					var SERVIC = $(this).closest("tr").find(".SERVIC").text();
					var CODLIN = $(this).closest("tr").find(".CODLIN").text();
					var CODSLI = $(this).closest("tr").find(".CODSLI").text();
                    var CODITE = $(this).closest("tr").find(".CODITE").text();
                    
                    var FECTRAN=$("#Fec_doc").val()
					if(SERVIC!="SERVIC"){
						NUMITE+=1;
                        var dirDEt='../CONTROLLER/controller_detallenotaingreso.php?opc_DetalleNotaIngreso=1&NUMORD='+NUMDOC+'&FECTRAN='+FECTRAN
                            +'&NUMITE='+NUMITE+'&CODLIN='+CODLIN+'&CODSLI='+CODSLI+'&CODITE='+CODITE+'&CODIGO='+CODIGO+'&DESART='+DESART+'&CANTID='+CANTID
                            +'&COSUNI='+COSUNI+'&IMPART='+IMPART+'&CODALM='+CODALM+'&EXONER='+EXONER+'&SERVIC='+SERVIC
                        console.log(dirDEt)
						$.ajax(
							{
								url: dirDEt,
								success: function( data ) {
									if (data>0){
										cantidadItem+=1
										if(NUMITE==cantidadItem){
											alert("Nota Ingreso "+NUMDOC +" generada correctamente")

											window.open("../CONTROLLER/reporte_notaingreso.php?NOTING="+NUMDOC.padStart(10,0), "Reporte Nota Ingreso")
											location.reload(true)
										}
									}else{
										alert("Error al generar Nota Ingreso "+NUMDOC)
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