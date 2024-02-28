@extends('layouts.app')
@section('titulo', 'Página Inicial')
@section('conteudo')

    <h1 style="text-align: center;">Blog</h1>

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($materias as $materia)
                <div class="col-md-4 mb-4">
                    <!-- Card de Matéria -->
                    <div class="card">
                        <img src="{{ asset('storage/' . $materia->imagem) }}" alt="{{ $materia->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $materia->titulo }}</h5>
                            <p class="card-text">{{ $materia->descricao }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('materia.show', $materia->id) }}" class="btn btn-primary">Ver Matéria</a>
                                <a href="{{ route('materia.edit', $materia->id) }}" class="btn btn-primary">
                                    <i class="fas fa-pencil-alt"></i> Editar
                                </a>
                                <form action="{{ route('materia.destroy', $materia->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="pagination justify-content-center">
        @if ($materias->currentPage() > 1)
            <a href="{{ $materias->previousPageUrl() }}" class="page-link">Anterior</a>
        @else
            <span class="page-link disabled">Anterior</span>
        @endif

        <span class="page-link"> {{ $materias->currentPage() }} de {{ $materias->lastPage() }} </span>

        @if ($materias->hasMorePages())
            <a href="{{ $materias->nextPageUrl() }}" class="page-link">Próximo</a>
        @else
            <span class="page-link disabled">Próximo</span>
        @endif
    </div>

@endsection
