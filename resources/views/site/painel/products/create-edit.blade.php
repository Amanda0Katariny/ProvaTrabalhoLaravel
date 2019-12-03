@extends('adminlte::page')
@section('content')

<br>
<section class="content">

    <h1 class = "title-pg">
        <a href="{{route('produtos.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Gestão Produto: <i>{{$product->name ?? 'Novo'}}</i>
    </h1>

    <!--
        #<a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
        # Gestão de Produtos </h1>
    -->

    <div class="row" style="align:center">
        @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif

        @if(@isset($product))
            <!--
                # <form class="form" method="post" action="{{route('produtos.update', $product->id)}}">
                    # {!! method_field('PUT') !!}
                -->
            {!! Form::model($product, ['route'=> ['produtos.update', $product->id], 'class' => 'form', 'method' => 'put' ]) !!}
            @else
            <!--
                #<form class="form" method="post" action="{{route('produtos.store')}}">
                -->
                {!! Form::open(['route' => 'produtos.store', 'class' => 'form']) !!}
        @endif

                <!--
                    # {!! csrf_field() !!}
                    # <input type="hidden" name="_token" value="{{csrf_token()}}">
                -->

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastro De Produto</h3>
                    </div>

                    <div class="box-body">
                        <form role="form">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <label> Nome:</label>
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
                                    </div>

                                    <div class="col-xs-4">
                                        <label>Preço:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">R$</span>
                                            {!! Form::number('preco', null, ['class' => 'form-control', 'step'=>'0.0001', 'min'=>'0.0001']) !!}
                                        </div>
                                    </div>
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
