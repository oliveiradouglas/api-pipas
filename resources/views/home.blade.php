@extends('layouts.app')

@section('content')
<div class="container">
    <input type="hidden" id="api_token" value="{{ Auth::user()->api_token }}" />

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Pipa</div>
                <div class="panel-body">
                    <div class="containerCampos">                    
                        <div class="form-group col-md-12">
                            <label class="col-md-3">Cor <strong>*</strong></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="cor" id="cor" tabindex="1" maxlength="50" required />
                            </div>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-3">Tamanho <strong>*</strong></label> 
                            <div class="col-md-8">
                                <select name="tamanho" id="tamanho" tabindex="2" required>
                                    <option selected value="">Selecione o tamanho</option>

                                    @foreach ($tamanhos as $tamanho)
                                        <option value="{{ $tamanho }}"> {{ ucfirst($tamanho) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-3">Preço <strong>*</strong></label>
                            <div class="col-md-8">
                                <input class="form-control mask_currency" type="text" name="preco" id="preco" tabindex="3" maxlength="12" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-3">Foto</label>
                        <div class="col-md-8">
                            <form id="formUploadFotoPipa" method="post">
                                {{ csrf_field() }}
                                <input class="form-control" name="foto" id="foto" type="file" />
                            </form>

                            <img src="" id="boxFotoPipa" title="Foto da pipa" alt="Foto da pipa" class="boxFoto" width="100px" height="90px" />
                            <input class="form-control" type="hidden" maxlength="100" id="fotoPipa" tabindex="4" required />
                        </div>
                    </div>

                    <div class="form-group col-md-10">
                        <button type="button" class="btn btn-success pull-right marginL10" tabindex="5" id="btnSalvar">
                            Salvar
                        </button>
                        
                        <button type="reset" class="btn btn-danger pull-right" id="btnLimparCampos">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">        
        <table class="table table-bordered" id="tabelaPipas" style="display: none;">
            <thead>
                <tr>
                    <th>Cor</th>
                    <th>Tamanho</th>
                    <th>Preço</th>
                    <th>Foto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection