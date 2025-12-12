@include('_header')
<div class="container-fluid py-5"></div>
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Veri Düzenle</span>
                    <a href="{{ route('urunler.index') }}" class="btn btn-secondary btn-sm">Geri Dön</a>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('urunler.update', $veri->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="baslik" class="form-label">Başlık</label>
                            <input type="text" class="form-control" id="baslik" name="baslik"
                                value="{{ old('baslik', $veri->baslik) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="icerik" class="form-label">İçerik</label>
                            <textarea class="form-control" id="icerik" name="icerik" rows="3"
                                required>{{ old('icerik', $veri->icerik) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gorsel" class="form-label">Görsel Yükle (İsteğe bağlı)</label>
                            @if($veri->gorsel)
                                <div class="mb-2">
                                    <img src="{{ asset('images/' . $veri->gorsel) }}" alt="Mevcut Görsel"
                                        style="max-height: 100px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="gorsel" name="gorsel" accept=".jpg,.jpeg,.png">
                            <div class="form-text">Yeni bir görsel yüklerseniz eski görselin yerine geçecektir.</div>
                        </div>
                        <button type="submit" class="btn btn-warning">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('_footer')