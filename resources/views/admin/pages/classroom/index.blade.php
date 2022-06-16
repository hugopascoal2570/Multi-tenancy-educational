@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('classrooms.index') }}" class="active">Salas de Aula</a></li>
    </ol>

    <h1>Salas de Aula <a href="{{ route('classrooms.create') }}" class="btn btn-success">Adicionar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('classrooms.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classroom as $classrooms)
                        <tr>
                            <td>
                                {{ $classrooms->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('classrooms.show', $classroom->id) }}" class="btn btn-warning">VER</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $classroom->appends($filters)->links() !!}
            @else
                {!! $classroom->links() !!}
            @endif
        </div>
    </div>
@stop
