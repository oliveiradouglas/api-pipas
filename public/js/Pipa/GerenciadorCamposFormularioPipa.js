function GerenciadorCamposFormularioPipa() {
    this.popular = function(pipa) {
        $('#cor').val(pipa.cor);
        $('#tamanho').val(pipa.tamanho);
        $('#preco').val(number_format(pipa.preco, 2, ',', '.'));

        if (pipa.foto != '') {            
            $('#fotoPipa').val(pipa.foto);
            $('#boxFotoPipa').attr('src', '/img/' + pipa.foto).show();
        }
        
        $('#btnSalvar').attr('data-id', pipa.id);
    }
    
    this.getCampos = function() {
        return {
            cor:     $('#cor').val(),
            tamanho: $('#tamanho').val(),
            preco:   $('#preco').val().replace(/\./g, '').replace(',', '.'),
            foto:    $('#fotoPipa').val()
        };
    }
    
    this.validarPreenchimento = function() {
    	var validado = true;
   		$('.containerCampos input, .containerCampos select').each(function(){
   			if ($(this).val() == '') {
   				validado = false;
   			}
   		});

   		return validado;
    }
}