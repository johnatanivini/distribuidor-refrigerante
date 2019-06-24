@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{__("messages.dashboard")}} </div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Lista de Refrigerentes </h1>
                    <div class="row">
                        <div class="col-sm-12">
                            <form>
                                <div class="form-group">
                                    <label>
                                        Marca
                                    </label>
                                    <select name="marca" class="form-control">
                                        <option value="">Selecione</option>
                                        @foreach($marcas as $marca)
                                            <option value="{{$marca->id}}">{{$marca->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                    @if(count($produtos) > 0)
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->marca->descricao}}</td>
                            <td>{{$produto->tipo->descricao}}</td>
                            <td>{{$produto->sabor->descricao}}</td>
                            <td>{{$produto->litragem->descricao}}</td>
                            <td>{{$produto->item->valor}}</td>
                            <td>{{$produto->quantidade->quantidade}}</td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="7">{{ __("messages.table_nothing") }}</td>
                        </tr>
                    @endif
                    </table>
                    @if(count($produtos) > 0)
                        {{$produtos->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cadastroProduto" tabindex="-1" role="dialog" aria-labelledby="cadastroProdutoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroProdutoLabel">Cadastro de Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formProduto" action="{{route('produto.salvar')}}" method="post">
            <div class="modal-body">

                    <div class="form-group">
                        <label>Marca:</label>
                        <select id="marca" name="marca" class="form-control">
                            <option value="">Selecione uma marca</option>
                            @foreach($marcas as $marca)
                                <option value="{{$marca->id}}">{{$marca->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <select id="tipo" name="tipo" class="form-control">
                            <option value="">Tipo de Refrigerente</option>
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Litragem:</label>
                        <select id="litragem" name="litragem" class="form-control">
                            <option value="">Escolha uma litragem</option>
                            @foreach($litragem as $litro)
                                <option value="{{$litro->id}}">{{$litro->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quantidade:</label>
                        <input type="number" value="" min="0" max="999999"  class="form-control"  name="quantidade" />
                    </div>
                    <div class="form-group">
                        <label>Valor unitário:</label>
                        <input  name="valor" id="valor" value="" class="form-control money" />
                    </div>
                    <input type="hidden" name="produto_id" />
              @csrf

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" id="salvarProduto" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
