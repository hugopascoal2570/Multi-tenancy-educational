@extends('adminlte::page')

@section('title', "Editar a Sala de Aula {$subject->title}")

@section('content_header')
    <h1>Editar a Matéria {{ $subject->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('subjects.update', $subject->id) }}" class="form" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.pages.subjects._partials.form')
            </form>
        </div>
    </div>
@endsection
