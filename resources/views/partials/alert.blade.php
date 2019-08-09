@if ('success')
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if ('warning')
    <div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif