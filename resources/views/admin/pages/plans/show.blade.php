@extends('adminlte::page')

@section('title', "Detalhes do plano { $plan->name }")

@section('content_header')
    <h1>Detalhes do plano{{ $plan->name }}</h1>

@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="car-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{ $plan->name }}
                </li>
                <li>
                    <strong>URL: </strong>{{ $plan->url }}
                </li>
                <li>
                    <strong>Preço: </strong>R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong>{{ $plan->description }}
                </li>
            </ul>
        </div>

    </div>
    <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Deletar o {{ $plan->name }}</button>
    </form>
@stop
