@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    <h1>Cadastrar Nova Sala de Aula</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('classrooms.store') }}" class="form" method="POST">
                @include('admin.pages.classroom._partials.form')
                @csrf
            </form>
        </div>
    </div>
@endsection
