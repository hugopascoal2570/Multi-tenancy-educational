@extends('adminlte::page')

@section('title', "Detalhes da categoria { $category->name }")

@section('content_header')
    <h1>Detalhes da Categoria{{ $category->name }}</h1>

@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="car-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{ $category->name }}
                </li>
                <li>
                    <strong>Descrição: </strong>{{ $category->description }}
                </li>

            </ul>
        </div>

    </div>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Deletar o {{ $category->name }}</button>
    </form>
@stop
