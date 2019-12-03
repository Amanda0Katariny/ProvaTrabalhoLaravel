@extends('adminlte::page')
@section('content')

<br>
<section class="content">

    <h1 class = "title-pg">
        <a href="{{route('pedido.show')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Adicionar Item ao Pedido: <i>{{$pedido->id ?? 'Novo'}}</i>
    </h1>

    <div class="row" style="align:center">
        @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif

        @if(@isset($item))
            {!! Form::model($product, ['route'=> ['pedido.update', $pedido->id], 'class' => 'form', 'method' => 'put' ]) !!}
        @else
            {!! Form::open(['route' => 'pedido.store', 'class' => 'form']) !!}
        @endif
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Adicionar item</h3>
                    </div>
                    <div class="box-body">
                        <form role="form">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                            {!! Form::label('product', 'Produto') !!}
                                            {!! Form::select('product_id', $product->id, null, ['class' => 'form-control', 'id'=>'products']) !!}
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                {!! Form::label('quantidade','Quantidade', ['class'=>'control-label']) !!}
                                                {!! Form::number('quantidade', null, [ 'class'=>'form-control text-center','placeholder'=>'Quantidade', 'step'=>'1','min'=>'1','id'=>'quantidade']) !!}
                                            </div>
                                            </div>
                                    </div>
                                </div>
                        <div class="pull-right">
                            <a href="{{route('produtos.index')}}"  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</a>
                            {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

   @endsection








<!-- /**


@extends('adminlte::page')
@section('content')

<br>
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
                        <div class="row">
                            <div class="col-md-3">
                                <b>Numero do Pedido:</b> {{$pedido->id}}
                            </div>
                            <div class="col-md-4">
                                <b>Valor do Pedido:</b> {{$preco}}
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <b> Cliente:</b> {{$item->cliente->nome}}
                            </div>
                        </div>

                    <div class="box" style="">
                        <div>
                            <table id="example2" class="table table-bordered table-hover dataTable" >
                                <thead>
                                    <tr role="row">
                                        <th>Descrição dos Itens</th>
                                        <tr role="row">
                                            <th> Quantidade</th>
                                            <th> Produto</th>
                                            <th> Valor Unitário</th>
                                            <th> Valor Total</th>
                                            <th> Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($items as $item)
                                        <tr role="row" class="odd">
                                            <td>{{$item->quantidade}}</td>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->product->preco}}</td>
                                            <td>{{$item->sub_total}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#EditModal"
                                                data-title="Editar Item"
                                                data-id="{{$item->id}}"
                                                data-quantity="{{$item->quantidade}}"
                                                data-order_id="{{$pedido->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#DeleteModal"
                                            data-id="{{$item->id}}">
                                            <i class="glyphicon glyphicon-erase"></i>
                                        </button>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>

                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
                <!-- /.box-footer-->
            </div>
        </div>

        <div class="form-group">
            <label>Descrição:</label>
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => 'Digite aqui a descrição...']) !!}
        </div>
    </form>

    <!-- #<button class="btn btn-dark btn-add2 ">Enviar</button>
    -->

    <div class="pull-right">
        <a href="{{route('produtos.index')}}"  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</a>
        {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>
</div>
</div>

@endsection
**/ -->
