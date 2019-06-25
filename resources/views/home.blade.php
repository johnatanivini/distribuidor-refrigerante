@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            {{__("messages.dashboard")}}
                        </div>
                        <div class="col-sm-6 text-right">
                            <a class="btn btn-outline-primary mr-1" href="#cadastroProduto" data-toggle="modal"><i class="fa fa-plus-circle"></i> Produto</a>
                            <a  class="btn btn-outline-info mr-1" href="#cadastroMarca" data-toggle="modal"><i class="fa fa-plus-circle"></i> Marca</a>
                            <a class="btn btn-outline-danger mr-1"  href="#cadastroTipo" data-toggle="modal"><i class="fa fa-plus-circle"></i> Tipos</a>
                            <a class="btn btn-outline-success mr-1" href="#cadastroLitragem" data-toggle="modal"><i class="fa fa-plus-circle"></i> Litragens</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Lista de Refrigerentes </h1>
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="filtroProdutos" action="/home">
                                <div class="row">
                                <div class="col-sm-2">
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
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>
                                            Tipos
                                        </label>
                                        <select name="marca" class="form-control">
                                            <option value="">Selecione</option>
                                            @foreach($tipos as $marca)
                                                <option value="{{$marca->id}}">{{$marca->descricao}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>
                                            Sabores
                                        </label>
                                        <select name="marca" class="form-control">
                                            <option value="">Selecione</option>
                                            @foreach($sabores as $marca)
                                                <option value="{{$marca->id}}">{{$marca->descricao}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>
                                            Litragem
                                        </label>
                                        <select name="marca" class="form-control">
                                            <option value="">Selecione</option>
                                            @foreach($litragem as $marca)
                                                <option value="{{$marca->id}}">{{$marca->descricao}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label>
                                                Quantidade
                                            </label>
                                            <input type="number" class="form-control" name="quantidade">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>
                                                Valor
                                            </label>
                                            <input type="text" class="form-control" name="valor">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <br>
                                            <button class="btn btn-primary mt-2">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>MARCA</th>
                            <th>TIPO</th>
                            <th>SABOR</th>
                            <th>LITROS</th>
                            <th>VALOR</th>
                            <th>QUANTIDADE</th>
                            <th width="30">
                                AÇÕES
                            </th>
                        </tr>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->marca->descricao}}</td>
                            <td>{{$produto->tipo->descricao}}</td>
                            <td>{{$produto->sabor->descricao}}</td>
                            <td>{{$produto->litragem->descricao}}</td>
                            <td>{{$produto->valor}}</td>
                            <td>{{$produto->quantidade}}</td>
                            <td>
                                <a href="/home/produto/editar/{{$produto->id}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="/home/produto/excluir/{{$produto->id}}" class="text-danger">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
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
                    <label>Sabor:</label>
                    <select id="marca" name="sabor" class="form-control">
                        <option value="">Selecione um sabor</option>
                        @foreach($sabores as $sabor)
                            <option value="{{$sabor->id}}">{{$sabor->descricao}}</option>
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
