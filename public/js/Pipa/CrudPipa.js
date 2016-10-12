function CrudPipa() {
    this.carregarTodas = function() {
        $.ajax({
            url: gerenciadorUrlApi.montarUrl('pipas'),
            type: 'GET',
            dataType: 'json',
            beforeSend: function() {
            	tabelaPipas.limparEOcultar();
            },
            success: function(resultado) {
                if(!resultado.status) {
                    alerta.exibir(resultado.erro, 'error');
                    return;
                }
                
                if (resultado.pipas.length == 0) 
                	return;

                tabelaPipas.popularEExibir(resultado.pipas);
            },
            error: function(erro) {
                alerta.exibir('Erro ao carregar as pipas!', 'error');
            }
        });
    }

    this.carregar = function(id) {
        $.ajax({
            url: gerenciadorUrlApi.montarUrl('pipa/' + id),
            type: 'GET',
            dataType: 'json',
            beforeSend: function() {
                $('#btnLimparCampos').trigger('click');
            },
            success: function(resultado) {
                if(!resultado.status) {
                    alerta.exibir(resultado.erro, 'error');
                    return;
                }
                
                gerenciadorCamposFormularioPipa.popular(resultado.pipa);
            },
            error: function() {
                alerta.exibir('Erro ao carregar a pipa!', 'error');
            }
        });
    }
    
    this.cadastrar = function() {
        enviarRequisicao(gerenciadorUrlApi.montarUrl('pipa'), 'POST');
    }
    
    this.atualizar = function(id) {
        enviarRequisicao(gerenciadorUrlApi.montarUrl('pipa/' + id), 'PUT');
    }
    
    this.deletar = function(id) {
        enviarRequisicao(gerenciadorUrlApi.montarUrl('pipa/' + id), 'DELETE');
    }
    
    var enviarRequisicao = function(url, metodoHttp) {
        $.ajax({
            url: url,
            type: (metodoHttp == 'PUT' ? 'POST' : metodoHttp),
            dataType: 'json',
            data: $.extend(
            	gerenciadorCamposFormularioPipa.getCampos(), 
            	{_method: metodoHttp}
            ),
            success: function(resultado) {
                if(!resultado.status) {
                    alerta.exibir(resultado.erro, 'error');
                    return;
                }
                
                alerta.exibir('Ação realizada com sucesso!', 'success');
                $('#btnLimparCampos').trigger('click');
                crudPipa.carregarTodas();
            },
            error: function(erro) {
                alerta.exibir('Ocorreu algum erro!', 'error');
            }
        });
    }
}