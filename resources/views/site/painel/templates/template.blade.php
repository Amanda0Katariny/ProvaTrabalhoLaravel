<!DOCTYPE html>
<html lang="pt-br">
    <head>

	    <title>{{$title ?? 'Painel Curso'}}</title>

        <!-- Bootstrap --> <!-- Bootstrap -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}">

    </head>
    <body>

        <div class = "container">
            @yield('content')
        </div>


    </body>
</html>
