@extends('adminlte::page')

@section('title', "Plan details - {{ $plan->name }}")

@section('content_header')
    <h1>Plan details - {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Name: </strong> {{ $plan->name }}
                </li>

                <li>
                    <strong>URL: </strong> {{ $plan->url }}
                </li>

                <li>
                    <strong>Price: </strong> €{{ number_format($plan->price, 2, ',', '.') }}
                </li>

                <li>
                    <strong>Description: </strong> {{ $plan->description }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.plans.index') }}" class="btn btn-warning">Back</a>
        </div>
    </div>
@stop
