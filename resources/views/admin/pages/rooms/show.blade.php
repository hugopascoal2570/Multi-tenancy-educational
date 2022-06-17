@extends('adminlte::page')

@section('title', "Detalhes da Matéria { $room->name }")

@section('content_header')
    <h1>Detalhes da Matéria{{ $room->name }}</h1>

@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="car-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{ $room->name }}
                </li>
            </ul>
        </div>

    </div>
    <form action="{{ route('rooms.destroy', ['room' => $room->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Deletar a Sala {{ $room->name }}</button>
    </form>
@stop
