<!doctype html>
<html lang="pt-br" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Importando o CSS DO PROJETO -->
    <link rel="stylesheet" type="text/css" href="/css/tarefas.css" />
    <!-- Icones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body class="relative">
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gerenciamento de Tarefas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tarefas.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tarefas.create') }}">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteudo do site -->
    <div class="container-fluid">
        @yield('conteudo')
    </div>

    {{-- <!-- Modal de sucesso -->
    @if (session('sucesso'))
        <div class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-bold text-green-500">Sucesso!</h2>
                    <button class="text-gray-500 hover:text-gray-700" onclick="fecharModal()">Fechar</button>
                </div>
                <p class="text-gray-800 mt-2">{{ session('sucesso') }}</p>
            </div>
        </div>
    @endif --}}

</body>
</html>
