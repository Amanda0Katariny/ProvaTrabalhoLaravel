@extends('adminlte::page')
@section('content')
<br>
<section class="content">
    <h1 class = "title-pg">
        <a href="{{route('produtos.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Produto: <b>{{$product->name}}</b>
    </h1>
    <br>
    <p><b>Ativo: </b>{{$product->active}}</p>
    <p><b>Número: </b>{{$product->id}}</p>
    <p><b>Preço: </b>{{$product->preco}}</p>
    <p><b>Descrição: </b>{{$product->description}}</p>

    <hr>

    @if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    <hr>

    {!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'DELETE']) !!}
    {!! Form::submit("Deletar Produto: $product->name", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


    @endsection
