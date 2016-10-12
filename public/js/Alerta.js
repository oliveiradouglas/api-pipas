function Alerta() {
    this.exibir = function(mensagem, tipo) {
        swal({
        	title: mensagem,
            type: tipo,
            html: true
        });
    }
    
    this.confirmarExclusao = function(id) {
        swal({   
            title: "Excluir pipa",   
            text: "Deseja realmente excluir a pipa?",   
            type: "warning",
            showCancelButton: true,   
            closeOnConfirm: false,   
            showLoaderOnConfirm: true 
        }, function(isConfirm){
            if (isConfirm) {
                crudPipa.deletar(id);
            }
        });
    }
}