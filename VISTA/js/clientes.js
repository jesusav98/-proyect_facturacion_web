//Código para Datables

//$('#example').DataTable(); //Para inicializar datatables de la manera más simple

$(document).ready(function() {    
    mostrar_tipdocide()
    mostrar_editar_tipdocide()
    $('#clientes').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});

function mostrar_tipdocide() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=03', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#tipdocide').append(resultado);
		});

	}, 'json');
	return resultado;
}

function mostrar_editar_tipdocide() {
	var resultado = '';
	$.get('../CONTROLLER/controller_combosistab.php?OPC_SIS_NUMTAB=03', function (data) {
		$(data).each(function(row) {
			var SIS_NUMELE = data[row].SIS_NUMELE;
            var SIS_DESCOR = data[row].SIS_DESCOR;
			resultado = '<option value="'+SIS_NUMELE+'">'+SIS_DESCOR+'</option>';
			$('#editar_tipdocide').append(resultado);
		});

	}, 'json');
	return resultado;
} 

$('#ruc').keyup(function(){
    var tipdocide = $("#tipdocide").val();
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

$('#T_contribuyente').change(function(){
    var T_contribuyente=$('#T_contribuyente').val()
    if (T_contribuyente==0){
        $('#tipdocide').val(1)
    }
    if (T_contribuyente==1){
        $('#tipdocide').val(6)
    }
});
$('#tipdocide').change(function(){
    var tipdocide = $("#tipdocide").val();
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

function busqueda(){
    $.ajaxblock();
    var tipdocide = $("#tipdocide").val();
    if (tipdocide ==1){
        consultaDni()
    }
    if (tipdocide ==6){
        consultaRuc()
    }
   
}

(function($){
    $.ajaxblock=function(){
       $("body").prepend("<div id='ajax-overlay'><div id='ajax-overlay-body' class='center'><i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><span class='sr-only'>Loading...</span></div></div>");
       $("#ajax-overlay").css({
          position: 'absolute',
          color: '#FFFFFF',
          top: '0',
          left: '0',
          width: '100%',
          height: '100%',
          position: 'fixed',
          background: 'rgba(39, 38, 46, 0.67)',
          'text-align': 'center',
          'z-index': '9999'
       });
       $("#ajax-overlay-body").css({
          position: 'absolute',
          top: '40%',
          left: '50%',
          width: '120px',
          height: '48px',
          'margin-top': '-12px',
          'margin-left': '-60px',
          //background: 'rgba(39, 38, 46, 0.1)',
          '-webkit-border-radius':   '10px',
          '-moz-border-radius':      '10px',
          'border-radius':        '10px'
       });
       $("#ajax-overlay").fadeIn(50);
    };
    $.ajaxunblock  = function(){
       $("#ajax-overlay").fadeOut(100, function()
       {
          $("#ajax-overlay").remove();
       });
    };
 })(jQuery);

 function consultaDni(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../CONTROLLER/reniec/consulta.php?dni="+$("#ruc").val(),
    }).done(function( data, textStatus, jqXHR ){ 
        if(data['success']!="false" && data['success']!=false)
        {
            $('#raz_social').val(data['name']);
            $('#Ape_Paterno').val(data['first_name']);
            $('#Ape_Materno').val(data['last_name']);
            $.ajaxunblock();
        }else{
           if(typeof(data['msg'])!='undefined')
           {
            alert(data['msg']);
            $('#direccion').val('');
            $('#raz_social').val('');
            $('#Ape_Paterno').val('');
            $('#Ape_Materno').val('');
            $('#Nom_comercial').val('');
           }
           $.ajaxunblock();
        }
     }).fail(function( jqXHR, textStatus, errorThrown ){
        alert( "Solicitud fallida:" + textStatus );
        $.ajaxunblock();
     });
 }

 function consultaRuc(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../CONTROLLER/sunat/consulta.php?ruc="+$("#ruc").val(),
     }).done(function( data, textStatus, jqXHR ){ 
        if(data['success']!="false" && data['success']!=false)
        {
            console.log(data)
            $("#json_code").text(JSON.stringify(data, null, '\t'));
            var res = JSON.stringify(data['result']['RUC']);
            $('#direccion').val(data['result']['Direccion']);
            $('#raz_social').val(data['result']['RazonSocial']);
            $('#Nom_comercial').val(data['result']['NombreComercial']);
            if(typeof(data['result'])!='undefined')
            {
            //$("#tbody").html("");
            $.each(data['result'], function(i, v)
            {
            //$("#tbody").append('<tr><td>'+i+'<\/td><td>'+v+'<\/td><\/tr>');
            });
            }
            $.ajaxunblock();
        }else{
           if(typeof(data['msg'])!='undefined')
           {
                alert(data['msg']);
                $('#direccion').val('');
                $('#raz_social').val('');
                $('#Ape_Paterno').val('');
                $('#Ape_Materno').val('');
                $('#Nom_comercial').val('');
           }
           $.ajaxunblock();
        }
     }).fail(function( jqXHR, textStatus, errorThrown ){
        alert( "Solicitud fallida:" + textStatus );
        $.ajaxunblock();
     });
 }