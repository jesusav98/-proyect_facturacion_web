
$(document).ready(function() {
	mostrar_Tipo_Doc()
	mostrar_Almacen()
	mostrar_PV()

	mostrar_editar_Tipo_Doc()
	mostrar_editar_Almacen()
	mostrar_editar_PV()
});

function mostrar_Tipo_Doc() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=04', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#Tipo_Doc').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_Almacen() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=02', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#Almacen').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_PV() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=05', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#pv').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_editar_Tipo_Doc() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=04', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#editar_Tipo_Doc').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_editar_Almacen() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=02', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#editar_Almacen').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_editar_PV() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=05', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#editar_pv').append(resultado);
		});

	}, 'json');
	return resultado;
}