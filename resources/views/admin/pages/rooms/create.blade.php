@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')
    <h1>Cadastrar Nova Sala de Aula</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('rooms.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.pages.rooms._partials.form')
            </form>
        </div>
    </div>
@endsection
