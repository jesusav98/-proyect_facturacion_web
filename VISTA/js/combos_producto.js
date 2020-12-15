
$(document).ready(function() {
	mostrar_linea()
	mostrar_sublinea()
	mostrar_unimed()
	mostrar_almacen(); 
	mostrar_editarunimed();
	mostrar_editar_almacen();
});

$('#codlin').change(function() {
	mostrar_sublinea()
});

function mostrar_linea() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=13', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_NUMELE+' '+SIS_DESCOR+'</option>';
			$('#codlin').append(resultado);
		});
	}, 'json');
	return resultado;
}



function mostrar_sublinea() {
	var resultado = '';
	$('#codsli').empty()
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=14', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
			var SIS_DESCOR = data[row].SIS_DESCOR;
			if($('#codlin').val()==SIS_NUMELE.substr(0,2)){
				resultado = '<option value="'+SIS_NUMELE.substr(2)+'">'+SIS_NUMELE.substr(2)+' '+SIS_DESCOR+'</option>';
				$('#codsli').append(resultado);
			}
		});

	}, 'json');
	return resultado;
}

function mostrar_unimed() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=01', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#und_med').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_editarunimed() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=01', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#editar_und_med').append(resultado);
		});
		
	}, 'json');
	return resultado;
}

function mostrar_almacen() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=02', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
			var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#_almacen').append(resultado);
		});
	}, 'json');
	return resultado;
}
function mostrar_editar_almacen() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=02', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
			var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#_editar_almacen').append(resultado);
		});
	}, 'json');
	return resultado;
}