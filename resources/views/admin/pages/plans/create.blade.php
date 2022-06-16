@extends('adminlte::page')

@section('title', 'Cadastrar novo Plano')

@section('content_header')
    <h1>Cadastrar novo Plano</h1>

@stop

@section('content')

    <div class="card">
        <div class="car-body">
            <form action="{{ route('plans.store') }}" method="POST" class="form">
                @csrf
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop
