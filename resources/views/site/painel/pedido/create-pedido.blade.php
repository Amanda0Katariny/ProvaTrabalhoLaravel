@extends('adminlte::page')
@section('content')
<section class="content">

    <h1 class = "title-pg">
        <a href="{{route('pedido.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Gestão Pedidos: <i>{{$pedido->id ?? 'Novo'}}</i>
    </h1>
    <div class="row" style="align:center">
        @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif

        @if(@isset($pedido))
        {!! Form::model($pedido, ['route'=> ['pedido.update', $pedido->id], 'class' => 'form', 'method' => 'put' ]) !!}
        @else
        {!! Form::open(['route' => 'pedido.store', 'class' => 'form']) !!}
        @endif
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastro De Pedido</h3>
            </div>

            <div class="box-body">
                <form role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-5">
                                {!! Form::label('cliente', 'Cliente') !!}
                                {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control', 'id'=>'clientes']) !!}
                            </div>
                            <div class="col-xs-2">
                                <label>Data do Pedido:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {{ Form::date('data_pedido', null,['class' => 'form-control pull-right'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- /**
                    <div class="divisory-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">itens do Pedido</h3>
                        </div>
                    </div>
                    <div class="box-header">
                        <br>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-xs-6">
                                    {!! Form::label('product', 'Produto') !!}
                                    {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'id'=>'products']) !!}
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('quantidade','Quantidade', ['class'=>'control-label']) !!}
                                        {!! Form::number('quantidade', null, [ 'class'=>'form-control text-center','placeholder'=>'Quantidade', 'step'=>'1','min'=>'1','id'=>'quantidade']) !!}
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('valor_unit','Item', ['class'=>'control-label']) !!}
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <b>R$</b>
                                            </div>
                                            {!! Form::number('valor_unit',null ,[ 'class'=>'form-control text-center','value'=>'', 'id'=>'valorUnit', 'step'=>'0.01','min'=>'0']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a data-toggle="button" class="btn btn-success pull-right h1"> Adicionar </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text">
                                    <tr>
                                        <th><b>Produto</b></th>
                                        <th><b>Quantidade</b></th>
                                        <th><b>Valor Unitário</b></th>
                                        <th><b>SubTotal</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($pedido))
                                    @foreach($pedido->product as $products)
                                    <tr>
                                        <td hidden>
                                            <input type="text" value={{$products->name}}>
                                        </td>
                                        <td class="text-center" >{{$product->nome}}</td>
                                        <td class="text-center">
                                            <input type="text" style="width: 50px;" value={{$product->quantidade}}></input>
                                        </td>
                                        <td>
                                            <input type="text" value={{$produto->preco}} />
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                **/ -->
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label>Descrição:</label>
                                {!! Form::textarea('comentario', null, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => 'Digite aqui a descrição...']) !!}
                            </div>

                                        <br>
                             <div class="pull-right">
                                 <a href="{{route('pedido.index')}}"  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</a>
                                 {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                                 {!! Form::close() !!}
                             </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('layouts.utilities.modal_excluir_teste', ['modal'=>'delete-modal', 'idForm'=>'modalConfirmDelete', 'message'=>'Você tem certeza que deseja Apagar este Registro!'])
@endsection
