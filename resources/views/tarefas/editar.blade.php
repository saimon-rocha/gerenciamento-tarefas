@extends('layouts.app')

@section('conteudo')
    {!! Form::model($tarefas, [
        'route' => ['tarefas.update', $tarefas->id],
        'method' => 'PUT',
        'enctype' => 'multipart/form-data',
    ]) !!}
    @include('tarefas.form')
    {!! Form::close() !!}
@endsection
