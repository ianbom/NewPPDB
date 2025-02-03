@extends('ppdb.user.layout.user_app')

@section('content')
<div class="page-inner">
    <!-- Header Section -->
    <div class="page-header mb-4">
        <div class="d-flex align-items-center">
            <div class="page-icon bg-primary rounded-circle p-3 me-3">
                <i class="bi bi-megaphone-fill text-white fs-4"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-1">Pengumuman Kelulusan</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-house-door"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Pengumuman</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Status Card -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    @if($user->status)
                        <!-- Status Verifikasi -->
                        @if($user->status->tipe === 'verifikasi')
                        <div class="text-center mb-4">
                            <div class="display-1 text-warning mb-3">
                                <i class="bi bi-hourglass-split"></i>
                            </div>
                            <h4 class="fw-bold text-warning mb-3">{{ $user->status->judul }}</h4>
                            <div class="text-muted">
                                {!! nl2br(e($user->status->deskripsi)) !!}
                            </div>
                            <div class="alert alert-warning mt-4">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Berkas Anda sedang dalam proses verifikasi. Harap tunggu informasi selanjutnya.
                            </div>
                        </div>

                        <!-- Status Administrasi -->
                        @elseif($user->status->tipe === 'administrasi')
                        <div class="text-center mb-4">
                            <div class="display-1 text-info mb-3">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <h4 class="fw-bold text-info mb-3">{{ $user->status->judul }}</h4>
                            <div class="text-muted">
                                {!! nl2br(e($user->status->deskripsi)) !!}
                            </div>
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Silakan lengkapi berkas administrasi yang diperlukan.
                            </div>
                        </div>

                        <!-- Status Lolos -->
                        @elseif($user->status->tipe === 'lolos')
                        <div class="text-center mb-4">
                            <div class="display-1 text-success mb-3">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <h4 class="fw-bold text-success mb-3">{{ $user->status->judul }}</h4>
                            <div class="text-muted">
                                {!! nl2br(e($user->status->deskripsi)) !!}
                            </div>
                            <div class="alert alert-success mt-4">
                                <i class="bi bi-trophy-fill me-2"></i>
                                Selamat! Anda telah dinyatakan lolos seleksi.
                            </div>
                            <a href="#" class="btn btn-success mt-3">
                                <i class="bi bi-download me-2"></i>
                                Unduh Surat Kelulusan
                            </a>
                        </div>

                        <!-- Status Ditolak -->
                        @elseif($user->status->tipe === 'ditolak')
                        <div class="text-center mb-4">
                            <div class="display-1 text-danger mb-3">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                            <h4 class="fw-bold text-danger mb-3">{{ $user->status->judul }}</h4>
                            <div class="text-muted mb-4">
                                {!! nl2br(e($user->status->deskripsi)) !!}
                            </div>
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-circle-fill me-2"></i>
                                Mohon maaf, Anda belum memenuhi kriteria yang ditentukan.
                            </div>
                        
                        </div>
                        @endif
                    @else
                        <!-- Status Belum Ada -->
                        <div class="text-center mb-4">
                            <div class="display-1 text-secondary mb-3">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <h4 class="fw-bold text-secondary mb-3">Menunggu Pengumuman</h4>
                            <div class="text-muted">
                                Pengumuman kelulusan belum tersedia. Silakan cek kembali nanti.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="col-md-4">
            <!-- Contact Support -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">
                        <i class="bi bi-headset me-2"></i>Butuh Bantuan?
                    </h6>
                    <p class="text-muted small mb-3">Jika Anda memiliki pertanyaan, silakan hubungi tim support kami:</p>
                    <div class="d-grid gap-2">
                        <a href="https://wa.me/1234567890" class="btn btn-success btn-sm">
                            <i class="bi bi-whatsapp me-2"></i>WhatsApp
                        </a>
                        <a href="mailto:support@example.com" class="btn btn-primary btn-sm">
                            <i class="bi bi-envelope me-2"></i>Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.page-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    border-radius: 0.75rem;
}

.alert {
    border-radius: 0.5rem;
}

.btn {
    border-radius: 0.5rem;
}

/* Animation for rejected status */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.text-danger.display-1 {
    animation: fadeIn 0.5s ease-out;
}
</style>
@endsection
