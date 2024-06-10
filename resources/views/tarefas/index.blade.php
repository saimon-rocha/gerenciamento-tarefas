@extends('layouts.app')
@section('titulo', 'Página Inicial')
@section('conteudo')
    @php
        use Carbon\Carbon;
    @endphp

    <h1 class="text-5xl font-extrabold dark:text-black text-center mb-8">
        @if (isset($filtrado) && $filtrado)
            Tarefas Filtradas
        @else
            Tarefas
        @endif
    </h1>

    <div class="overflow-x-auto mx-auto">
        <table class="min-w-full table-fixed border-collapse">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Título</th>
                    <th scope="col" class="text-center flex justify-center items-center">
                        Encerramento
                        <a href="{{ route('tarefas.filtrar', ['ordenacao' => 'data_termino_asc']) }}" class="prioridade-link ml-2">
                            <svg class="w-6 h-6 text-gray-800 dark:text-black" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </a>
                    </th>
                    <th scope="col" class="text-center">Setor</th>
                    <th scope="col" class="text-center flex justify-center items-center">
                        Prioridade
                        <a href="{{ route('tarefas.filtrar', ['ordenacao' => 'prioridade']) }}" class="prioridade-link ml-2">
                            <svg class="w-6 h-6 text-gray-800 dark:text-black" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </a>
                    </th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                    @php
                        $prioridade = isset($filtrado) ? $tarefa->prioridade_nome : $tarefa->prioridade->nome;
                    @endphp

                    @switch($prioridade)
                        @case('Alta')
                            @php $urgenciaClasse = 'bg-red-500 text-white'; @endphp
                        @break

                        @case('Média')
                            @php $urgenciaClasse = 'bg-yellow-500 text-white'; @endphp
                        @break

                        @case('Baixa')
                            @php $urgenciaClasse = 'bg-blue-500 text-white'; @endphp
                        @break

                        @default
                            @php $urgenciaClasse = ''; @endphp
                    @endswitch
                    <tr class="{{ $urgenciaClasse }} hover:bg-opacity-75">
                        <td class="align-middle text-center px-4 py-2">
                            <a href="#" onclick="showModal('{{ $tarefa->titulo }}', '{{ $tarefa->descricao }}')"
                                class="no-underline text-inherit">
                                {{ $tarefa->titulo }}
                            </a>
                        </td>
                        <td class="align-middle text-center px-4 py-2">
                            {{ Carbon::parse($tarefa->data_termino)->format('d/m/Y') }}</td>
                        <td class="align-middle text-center px-4 py-2">
                            {{ isset($filtrado) ? $tarefa->setor_nome : $tarefa->setor->nome }}</td>
                        <td class="align-middle text-center px-4 py-2">
                            {{ isset($filtrado) ? $tarefa->prioridade_nome : $tarefa->prioridade->nome }}</td>
                        <td class="align-middle text-center px-4 py-2">
                            <div class="inline-flex" role="group">
                                <form action="{{ route('tarefas.concluir', $tarefa->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded"
                                        title="Concluir Tarefa">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                        </svg>
                                    </button>
                                </form>
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded mx-1"
                                    title="editar">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST"
                                    id="deleteForm-{{ $tarefa->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded"
                                        title="excluir"
                                        onclick="showConfirmationModal('Confirmação de Exclusão', 'Tem certeza de que deseja excluir esta tarefa?', function() { document.getElementById('deleteForm-{{ $tarefa->id }}').submit(); });">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
