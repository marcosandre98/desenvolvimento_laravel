$('#BtnUsuario').click(function(event) {
	$.ajax({
		url: 'http://localhost:8000/usuario',
		type: 'POST',		
		data: { nombre:$('#nombre').val(),
				_token:$('input[name=_token]').val()
			 },
	})
	.done(function(rta) {
		console.log(rta);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
});



/**
 * [Ajax con FORM: permite realizar un ajax con un FORM]
 * @param  <form data-route="/Ruta" data-method="POST o GET o PUT.." id="formNombreID">
 * @param  <button type="submit" data-form="formNombreID" class="btnAjax">
 * @return {[json]} [Con d.out se indica la opción del retorno del ajax, allí se pueden agregar más opciones GENERICAS]
 */
$(document).on('click', ".btnAjax", function () {	

	$('.msg-error').addClass('hidden');
	$('.form-group').removeClass('has-error'); //AGREGAR
	$(this).css('pointer-events', 'none');
	
	idForm = $(this).data('form');
	route = $('#'+idForm).data('route');
	method = $('#'+idForm).data('method');
	
	$.ajax({
			url: route,
			type: method,
			data: $('#'+idForm).serialize()
		})
		.done(function(d){
			
			console.log(d);//Comentar en producción
			
			$('.btnAjax').css('pointer-events', 'visible');
			
			if (d.status){
				$('#'+idForm)[0].reset()
				outAjax(d);
			}else{
				showError(d.errors);
			}

		})
		.fail(function(d){
			console.log("error: "+d);
		});
	return false;//Evita el reload		
});

function showError(errors){
	$.each(errors,function(name, val) {							
		$('#err_'+name).html('<b>'+val[0]+'</b>');
		$('#err_'+name).removeClass('hidden');
		$('#err_'+name).parent().parent('.form-group').addClass('has-error');//AGREGAR
	});
}

function outAjax(d){
	if (d.out=='redirect'){
		document.location = d.route;							
	}
	else if (d.out=='reload'){
		document.location.reload();
	}
	else if (d.out=='alert'){
		bootbox.alert({title:d.title, message:d.html});
	}
	else if (d.out=='dialog'){//AGREGAR
		bootbox.dialog({title: d.title,message:d.html,buttons:{}});
	}
}

function buttonsTable(show,edit,deleted,editView=false){	
	btn = '<div class="hidden-sm hidden-xs action-buttons">';
	if (show!=''){
		btnShow="onclick='modal(\""+show+"\")'";
		btn += "<a class='blue' "+btnShow+" href='#'>";
    	btn += '<i class="ace-icon fa fa-search-plus bigger-130"></i></a>&nbsp;&nbsp;';
	}	
	if (edit!=''){
		if (editView){
			btnEdit="onclick='view(\""+edit+"\")'";
		}else{
			btnEdit="onclick='modal(\""+edit+"\")'";
		}
		btn += '<a class="green" '+btnEdit+' href="#">';
    	btn += '<i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;';
	}    
    if (deleted!=''){
    	btnDelete="onclick='destroy(\""+deleted+"\")'";
    	btn += '<a class="red" '+btnDelete+' href="#">';
    	btn += '<i class="ace-icon fa fa-trash-o bigger-130"></i></a>';
    }   
    btn += '</div><div class="hidden-md hidden-lg"><div class="inline pos-rel">';
    btn += '<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">';
    btn += '<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i></button>';
    btn += '<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">';
    if (show!=''){
    	btn += '<li><a href="#" class="tooltip-info" data-rel="tooltip" title="View" '+btnShow+'>';
    	btn += '<span class="blue"><i class="ace-icon fa fa-search-plus bigger-120"></i></span></a></li>';
	}	
	if (edit!=''){
		btn += '<li><a href="#" class="tooltip-success" data-rel="tooltip" title="Edit" '+btnEdit+'>';
    	btn += '<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>';
	}    
    if (deleted!=''){
    	btn += '<li><a href="#" class="tooltip-error" data-rel="tooltip" title="Delete" '+btnDelete+'>';
    	btn += '<span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span></a></li>';
    }
    btn += '</ul></div></div>';
    return btn;    
}

function view(url){
	window.location.replace(url);
}

function modal(route){
	$.ajax({url:route,type:'GET'}).done(function(data) {
		if(data.size!=undefined){size=data.size}else{size='medium'}		
		modalAlert = bootbox.alert({
                    title:data.title, 
                    message:data.html,
                    size:size
                }); //Size: large, small		
	}).fail(function(data){console.log(data);});
}

function destroy(route){
	bootbox.confirm({
		title:'Confirmación',
	    message: '¿Está seguro de eliminar el registro?',
	    buttons: {
	        confirm: {label: 'Si, seguro.',className: 'btn-danger'},
	        cancel: {label: 'No',className: 'btn-default'}
	    },
	    callback: function (result) {
	    	if (result){
	    		token = {_token:window.Laravel.csrfToken};
				$.ajax({url:route,type:'DELETE',data:token}).done(function(data) {		
					outAjax(data);
				}).fail(function(data){console.log(data);});
	    	}	        
	    }
	});	
}