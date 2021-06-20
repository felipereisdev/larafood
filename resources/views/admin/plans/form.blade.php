@extends('adminlte::page')

@section('title', 'Create new plan')

@section('content_header')
    <h1>{{ empty($plan) ? 'Create new' : 'Edit' }} plan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('partials.alerts')

            <form action="{{ empty($plan) ? route('admin.plans.store') : route('admin.plans.update', $plan->url) }}" class="form" method="POST">
                @csrf

                @if (!empty($plan))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">Name<span class="text-red text-bold">*</span></label>
                    <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $plan->name ?? old('name') }}" />
                </div>

                <div class="form-group">
                    <label for="price">Price<span class="text-red text-bold">*</span></label>
                    <input id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $plan->price ?? old('price') }}" />
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $plan->description ?? old('description') }}" />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.plans.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop
