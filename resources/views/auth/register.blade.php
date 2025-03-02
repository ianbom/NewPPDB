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

    .school-logo img {
        max-width: 150px;
        margin-bottom: 2rem;
    }

    .school-features .feature-item {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        color: #fff;
    }

    .school-features .feature-item i {
        font-size: 1.5rem;
        width: 40px;
        color: #c8e6c9;
    }

    .input-group-text {
        border-radius: 8px 0 0 8px !important;
        border: none !important;
    }

    .form-control {
        border-radius: 0 8px 8px 0 !important;
        padding: 12px 15px;
        border: 1px solid #dee2e6;
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
                        <h3 class="mb-0"><i class="fas fa-user-plus"></i> Pendaftaran Akun PMB</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required>
                                </div>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" placeholder="Alamat Email" required>
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" placeholder="Kata Sandi" required>
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100 mb-3">
                                <i class="fas fa-user-plus"></i> DAFTAR
                            </button>

                            <div class="text-center pt-3">
                                <p class="text-muted">Sudah punya akun?
                                    <a href="{{ route('login') }}" class="text-success fw-bold">
                                        Masuk disini
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
