@extends('adminlte::page')

@section('title', "Permissões disponíveis cargo {$turma->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('turmas.index') }}" class="active">Turmas</a></li>
    </ol>

    <h1>Professores disponíveis para a turma <strong>{{ $turma->name }}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('turmas.teacher.available', $turma->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('turmas.teacher.attach', $turma->id) }}" method="POST">
                        @csrf

                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>
                                    <input type="checkbox" name="teachers[]" value="{{ $teacher->id }}">
                                </td>
                                <td>
                                    {{ $teacher->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')

                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
       
    </div>
@stop
