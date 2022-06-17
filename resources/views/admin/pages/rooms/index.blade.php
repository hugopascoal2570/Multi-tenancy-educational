@extends('adminlte::page')

@section('title', 'Salas de Aula')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('rooms.index') }}" class="active">Salas de Aula</a>
        </li>
    </ol>

    <h1>Salas de Aula <a href="{{ route('rooms.create') }}" class="btn btn-success">Adicionar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('rooms.search') }}" method="POST" class="form form-inline">
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
                        <th>Número da Sala</th>
                        <th>Hora de início</th>
                        <th>Hora de Saida</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>
                                {{ $room->name }}
                            </td>
                            <td>
                                {{ $room->numberRoom }}
                            </td>
                            <td>
                                {{ $room->start }}
                            </td>
                            <td>
                                {{ $room->end }}
                            </td>

                            <td style="width=30px;">
                                <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $rooms->appends($filters)->links() !!}
            @else
                {!! $rooms->links() !!}
            @endif
        </div>
    </div>
@stop
