@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    <h1>Cadastrar Nova Turma</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('turmas.store') }}" class="form" method="POST">
                @include('admin.pages.turmas._partials.form')
                @csrf
            </form>
        </div>
    </div>
@endsection
