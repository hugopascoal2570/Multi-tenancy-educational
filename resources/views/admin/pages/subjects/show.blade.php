@extends('adminlte::page')

@section('title', "Detalhes da Matéria { $subject->name }")

@section('content_header')
    <h1>Detalhes da Matéria{{ $subject->name }}</h1>

@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="car-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{ $subject->name }}
                </li>
            </ul>
        </div>

    </div>
    <form action="{{ route('subjects.destroy', ['subject' => $subject->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Deletar a matéria {{ $subject->name }}</button>
    </form>
@stop
