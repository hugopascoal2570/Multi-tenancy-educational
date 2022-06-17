@extends('adminlte::page')

@section('title', 'Matérias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('subjects.index') }}" class="active">Matérias</a></li>
    </ol>

    <h1>Matérias <a href="{{ route('subjects.create') }}" class="btn btn-success">Adicionar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('subjects.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control"
                    value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-success">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>
                                {{ $subject->name }}
                            </td>

                            <td style="width=10px;">
                                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $subjects->appends($filters)->links() !!}
            @else
                {!! $subjects->links() !!}
            @endif
        </div>
    </div>
@stop
