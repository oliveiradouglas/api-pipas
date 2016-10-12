function GerenciadorUrlApi() {
	this.PREFIXO = '/api/v1/';
	this.SUFIXO  = '?api_token=' + $('#api_token').val();
	
	this.montarUrl = function(recurso) {
		return this.PREFIXO + recurso + this.SUFIXO;
	}
}