@props(['status'])

@if (Session::has($status))
<div class="card {{ $status == 'success' ? 'bg-info' : 'bg-danger' }} bg-gradient text-center">
    <div class="p-4 text-white rounded fw-bold">{{ session($status) }}</div>
</div>
@endif