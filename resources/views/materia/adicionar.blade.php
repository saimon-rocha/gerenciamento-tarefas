@extends('layouts.app')

@section('conteudo')

    {!! Form::open(['route' => 'materia.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @include('materia.form')
    {!! Form::close() !!}

    @endsection
