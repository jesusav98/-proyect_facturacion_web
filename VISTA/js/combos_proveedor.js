
$(document).ready(function() {
	mostrar_Tipo_Doc()
	mostrar_editar_Tipo_Doc()
});

function mostrar_Tipo_Doc() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=03', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#Tipo_Doc').append(resultado);
		});

	}, 'json');
	return resultado;
}
function mostrar_editar_Tipo_Doc() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=03', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#editar_Tipo_Doc').append(resultado);
		});

	}, 'json');
	return resultado;
}

$('#ruc').keyup(function(){
    var tipdocide = $("#Tipo_Doc").val();
    console.log(tipdocide)
    if (tipdocide ==1){
        var ruc1=  document.getElementById('ruc')
        ruc1.value=ruc1.value.slice(0,8)
    }
    if (tipdocide ==6){
        var ruc1=  document.getElementById('ruc')
        ruc1.value=ruc1.value.slice(0,11)
    }
});

$('#Tipo_Doc').change(function(){
    var tipdocide = $("#Tipo_Doc").val();
    console.log(tipdocide)
    if (tipdocide ==1){
        var ruc1=  document.getElementById('ruc')
        ruc1.value=ruc1.value.slice(0,8)
    }
    if (tipdocide ==6){
        var ruc1=  document.getElementById('ruc')
        ruc1.value=ruc1.value.slice(0,11)
    }
})