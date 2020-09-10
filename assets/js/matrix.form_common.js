$(document).ready(function() { 	
	$('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
        });

	//------------- Tags plugin  -------------//
	
	$("#tags").select2({
            tags:["red", "green", "blue", "orange"]
	});

	//------------- Masked input fields -------------//
	$("#mask-phone").mask("(999) 999-9999", {completed:function(){alert("Callback action after complete");}});
	$("#mask-phoneExt").mask("(999) 999-9999? x99999");
	$("#mask-phoneInt").mask("+40 999 999 999");
	$("#mask-date").mask("99/99/9999");
	$("#mask-ssn").mask("999-99-9999");
	$("#mask-productKey").mask("a*-999-a999", { placeholder: "*" });
	$("#mask-eyeScript").mask("~9.99 ~9.99 999");
	$("#mask-percent").mask("99%");
        $("._mask_telefone").mask("(99) 9999-9999?9");
        $("._mask_placa").mask("aaa - 9999"); 
        $("._mask_ano").mask("9999"); 
        $("._mask_cep").mask("99999-999"); 
        $("._cpf").mask("999.999.999-99");

	
    
	//------------- Datepicker -------------//
	if($('#datepicker').length) {
		$("#datepicker").datepicker({
			showOtherMonths:true
		});
	}
	if($('#datepicker-inline').length) {
		$('#datepicker-inline').datepicker({
	        inline: true,
		showOtherMonths:true
	    });
	}

	//------------- Combined picker -------------//
	if($('#combined-picker').length) {
		$('#combined-picker').datetimepicker();
	}

	//Boostrap modal
	$('#myModal').modal({ show: false});
	
	//add event to modal after closed
	$('#myModal').on('hidden', function () {
	  	console.log('modal is closed');
	})

});//End document ready functions
