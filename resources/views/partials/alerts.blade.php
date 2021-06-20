@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <ul class="mt-2 mb-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
