@extends('adminlte::page')

@section('title', 'Plans')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Plans</h1>

        <a href="{{ route('admin.plans.create') }}" class="btn btn-primary">Create</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #Filters
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>€{{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td style="width: 10%">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('admin.plans.show', $plan->url) }}" class="btn btn-info">View</a>

                                    <form action="{{ route('admin.plans.destroy', $plan->url) }}" class="ml-1" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (!empty($plans->hasPages()))
            <div class="card-footer">
                {{ $plans->links() }}
            </div>
        @endif
    </div>
@stop
