<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Supermercado FEMC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="/home">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Supermercado - CRUD
                </div>
                <div class="links">
                        <a href="/home">Home Supermercado FEMC</a>
                        <a href="site/painel/cliente">Cliente</a>
                        <a href="site/painel/produtos">Produtos</a>
                        {{-- <a href="site/categoria/{$id}">Categoria</a> --}}
                    </div>
                    <br>

              <!-- /* <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                */
                -->
            </div>
        </div>
    </body>
</html>


<!-- {{-- @extends('site.template.template1') //AULA ESPECIALIZATI - LARAVEL 5.3
@section('content')
<div>
<h1 class="titulo"><span class="glyphicon glyphicon-globe">Home Page do Site!</span></h1>
</div>

<ul class="nav nav-pills nav-fill" style="width:100%">
    <li class="nav-item">
        <a class="nav-link " href="site/home/lte">Home AdminLTE</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="site/categoria/{$id}">Categoria</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="site/painel/produtos">Produtos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="site/painel/contato">Contato</a>
    </li>
</ul>
<br>
{{$teste ?? 'Não Existe'}}
    <br>
{{ $xss }}
<!-- //  {{!! $xss !!}}
 -->
    <br>

    @if($var1 == '1234')
        <p> É igual </p>
    @else
        <p> É Diferente </p>
    @endif

    <br>
    @unless( $var1 == 1234 )
        <p>Não é Igual</p>
    @endunless

    <br>
    @for( $i = 0; $i < 10; $i++ )
        <p>Valor: {{$i}}</p>
    @endfor
    <br>
    <!--//
       // @if( count($arrayData) > 0 )
        //@foreach ($arrayData as $array)
         //   <p>Valor do Array Foreach: {{$array}}</p>
       // @endforeach
        //@else
          //  <p>Não existe itens para serem impressos</p>
       // @endif
    -->
        @forelse ($arrayData as $array)
            <p>Valor do Array ForElse: {{$array}}</p>
         @empty
            <p>Não exite itens</p>
        @endforelse

    @php
    @endphp

        @include('site.includes.sidebar', compact('var1'))
        <br>
        <a href="{{route('produtos.index')}}" class = "btn btn-danger btn-add">
            <span class = "glyphicon glyphicon-shopping-cart"></span> Produtos </a>
@endsection

@push('scripts')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@endpush --}}
-->
