@extends('layouts.app')

@section('conteudo')
    {!! Form::model($materia, [
        'route' => ['materia.update', $materia->id],
        'method' => 'PUT',
        'enctype' => 'multipart/form-data',
    ]) !!}
    @include('materia.form')
    {!! Form::close() !!}
@endsection
