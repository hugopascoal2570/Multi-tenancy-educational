@extends('adminlte::page')

@section('title', "Editar o plano: {$plan->name}")

@section('content_header')
    <h1>Editar o plano {{ $plan->name }}</h1>

@stop

@section('content')

    <div class="card">
        <div class="car-body">
            <form action="{{ route('plans.update', ['url' => $plan->url]) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop
