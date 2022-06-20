@extends('adminlte::page')

@section('title', "Editar a empresa {$turmas->name}")

@section('content_header')
    <h1>Editar a empresa {{ $turmas->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('turmas.update', $turmas->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.pages.turmas._partials.form')
            </form>
        </div>
    </div>
@endsection
