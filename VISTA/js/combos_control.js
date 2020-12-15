
$(document).ready(function() {
	mostrar_moneda()
	if($('#id_PUIGV').val()==1){
        $("#PUIGV").prop("checked", true);
    }else{
        $("#PUIGV").prop("checked", false);
    }
});

function mostrar_moneda() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=08', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESLAR = data[row].SIS_DESLAR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESLAR+'</option>';
			$('#moneda').append(resultado);
			$("#moneda").val($('#id_MONEDA').val());
		});

	}, 'json');
	return resultado;

}

