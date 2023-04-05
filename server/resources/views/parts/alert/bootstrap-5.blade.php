{{-- if alert--}}
@if (session('alert'))
    <div class="alert alert-{{session('alert.type')}} alert-dismissible fade show mt-3 mb-0" role="alert" id="liveAlert">
        <div>{!! nl2br(e(session('alert.message'))) !!}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- if any validation error --}}
@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show mt-3 mb-0" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
