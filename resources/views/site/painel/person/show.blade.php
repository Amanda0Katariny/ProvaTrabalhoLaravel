@extends('adminlte::page')
@section('content')

    <h1 class = "title-pg">
        <a href="{{route('cliente.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Cliente: <b>{{$cliente->nome}}</b>
    </h1>
    <br>
    <br>
    <p><b>Código: </b>{{$cliente->id}}</p>
    <p><b>Nome: </b>{{$cliente->nome}}</p>
    <p><b>CNPJ: </b>{{$cliente->CNPJ}}</p>
    <p><b>Data de Cadastro: </b>{{Carbon\Carbon::parse($cliente->data_cadastro)->format('d/m/Y')}}</p>

    <hr>

    @if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    <hr>

    {!! Form::open(['route' => ['cliente.destroy', $cliente->id], 'method' => 'DELETE']) !!}
    {!! Form::submit("Deletar Cliente: $cliente->nome", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@endsection
