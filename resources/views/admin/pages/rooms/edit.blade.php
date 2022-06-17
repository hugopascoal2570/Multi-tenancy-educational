@extends('adminlte::page')

@section('title', "Editar a Matéria {$room->name}")

@section('content_header')
    <h1>Editar a Matéria {{ $room->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('rooms.update', $room->id) }}" class="form" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.pages.rooms._partials.form')
            </form>
        </div>
    </div>
@endsection
