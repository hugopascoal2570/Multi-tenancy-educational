@extends('adminlte::page')

@section('title', 'Turmas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('turmas.index') }}" class="active">Turmas</a></li>
    </ol>

    <h1>Turmas <a href="{{ route('turmas.create') }}" class="btn btn-success">Adicionar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('turmas.search') }}" method="POST" class="form form-inline">
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
                        <th width="500">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>
                                {{ $class->name }}
                            </td>
                            <td style="width=100px;">
                                <a href="{{ route('turmas.edit', $class->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('turmas.show', $class->id) }}" class="btn btn-warning">VER</a>
                                <a href="{{ route('turmas.teachers', $class->id) }}" class="btn btn-success">Professor(a)</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $classes->appends($filters)->links() !!}
            @else
                {!! $classes->links() !!}
            @endif
        </div>
    </div>
@stop
