<!DOCTYPE html>
<html lang="pt-br" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <!-- Importando o CSS do projeto -->
    <link rel="stylesheet" type="text/css" href="/css/tarefas.css" />
    <!-- Importando o Twind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative">
    
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Saimon - Rocha</span>
            </a>
        </div>
    </nav>
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="{{ route('tarefas.index') }}" class="text-gray-900 dark:text-white hover:underline"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('tarefas.create') }}"
                            class="text-gray-900 dark:text-white hover:underline">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Mensagens de Sucesso e Erro --}}
    @if (session('success'))
        <div id="successAlert"
            class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success alert!</span>{{ session('success') }}.
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Danger alert!</span> {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- Conteúdo do site -->
    <div class="container mx-auto px-4">
        @yield('conteudo')
    </div>

    <!-- Modal utilizado quando for deletar algo do sistema -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="confirmationModal">
        <div class="modal-dialog bg-white rounded-lg shadow-lg">
            <div class="modal-header flex justify-between items-center border-b p-4">
                <h1 class="modal-title text-lg font-semibold" id="modalTitle"></h1>
                <button type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none" id="modal-close">
                    &times;
                </button>
            </div>
            <div class="modal-body p-4" id="modalBody"></div>
            <div class="modal-footer flex justify-end border-t p-4">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600"
                    id="cancelButton">Cancelar</button>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ml-2"
                    id="confirmButton">Confirmar</button>
            </div>
        </div>
    </div>
    <!-- Modal Para Leitura da Tarefa -->
    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ isset($tarefa) ? $tarefa->titulo : '' }}
                        </h3>
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <div id="modalBody" class="p-4 md:p-5 space-y-4">
                        {{ isset($tarefa) ? $tarefa->descricao : '' }}
                    </div>
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Arquivos JS --}}
    <script src="/js/delete.js"></script>
    <script src="/js/alerts.js"></script>
    <script src="/js/leitura.js"></script>
    <script src="/js/filtro.js"></script>
</body>
</html>