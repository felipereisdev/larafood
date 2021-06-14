@extends('adminlte::page')

@section('title', 'Create new plan')

@section('content_header')
    <h1>Create new plan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.plans.store') }}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input id="price" name="price" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" name="description" class="form-control" />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@stop
