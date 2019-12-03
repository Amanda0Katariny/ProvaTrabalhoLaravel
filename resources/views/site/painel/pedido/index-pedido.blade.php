@extends('adminlte::page')
@section('content')

<section class="content">
    <h1 class = "title-pg">Tabela de Pedidos</h1>

    <div class="row" style="align:center">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Pedidos</h3>
                <div class="pull-right">
                    <a href="{{route('pedido.create')}}" class="btn btn-success btn-sm ad-click-event">
                        <span class = "glyphicon glyphicon-plus"></span> Cadastrar
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered" class ="table">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:5px"><b> Código Pedido</th>
                            <th style="width:30px"><b> Cliente </b></th>
                            <th style="width:30px"> Total do Pedido</th>
                            <th style="width:20px"> Observações </th>
                            <th style="width:15px"> Ações </th>
                        </tr>
                    </thead>

                    @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->cliente->nome}}</td>
                        <td>{{number_format($pedido->total_pedido, 2)}}</td>
                        <td>{{$pedido->comentario}}</td>
                        <td class = "td-actions text-right" style="width:15%">

                            <a href="{{route('pedido.edit', $pedido->id)}}" class="btn btn-info" data-toggle="" data-placement="top" title ="Editar">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{route('pedido.show', $pedido->id)}}"  class="btn btn-warning" data-toggle="tooltip" data-placement="top" title ="Vizualizar">
                                <i class="fa fa-fw fa-eye"></i>
                            </a>
                            <a href="#" >
                                {{ Form::open(['action' => ['Painel\PedidoController@destroy', $pedido->id], 'class'=>'form-inline', 'method' => 'DELETE']) }}
                                {{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger', 'type' => 'submit', 'data-toggle'=>'tooltip', 'data-placement' =>'top', 'title' =>'Deletar'] ) }}
                            </a>
                        </td>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

