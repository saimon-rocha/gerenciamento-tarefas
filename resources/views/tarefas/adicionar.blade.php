@extends('layouts.app')

@section('conteudo')
    {!! Form::open(['route' => 'tarefas.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @include('tarefas.form')
    {!! Form::close() !!}
@endsection