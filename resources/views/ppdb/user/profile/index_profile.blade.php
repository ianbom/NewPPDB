@extends('ppdb.user.layout.user_app')

@section('content')
<div class="page-inner py-4" style="background: #f8f9fa;">
    <div class="container">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-primary mb-1">Profil Saya</h2>
                <p class="text-muted mb-0">Kelola informasi profil Anda</p>
            </div>
        </div>

        <div class="row">
            <!-- Profil Card -->
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('profile.update2') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <!-- Profile Picture Section -->
                            <div class="position-relative mb-4">
                                <div class="d-flex justify-content-center">
                                    @if($profile->profile)
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $profile->profile) }}"
                                                 class="border border-3 border-secondary shadow-sm preview-image"
                                                 width="120" height="160"
                                                 alt="{{ $profile->name }}"
                                                 style="object-fit: cover;">
                                            <label for="profile-input" class="position-absolute bottom-0 end-0 mb-1 me-1 bg-white rounded p-1 cursor-pointer shadow-sm">
                                                <i class="bi bi-camera-fill text-primary"></i>
                                            </label>
                                        </div>
                                    @else
                                        <div class="position-relative">
                                            <div class="preview-container border border-3 border-white shadow-sm d-flex align-items-center justify-content-center bg-light"
                                                 style="width: 120px; height: 160px;">
                                                <i class="bi bi-person-fill text-secondary default-icon" style="font-size: 60px;"></i>
                                                <img class="preview-image d-none" style="width: 120px; height: 160px; object-fit: cover;" alt="Preview">
                                            </div>
                                            <label for="profile-input" class="position-absolute bottom-0 end-0 mb-1 me-1 bg-white rounded p-1 cursor-pointer shadow-sm">
                                                <i class="bi bi-camera-fill text-primary"></i>
                                            </label>
                                        </div>
                                    @endif
                                    <input type="file" id="profile-input" name="profile" class="d-none" accept="image/*">
                                </div>
                            </div>


                            <!-- Form Fields -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $profile->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ $profile->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" id="telp" name="telp" class="form-control" value="{{ $profile->telp ?? '' }}">
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Kata Sandi (Opsional)</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Isi jika ingin mengubah password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-check2-circle me-2"></i>Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Detail Info Card -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h4 class="card-title mb-0 fw-bold">
                            <i class="bi bi-info-circle me-2"></i>Informasi Detail
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <!-- Status Verifikasi -->
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <h6 class="mb-0">Status Seleksi</h6>
                                    </div>
                                    <p class="mb-0 text-muted">
                                        {{ $profile->status->tipe ?? 'Belum Verifikasi' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Status Pendaftaran -->
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-card-checklist text-primary me-2"></i>
                                        <h6 class="mb-0">Status Pendaftaran</h6>
                                    </div>
                                    <p class="mb-0 text-muted">Pendaftaran Aktif</p>
                                </div>
                            </div>

                            <!-- Bergabung Sejak -->
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar-check text-info me-2"></i>
                                        <h6 class="mb-0">Bergabung Sejak</h6>
                                    </div>
                                    <p class="mb-0 text-muted">
                                        {{ $profile->created_at->format('d F Y') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Terakhir Update -->
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-clock-history text-warning me-2"></i>
                                        <h6 class="mb-0">Terakhir Update</h6>
                                    </div>
                                    <p class="mb-0 text-muted">
                                        {{ $profile->updated_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h4 class="card-title mb-0 fw-bold">
                            <i class="bi bi-info-circle me-2"></i>Informasi Berkas
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="px-4">#</th>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pertanyaan as $key => $pertanyaanItem)
                                            @php
                                                $jawabanSiswa = $profile->jawaban->firstWhere('pertanyaan_id', $pertanyaanItem->id);
                                            @endphp
                                            <tr>
                                                <td class="px-4">{{ $key + 1 }}</td>
                                                <td>{{ $pertanyaanItem->pertanyaan }}</td>
                                                <td>
                                                    @if($jawabanSiswa)
                                                        @if(Str::startsWith($jawabanSiswa->jawaban, 'siswa/berkas/'))
                                                            <a href="{{ asset('storage/' . $jawabanSiswa->jawaban) }}"
                                                               target="_blank"
                                                               class="btn btn-sm btn-outline-primary">
                                                                <i class="bi bi-file-earmark-pdf me-2"></i>Lihat Berkas
                                                            </a>
                                                        @else
                                                            <span class="text-success">
                                                                <i class="bi bi-check-circle me-2"></i>{{ $jawabanSiswa->jawaban }}
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span class="text-danger">
                                                            <i class="bi bi-x-circle me-2"></i>Belum Dijawab
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
</div>


<style>
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .bg-light {
        background-color: #f8f9fa !important;
    }


    .cursor-pointer {
        cursor: pointer;
    }

</style>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
      $("#basic-datatables").DataTable({});
    });
  </script>

<script>
    document.getElementById('profile-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Jika ada gambar profile yang sudah ada
                const existingImage = document.querySelector('.preview-image');
                if (existingImage) {
                    existingImage.src = e.target.result;
                    existingImage.classList.remove('d-none');

                    // Sembunyikan icon default jika ada
                    const defaultIcon = document.querySelector('.default-icon');
                    if (defaultIcon) {
                        defaultIcon.classList.add('d-none');
                    }
                }
            };
            reader.readAsDataURL(file);
        }
    });
    </script>

@endsection
