@extends('adminlte::page')

@section('title', 'Plans')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Plans</h1>

        <a href="{{ route('admin.plans.create') }}" class="btn btn-primary">New Plan</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('admin.plans.search') }}" class="form form-inline" method="GET">
                <input name="filter" placeholder="Name" class="form-control col-md-2" value="{{ $filters['filter'] ?? '' }}" />
                <button type="submit" class="btn btn-dark ml-1"><i class="fas fa-search"></i></button>
            </form>
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
                    @if ($plans->isNotEmpty())
                        @foreach($plans as $plan)
                            <tr>
                                <td>{{ $plan->name }}</td>
                                <td>€{{ number_format($plan->price, 2, ',', '.') }}</td>
                                <td style="width: 10%">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.plans.edit', $plan->url) }}" class="btn btn-warning">
                                            <i class="fas fa-pencil-alt text-white"></i>
                                        </a>
                                        <a href="{{ route('admin.plans.show', $plan->url) }}" class="btn btn-info ml-1">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form action="{{ route('admin.plans.destroy', $plan->url) }}" class="ml-1" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">
                                <div class="alert alert-warning alert-dismissible">
                                    No records found
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if (!empty($plans->hasPages()))
            <div class="card-footer">
                @if (!empty($filters))
                    {{ $plans->appends($filters)->links() }}
                @else
                    {{ $plans->links() }}
                @endif
            </div>
        @endif
    </div>
@stop
