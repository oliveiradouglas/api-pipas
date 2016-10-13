var alerta            = new Alerta();
var gerenciadorUrlApi = new GerenciadorUrlApi();

var tabelaPipas = new TabelaPipas();
var crudPipa    = new CrudPipa();
var gerenciadorCamposFormularioPipa = new GerenciadorCamposFormularioPipa();

$('#btnSalvar').click(function(){
	if (!gerenciadorCamposFormularioPipa.validarPreenchimento()) {
		alerta.exibir('Preencha os campos obrigatórios!', 'error');
		return;
	}

    if(!$(this).attr('data-id')) {
        crudPipa.cadastrar();
        return;
    }
    
    crudPipa.atualizar($(this).attr('data-id'));
});

$('#btnLimparCampos').click(function(){
   $('.containerCampos input, .containerCampos select, #fotoPipa, #foto').val('');
   $('#boxFotoPipa').removeAttr('src').hide();
   $('#btnSalvar').removeAttr('data-id');
});

$('#foto').change(function(){
	$('#formUploadFotoPipa').submit();
})

$("#formUploadFotoPipa").on('submit',(function(e){
	e.preventDefault();
	$('#boxFotoPipa')
		.removeAttr('src')
		.hide();
	$('#fotoPipa').val('');

	$.ajax({
		url: '/upload-imagem',
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		beforeSend: function() {
			swal({
				title: 'Aguarde...',
				type: 'info',
				showConfirmButton: false
			});
		},
		success: function(retorno){
			if (!retorno.status) {
				alerta.exibir(retorno.erro, 'error');
				return;
			}

			swal.close();
			$('#boxFotoPipa')
				.attr('src', '/img/' + retorno.foto)
				.show();
			$('#fotoPipa').val(retorno.foto);
		},
		error: function(){
			alerta.exibir('Erro ao fazer upload da imagem!', 'error');
		}        
	});
}));

$(document).ready(function(){
	if ($('#api_token').length == 0) 
		return;

    crudPipa.carregarTodas();
    $('.mask_currency').maskMoney();
});

$(document).on('click', '.glyphicon-pencil', function(){
   crudPipa.carregar($(this).data('id'));
});

$(document).on('click', '.glyphicon-remove', function(){
    alerta.confirmarExclusao($(this).data('id'));
});
