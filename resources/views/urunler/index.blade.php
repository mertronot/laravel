@include('_header')
<div class="container-fluid py-5"></div>
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Ürünler / Veriler</span>
                    <a href="{{ route('urunler.create') }}" class="btn btn-primary btn-sm">Yeni Ekle</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Görsel</th>
                                    <th>Başlık</th>
                                    <th>İçerik</th>
                                    <th>Tarih</th>
                                    <th width="150">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($veriler as $veri)
                                    <tr>
                                        <td>{{ $veri->id }}</td>
                                        <td>
                                            @if($veri->gorsel)
                                                <img src="{{ asset('images/' . $veri->gorsel) }}" alt="Görsel"
                                                    style="max-height: 50px;">
                                            @else
                                                <span class="text-muted">Yok</span>
                                            @endif
                                        </td>
                                        <td>{{ $veri->baslik }}</td>
                                        <td>{{ Str::limit($veri->icerik, 50) }}</td>
                                        <td>{{ $veri->created_at->format('d.m.Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('urunler.edit', $veri->id) }}"
                                                class="btn btn-warning btn-sm">Düzenle</a>
                                            <form action="{{ route('urunler.destroy', $veri->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Bu veriyi silmek istediğinize emin misiniz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Henüz veri eklenmemiş.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('_footer')