//nuevo cliente
$(document).ready(function() {
	mostrar_Departamento();
	mostrar_Provincias('01');
	mostrar_Distritos('01','01')
	$('#_Departamentos').change(function() {
		selectProvincia();
	});
	$('#_Provincias').change(function() {
		selectDitritos();
	});
});
 
function selectProvincia() { 
	var Departamento = $('#_Departamentos');
	var Resultado = mostrar_Provincias(Departamento.val());
	selectDitritos();
}

function selectDitritos() {
	var Departamento = $('#_Departamentos');
	var Provincia = $('#_Provincias');
	var Resultado = mostrar_Distritos(Departamento.val(),Provincia.val());
}

function mostrar_Departamento() {
	var resultado = '';
	$.get('../CONTROLLER/Departamento.php', function (data) {
		$(data).each(function(row) {
			var Departamento_ID = data[row].CODDPTO;
            var Departamento = data[row].DESCRI;
			resultado = '<option value="'+Departamento_ID+'">'+Departamento+'</option>';
			$('#_Departamentos').append(resultado);
		});
	}, 'json');
	return resultado;
}

function mostrar_Provincias(dep) {
	var Resultados = '';
	$.get('../CONTROLLER/provincia.php', function (data) {
		$('#_Provincias').empty()	
		$(data).each(function (row) {
			var Departamento_ID = data[row].CODDPTO;
			var Provincia_ID = data[row].CODPROV;
			var Provincia = data[row].DESCRI;
			if (Departamento_ID == dep) {
				Resultados = '<option value="'+Provincia_ID+'">'+Provincia+'</option>';
				$('#_Provincias').append(Resultados);
			}
		});
	}, 'json');
}

function mostrar_Distritos(dep,pro) {
	var Resultado = '';		
	$.get('../CONTROLLER/distrito.php', function (data) {
		$('#_Distritos').empty()
		$(data).each(function(row) {
			var Departamento_ID  = data[row].CODDPTO;
			var Provincia_ID = data[row].CODPROV;
			var Distrito_ID = data[row].CODDIST;
			var Distrito 	 = data[row].DESCRI;
			if (Departamento_ID == dep && Provincia_ID== pro) {
				Resultado = '<option value="'+Distrito_ID+'">'+Distrito+'</option>';
				$('#_Distritos').append(Resultado);
			}
		});
	}, 'json');
	return Resultado;
}
//editar cliente
$(document).ready(function() {
	mostrar_editar_Departamento();
	/*mostrar_editar_Provincias('01');
	mostrar_editar_Distritos('01','01')
	$('#_editar_Departamentos').change(function() {
		select_editar_Provincia();
	});
	$('#_editar_Provincias').change(function() {
		select_editar_Ditritos();
	});*/
});

function select_editar_Provincia() {
	var Departamento = $('#_editar_Departamentos');
	var Resultado = mostrar_editar_Provincias(Departamento.val());
	select_editar_Ditritos();
}

function select_editar_Ditritos() {
	var Departamento = $('#_editar_Departamentos');
	var Provincia = $('#_editar_Provincias');
	var Resultado = mostrar_editar_Distritos(Departamento.val(),Provincia.val());
}

function mostrar_editar_Departamento() {
	var resultado = '';
	$.get('../CONTROLLER/Departamento.php', function (data) {
		$(data).each(function(row) {
			var Departamento_ID = data[row].CODDPTO;
            var Departamento = data[row].DESCRI;
			resultado = '<option value="'+Departamento_ID+'">'+Departamento+'</option>';
			$('#_editar_Departamentos').append(resultado);
		});
	}, 'json');
	return resultado;
}

function mostrar_editar_Provincias(dep,pro,dis) {
	var Resultados = '';
	$.get('../CONTROLLER/provincia.php', function (data) {
		$('#_editar_Provincias').empty()	
		$(data).each(function (row) {
			var Departamento_ID = data[row].CODDPTO;
			var Provincia_ID = data[row].CODPROV;
			var Provincia = data[row].DESCRI;
			if (Departamento_ID == dep) {
				Resultados = '<option value="'+Provincia_ID+'">'+Provincia+'</option>';
				$('#_editar_Provincias').append(Resultados);
			}
			$('#_editar_Provincias').val(pro)
			mostrar_editar_Distritos(dep,pro,dis)
		});
	}, 'json');
}

function mostrar_editar_Distritos(dep,pro,dis) {
	var Resultado = '';		
	$.get('../CONTROLLER/distrito.php', function (data) {
		$('#_editar_Distritos').empty()
		$(data).each(function(row) {
			var Departamento_ID  = data[row].CODDPTO;
			var Provincia_ID = data[row].CODPROV;
			var Distrito_ID = data[row].CODDIST;
			var Distrito 	 = data[row].DESCRI;
			if (Departamento_ID == dep && Provincia_ID== pro) {
				Resultado = '<option value="'+Distrito_ID+'">'+Distrito+'</option>';
				$('#_editar_Distritos').append(Resultado);
			}
			$('#_editar_Distritos').val(dis)
		});
	}, 'json');
	return Resultado;
}