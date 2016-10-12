function TabelaPipas() {
	var tabela = $('#tabelaPipas');
    this.popularEExibir = function(pipas) {
        var tbody = '';
        
        $.each(pipas, function(i, pipa){
            tbody += criarLinha(pipa);
        });

        tabela
        	.show()
        	.find('tbody').html(tbody);
    }
    
    var criarLinha = function(pipa) {
        var linhaPipa = '';
        
        linhaPipa += '<tr>';
        linhaPipa += '<td>' + pipa.cor + '</td>';
        linhaPipa += '<td>' + pipa.tamanho.charAt(0).toUpperCase() + pipa.tamanho.slice(1) + '</td>';
        linhaPipa += '<td>' + number_format(pipa.preco, 2, ',', '.') + '</td>';
        linhaPipa += '<td class="text-center">' + montarPreviewFotoPipa(pipa.foto) + '</td>';
        linhaPipa += '<td class="text-center">' + criarAcoes(pipa.id) + '</td>';
        linhaPipa += '</tr>';

        return linhaPipa;
    }

    var montarPreviewFotoPipa = function(foto) {
        if (foto == '') 
            return '';

        return '<img src="/img/' + foto + '" width="60px" height="45px" title="Foto da pipa" alt="Foto da pipa" />';
    }
    
    var criarAcoes = function(id) {
        var botoes = new Array();
        botoes.push('<button type="button" class="btn btn-default glyphicon glyphicon-pencil" data-id="' + id + '"></button>');
        botoes.push('<button type="button" class="btn btn-danger glyphicon glyphicon-remove" data-id="' + id + '"></button>');
        
        return botoes.join(' ');
    }

    this.limparEOcultar = function() {
    	tabela
    		.hide()
    		.find('tbody')
    		.empty();
    }
}
