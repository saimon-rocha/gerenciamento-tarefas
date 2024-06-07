@extends('layouts.app')
@section('titulo', 'Página Inicial')
@section('conteudo')
@php
    use Carbon\Carbon;
@endphp

<h1 class="text-center">Tarefas</h1>

<div class="table-responsive">
    <table class="table table-striped table-hover mx-auto">
        <thead>
            <tr>
                <th scope="col" class="text-center">Título</th>
                <th scope="col" class="text-center">Encerramento</th>
                <th scope="col" class="text-center">Setor</th>
                <th scope="col" class="text-center">Prioridade</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                @php
                    $urgenciaClasse = '';
                    switch ($tarefa->prioridade->nome) {
                        case 'Alta':
                            $urgenciaClasse = 'table-danger';
                            break;
                        case 'Média':
                            $urgenciaClasse = 'table-warning';
                            break;
                        case 'Baixa':
                            $urgenciaClasse = 'table-success';
                            break;
                    }
                @endphp
                <tr class="{{ $urgenciaClasse }}">
                    <td class="align-middle text-center"><a href="{{ route('tarefas.show', $tarefa->id) }}" class="text-decoration-none text-dark">
                        {{ $tarefa->titulo }}
                    </a></td>
                    <td class="align-middle text-center">{{ Carbon::parse($tarefa->data_termino)->format('d/m/Y') }}</td>
                    <td class="align-middle text-center">{{ $tarefa->setor->nome }}</td>
                    <td class="align-middle text-center">{{ $tarefa->prioridade->nome }}</td>
                    <td class="align-middle text-center">
                        <div class="btn-group" role="group">
                            <form action="{{ route('tarefas.concluir', $tarefa->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm" title="Concluir Tarefa">
                                    <i class="bi bi-check-circle"></i>
                                </button>
                            </form>
                            <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-primary btn-sm" title="editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" title="excluir" onclick="showConfirmationModal('Confirmação de Exclusão', 'Tem certeza de que deseja excluir esta tarefa?', function() { document.getElementById('deleteForm').submit(); });">
                                    <i class="bi bi-trash2-fill"></i>
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