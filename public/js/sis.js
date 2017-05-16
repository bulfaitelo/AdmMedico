$(function () {
  $('[data-toggle="popover"]').popover()
});
// Marcara MASK
$(function($){		       
	$("#tel_residencial").mask("(99) 9999-9999");		       
	$("#tel_comercial").mask("(99) 9999-9999");		       
	$("#tel_celular").mask("(99) 99999-9999");		
	$("#cpf").mask("999.999.999-99");
	$("#data_nascimento").mask("99/99/9999");
	$("#cep").mask("99999-999");
});