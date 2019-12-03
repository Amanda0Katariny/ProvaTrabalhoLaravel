<!DOCTYPE html>
<html lang="pt-br">
    <head>
	    <meta charset="utf-8"/>
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	    <title>{{$title ?? 'Curso Laravel - Especializa TI'}}</title>
	    <link href="css/seu-stylesheet.css" rel="stylesheet"/>
        <script src="scripts/seu-script.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
        <style>
            .titulo{
            text-align: center;
            color: darkslategrey;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            width: 100%;
        }
            .nav1{
            text-decoration-color: aqua;
            color: darkgoldenrod;
            width: 50%;
            text-align: center;
        }


        </style>
        @yield('content')

        @stack('scripts')

    </body>
</html>
