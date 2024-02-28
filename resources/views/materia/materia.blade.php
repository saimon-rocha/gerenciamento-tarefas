@extends('layouts.app')
@section('titulo', $materia->titulo)
@section('conteudo')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card de Matéria -->
                <div class="card">
                    <img src="{{ asset('storage/' . $materia->imagem) }}" alt="{{ $materia->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $materia->titulo }}</h5>
                        <p class="card-text">{{ $materia->descricao }}</p>
                        <p class="card-text">{{ $materia->texto_completo }}</p>
                        <p class="card-text"><small class="text-muted">Publicado em:
                                {{ $materia->data_de_publicacao }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
