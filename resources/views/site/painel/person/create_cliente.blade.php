@extends('adminlte::page')
@section('content')
<br>
<section class="content">

    <h1 class = "title-pg">
        <a href="{{route('cliente.index')}}">
            <span class = "glyphicon glyphicon-circle-arrow-left"></span>
        </a>
        Cadastro de Clientes: <i>{{$cliente->nome ?? 'Novo'}}</i>
    </h1>

    <div class="row" style="align:center">

        @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif

        @if(@isset($cliente))
        {!! Form::model($cliente, ['route'=> ['cliente.update', $cliente->id], 'class' => 'form', 'method' => 'put' ]) !!}
        @else
        {!! Form::open(['route' => 'cliente.store', 'class' => 'form']) !!}
        @endif
        <br>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastro De Clientes</h3>
            </div>

            <div class="box-body">
                <form role="form">
                    <div class="form-group">

                        <div class="row">
                            <div class="col-xs-5">
                                <label>Nome:</label>
                                {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                            </div>

                            <div class="col-xs-4">
                                <label>CNPJ:</label>
                                {!! Form::text('CNPJ', null, ['class' => 'form-control', 'placeholder'=>'CNPJ','maxlength'=>'13','id'=>'CNPJ']) !!}
                            </div>

                            <div class="col-xs-2">
                                <label>Data de Cadastro:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {{ Form::date('data_cadastro', null,['class' => 'form-control pull-right'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="pull-right">
                        <a href="{{route('cliente.index')}}"  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</a>
                        {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
