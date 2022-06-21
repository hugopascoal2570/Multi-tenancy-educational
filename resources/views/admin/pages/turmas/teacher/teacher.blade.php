@extends('adminlte::page')

@section('title', "Professores da turma {$turmas->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('turmas.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Professores da turma <strong>{{ $turmas->name }}</strong></h1>

    <a href="{{ route('turmas.teacher.available', $turmas->id) }}" class="btn btn-dark">adicionar novo professor</a>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>
                                {{ $teacher->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('turmas.teacher.detach', [$turmas->id, $teacher->id]) }}"
                                    class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

    </div>
@stop
