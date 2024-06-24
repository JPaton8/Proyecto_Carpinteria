var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   });

   //cargamos los items al select proveedor
   $.post("../Controllers/compra.php?op=selectProveedor", function(r){
   	$("#idproveedor").html(r);
   	$('#idproveedor').selectpicker('refresh');
   });

}

//funcion limpiar
function limpiar(){ 

	$("#idproveedor").val("");
	$("#proveedor").val("");
	$("#serie_comprobante").val("");
	$("#num_comprobante").val("");
	$("#impuesto").val("");

	$("#total_compra").val("");
	$(".filas").remove();
	$("#total").html("0");

	//obtenemos la fecha actual
	var now = new Date();
	var day =("0"+now.getDate()).slice(-2);
	var month=("0"+(now.getMonth()+1)).slice(-2);
	var today=now.getFullYear()+"-"+(month)+"-"+(day);
	$("#fecha_hora").val(today);

	//marcamos el primer tipo_documento
	$("#tipo_comprobante").val("Boleta");
	$("#tipo_comprobante").selectpicker('refresh');
	$('#idproveedor').selectpicker('refresh');

}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarMateriales();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		detalles=0;
		$("#btnAgregarArt").show();


	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../Controllers/compra.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}

function listarMateriales(){
	tabla=$('#tblmaterial').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [

		],
		"ajax":
		{
			url:'../Controllers/compra.php?op=listarMateriales',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":5,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     //$("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../Controllers/compra.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		listar();
     	}
     });

     limpiar();
}

function mostrar(idcompra){
	 $("#getCodeModal").modal('show');
	$.post("../Controllers/compra.php?op=mostrar",{idcompra : idcompra},
		function(data,status)
		{
			data=JSON.parse(data);

			$("#idproveedorm").val(data.proveedor);
			$("#tipo_comprobantem").val(data.tipo_comprobante);
			$("#serie_comprobantem").val(data.serie_comprobante);
			$("#num_comprobantem").val(data.num_comprobante);
			$("#fecha_horam").val(data.fecha);
			$("#impuestom").val(data.impuesto);
			$("#idcompram").val(data.idcompra);

		});
	$.post("../Controllers/compra.php?op=listarDetalle&id="+idcompra,function(r){
		$("#detallesm").html(r);
	});

}


//funcion para desactivar
function anular(idcompra){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../Controllers/compra.php?op=anular", {idcompra : idcompra}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//declaramos variables necesarias para trabajar con las compras y sus detalles
var cont=0;
var detalles=0;
$("#btnGuardar").hide();

function agregarDetalle(idmaterial,material){
	var cantidad=1;
	var precio_compra=1;

	if (idmaterial!="") {
		var subtotal=cantidad*precio_compra;
		var fila='<tr class="filas" id="fila'+cont+'">'+
        '<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
        '<td><input type="hidden" name="idmaterial[]" value="'+idmaterial+'">'+material+'</td>'+
        '<td><input type="number" onchange="modificarSubtotales()" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
        '<td><input type="number" step="0.01" onchange="modificarSubtotales()" name="precio_compra[]" id="precio_compra[]" value="'+precio_compra+'"></td>'+
        '<td><span id="subtotal'+cont+'" name="subtotal">'+subtotal+'</span></td>'+
		'</tr>';
		cont++;
		detalles++;
		$('#detalles').append(fila);
		modificarSubtotales();

	}else{
		alert("error al ingresar el detalle, revisar las datos del articulo ");
	}
}

function modificarSubtotales(){
	var cant=document.getElementsByName("cantidad[]");
	var prec=document.getElementsByName("precio_compra[]");
	var sub=document.getElementsByName("subtotal");

	for (var i = 0; i < cant.length; i++) {
		var inpC=cant[i];
		var inpP=prec[i];
		var inpS=sub[i];

		inpS.value=inpC.value*inpP.value;
		document.getElementsByName("subtotal")[i].innerHTML=inpS.value.toFixed(2);
	}

	calcularTotales();
}

function calcularTotales(){
	var sub = document.getElementsByName("subtotal");
	var total=0.00;
	var simbolo="";

	for (var i = 0; i < sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
		igv=total*($("#impuesto").val()/100);
		var total_monto=total+igv;
		var igv_dec=igv.toFixed(2);

	}
	$.ajax({
url: '../Controllers/negocio.php?op=mostrar_simbolo',
type:'get',
dataType:'json',
success: function(sim){
	 simbolo=sim;
	 $("#total").html(simbolo +' '+ total.toFixed(2)); 
	$("#total_compra").val(total_monto.toFixed(2));
	 $("#most_total").html(simbolo + total_monto.toFixed(2));
	 $("#most_imp").html(simbolo + igv_dec);

	evaluar();
}

	});
	nombre_impuesto()
}
function nombre_impuesto(){
$.ajax({
url: '../Controllers/negocio.php?op=nombre_impuesto',
type:'get',
dataType:'json',
success: function(n){
	 nomp=n;
	 var valor_impuesto=$("#impuesto").val();
	 $("#valor_impuesto").html(nomp+' '+ valor_impuesto +"%");
	 	
	}

	});}
function evaluar(){

	if (detalles>0) 
	{
		$("#btnGuardar").show();
	}
	else
	{
		$("#btnGuardar").hide();
		cont=0;
	}
}

function eliminarDetalle(indice){
$("#fila"+indice).remove();
calcularTotales();
detalles=detalles-1;

}

init();