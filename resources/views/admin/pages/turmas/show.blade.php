@extends('adminlte::page')

@section('title', "Detalhes do perfil {$turma->name}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $turma->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $turma->name }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A TURMA: {{ $turma->name }}</button>
            </form>
        </div>
    </div>
@endsection
