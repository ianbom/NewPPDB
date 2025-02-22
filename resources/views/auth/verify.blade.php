



 @extends('layouts.app')

@section('content')
<style>
    .ppdb-login {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9f5ec 100%);
        min-height: 100vh;
    }

    .ppdb-info {
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
        padding: 4rem;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .ppdb-card {
        border-radius: 15px;
        border: none;
        max-width: 500px;
        margin: 0 auto;
    }

    .ppdb-card .card-header {
        border-radius: 15px 15px 0 0;
        padding: 1.5rem;
        font-size: 1.5rem;
    }

    .btn-success {
        background-color: #2e7d32;
        border: none;
        padding: 12px;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #1b5e20;
        transform: translateY(-2px);
    }
</style>

<div class="ppdb-login">
    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <div class="col-md-6 ppdb-info d-none d-md-block">
                <div class="school-logo mb-4">
                    <img src="{{ asset('logo-None-iain-madura-f1a016af.jpg') }}" alt="School Logo" class="img-fluid">
                </div>
                <h1 class="text-white mb-3">PPG IAIN MADURA</h1>
                <p class="lead text-white">Tahun Ajaran 2025/2026</p>
                <div class="school-features mt-5">
                    <div class="feature-item">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>Sekolah Berbasis Karakter</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-book"></i>
                        <span>Kurikulum Merdeka Belajar</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card ppdb-card shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0"><i class="fas fa-envelope"></i> Verifikasi Email</h3>
                    </div>

                    <div class="card-body p-4">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Link verifikasi baru telah dikirim ke email Anda.
                            </div>
                        @endif

                        <div class="text-center mb-4">
                            <i class="fas fa-envelope-open-text text-success" style="font-size: 4rem;"></i>
                            <h4 class="mt-3">Verifikasi Email Anda</h4>
                        </div>

                        <p class="text-center mb-4">
                            Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.
                        </p>

                        <p class="text-center mb-4">
                            Jika Anda tidak menerima email verifikasi,
                        </p>

                        <form class="text-center" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                <i class="fas fa-paper-plane"></i> Kirim Ulang Link Verifikasi
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="{{ route('login') }}" class="text-success">
                                <i class="fas fa-arrow-left"></i> Kembali ke Halaman Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
