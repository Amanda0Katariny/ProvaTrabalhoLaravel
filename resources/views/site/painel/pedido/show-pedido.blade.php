@extends('adminlte::page')
@section('content')
<section class="content">

    <h1 class = "title-pg">
        <a href="{{route('produtos.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Dados do Pedido: <i>{{$pedido->name ?? 'Novo'}}</i>
    </h1>

    <div class="box-body">
        <form role="form">
            <div class="form-group">
                <div class="row">
                    <div class="box-body" style="">

                        <div class="col-md-3">
                            <b>Numero do Pedido:</b> {{$pedido->id}}
                        </div>
                        <div class="col-md-3">
                                <b> Cliente:</b> {{$pedido->cliente->nome}}
                            </div>
                        <div class="col-md-4">
                            <b>Data do Pedido:</b> {{ \Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y') }}
                        </div>
                        <div class="col-md-4">
                            <b>Valor do Pedido:</b> {{$pedido->total_pedido}}
                        </div>
                        <div class="col-md-3">
                            <b> Descrição:</b> {{$pedido->comentario}}
                        </div>
                    </div>

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
                            </table>

                </div>

<hr>
            <div>

                <a href = "{{url('site/painel/item/create-item', $pedido->id)}}"  class="btn btn-success pull-right h2">
                    <span class = "glyphicon glyphicon-plus"></span> Adicionar Item
                </a>

                {!! Form::open(['route' => ['item.index', $pedido->id], 'method' => 'DELETE']) !!}
                {!! Form::submit("Deletar Pedido: $pedido->id", ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            <div>

</section>
@endsection
