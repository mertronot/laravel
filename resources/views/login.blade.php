<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oturum Açma Sayfası Taslağı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Sayfayı Ortalamak ve Temel Stili Ayarlamak İçin Özel CSS */
        body {
            background-color: #f0f2f5;
            /* Hafif, Kurumsal Bir Arka Plan Rengi */
        }

        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
            /* Dikeyde Ortala */
            justify-content: center;
            /* Yatayda Ortala */
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            /* Kartın Maksimum Genişliği */
            border: none;
            /* Kenarlığı Kaldır */
            border-radius: 10px;
            /* Hafif Yuvarlak Köşeler */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            /* Belirgin Gölge */
        }

        .btn-custom {
            background-color: #007bff;
            /* Mavi Buton Rengi */
            border-color: #007bff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="card login-card">
            <div class="card-body p-4 p-md-5">
                @if (session('mesaj'))
                    <div class="alert alert-danger">
                        {{ session('mesaj') }}
                    </div>
                @endif

                <h3 class="card-title text-center mb-4 fw-bold text-primary">Proje Adı</h3>
                <p class="text-center text-muted mb-4">Oturum açmak için bilgilerinizi girin</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">E-posta Adresi</label>
                        <input type="email" class="form-control" id="email" name="e_posta" placeholder="ornek@mail.com"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Şifre</label>
                        <input type="password" class="form-control" id="password" name="parola" placeholder="••••••••"
                            required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe" name="beni_hatirla">
                            <label class="form-check-label" for="rememberMe">
                                Beni Hatırla
                            </label>
                        </div>

                        <a class="text-decoration-none small" href="#">
                            Şifremi Unuttum?
                        </a>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-custom btn-lg text-white">
                            Giriş Yap
                        </button>
                    </div>

                </form>
                <div class="text-center mt-4">
                    <p class="text-muted small mb-0">Hesabın yok mu? <a href="/uye-ol"
                            class="text-decoration-none fw-bold">Kayıt Ol</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>