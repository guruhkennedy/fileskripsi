@if ($message = Session::get('success'))
    <div class="alert alert-warning alert-dismissible show fade" role="alert">
        <div>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif