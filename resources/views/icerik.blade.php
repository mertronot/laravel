@include('_header')
<div class="container-fluid py-5"></div>
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                @if($veri->gorsel)
                    <img src="{{ asset('images/' . $veri->gorsel) }}" class="card-img-top" alt="{{ $veri->baslik }}"
                        style="max-height: 400px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h1 class="card-title text-primary mb-3">{{ $veri->baslik }}</h1>
                    <p class="text-muted small mb-4">
                        <i class="far fa-clock me-1"></i> {{ $veri->created_at->format('d.m.Y H:i') }}
                    </p>
                    <div class="card-text" style="white-space: pre-wrap;">{{ $veri->icerik }}</div>

                    <div class="mt-4 pt-4 border-top">
                        <a href="/" class="btn btn-secondary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i>Geri Dön
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('_footer')