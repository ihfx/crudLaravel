<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Otimizacao para dispositivos moveis -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Importacao do boostrap -->
        <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" >

        <!-- CSS para o background do sistema -->
        <style>
            body{
                background-color: #341948;
            }
        </style>

    </head>
<body>
    @yield('conteudo')
    
    <!-- // Importacao do script com a Funcao AJAX para Deletar registros, validando o token CSRF -->
    <script src='{{url("assets/js/javascript.js")}}'></script>
</body>
</html>