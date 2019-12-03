@extends('adminlte::page')

@section('content')
<br>
<section class="content">
    <h1 class = "title-pg">Tabela de Produtos</h1>

    <div class="row" style="align:center">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Produtos</h3>
                <div class="pull pull-right">
                    <a href="{{route('produtos.create')}}" class="btn btn-success btn-sm ad-click-event">
                        <span class = "glyphicon glyphicon-plus"></span><b> Cadastrar </b>
                    </a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered" class ="table">
                    <thead class="thead-light">
                        <tr>
                            <th> Código </th>
                            <th> Nome </th>
                            <th> Preço </th>
                            <th> Descrição </th>
                            <th style="width:40px ; text-align:center"> Ações </th>
                        </tr>
                    </thead>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{number_format($product->preco, 2)}}</td>
                        <td>{{$product->description}}</td>

                        <!-- #a href = "{{url("/painel/produtos/{$product->id}/edit")}}" class = "actions edit">
                            # <span class = "glyphicon glyphicon-pencil"></span>
                            # </a>
                        -->

                        <td class = "td-actions text-right" style="width:15%">

                            <a href="{{route('produtos.edit', $product->id)}}" class="btn btn-info" data-toggle="" data-placement="top" title ="Editar">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href = "{{route('produtos.show', $product->id)}}"  class="btn btn-warning" data-toggle="tooltip" data-placement="top" title ="Vizualizar">
                                <i class="fa fa-fw fa-eye"></i>
                            </a>

                            <a href="#" >
                                {{ Form::open(['action' => ['Painel\ProdutoController@destroy', $product->id], 'class'=>'form-inline', 'method' => 'DELETE']) }}
                                {{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger', 'type' => 'submit', 'data-toggle'=>'tooltip', 'data-placement' =>'top', 'title' =>'Deletar'] ) }}
                            </a>

                            <!-- /**
                                <a href="{{$product->id}}" id="{{$product->id}}" class="btn btn-danger" data-toggle="modal" data-placement="top" title ="Apagar Forma Pagamento" data-target="#modalConfirmDelete">
                                    <i class="fa fa-trash"></i>
                                    {!! Form::open(['action'=>['Painel\ProdutoController@destroy', $product->id],'class'=>'hidden','method'=>'DELETE', 'id'=>'modalConfirmDelete'.$product->id]) !!}
                                    {!! Form::close() !!}
                                </a>

                                */ -->
                            </td>

                            <!-- /**
                                <a href = "{{route('produtos.edit', $product->id )}}">
                                    <button type="button" class="btn btn-info ">
                                        <i class="fa fa-pencil"></i></button>
                                    </a>

                                    <a href = "{{route('produtos.show', $product->id)}}">
                                        <button type="button" class="btn btn-warning">
                                            <i class="glyphicon glyphicon-eye-open"></i></button>
                                        </a>

                                        <a href="#">
                                            {{ Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'DELETE']) }}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'data-toggle'=>'tooltip', 'data-placement' =>'top', 'title' =>'Deletar Cliente'] ) }}
                                        </a>
                                        */ -->
                                    </div>

                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                {!! $products->links() !!}

                <!-- //1º metodo <a href="{{url('/site/painel/produtos/create')}}" class = "btn btn-danger btn-add">
                    //<span class = "glyphicon glyphicon-plus"></span> Cadastrar </a>
                -->

            </section>
            @include('layouts.utilities.modal_excluir', ['modal'=>'modalConfirmDelete', 'idForm'=>'modalConfirmDelete', 'message'=>'Você tem certeza que deseja Apagar este Registro!'])
            @endsection
