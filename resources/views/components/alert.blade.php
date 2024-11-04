@if ($message)
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        <i class="bi {{ $type === 'success' ? 'bi-check-circle' : 'bi-file-excel' }}"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
