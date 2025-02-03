@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner px-4">
    <!-- Header Section -->
    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Detail Siswa</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-house-door"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none">Siswa</a>
                    </li>
                    <li class="breadcrumb-item active">Detail Siswa</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('siswa.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row g-4">
        <!-- Profile Card -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="position-relative mb-4 d-flex justify-content-center">
                        @if($siswa->profile && Storage::exists('public/' . $siswa->profile))
                            <img src="{{ asset('storage/' . $siswa->profile) }}"
                                 class="img-fluid rounded-circle border border-4 border-white shadow"
                                 width="180" height="180"
                                 alt="{{ $siswa->name }}">
                        @else
                            <div class="rounded-circle border border-4 border-white shadow d-flex align-items-center justify-content-center bg-light mx-auto" style="width: 180px; height: 180px;">
                                <i class="bi bi-person-circle text-secondary" style="font-size: 100px; line-height: 1;"></i>
                            </div>
                        @endif
                        <span class="position-absolute bottom-0 end-0 p-2 bg-success rounded-circle" style="transform: translate(-50%, -50%);">
                            <i class="bi bi-check-circle text-white"></i>
                        </span>
                    </div>
                    <h3 class="fw-bold mb-1">{{ $siswa->name }}</h3>
                    <p class="text-muted mb-3">
                        <i class="bi bi-envelope me-2"></i>{{ $siswa->email }}
                    </p>
                    <div class="d-flex justify-content-center gap-3 mb-3">
                        <div class="px-3 py-2 bg-light rounded-3">
                            <i class="bi bi-telephone me-2"></i>{{ $siswa->telp }}
                        </div>
                        <div class="px-3 py-2 bg-light rounded-3">
                            <i class="bi bi-person-badge me-2"></i>Status Seleksi: {{ $siswa->status->tipe }}
                        </div>
                    </div>

                    <!-- Form Ubah Status -->
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="status_id" class="form-label fw-bold">Ubah Status</label>
                            <select name="status_id" id="status_id" class="form-select">
                                @foreach($status as $stat)
                                    <option value="{{ $stat->id }}" {{ $siswa->status_id == $stat->id ? 'selected' : '' }}>
                                        {{ $stat->tipe }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pemberkasan Card -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0 fw-bold">
                            <i class="bi bi-file-earmark-text me-2"></i>Pemberkasan
                        </h4>
                        <span class="badge bg-primary rounded-pill">
                            {{ $pertanyaan->count() }} Berkas
                        </span>
                    </div>
                </div>
                <div class="card-body p-0">
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
                                        $jawabanSiswa = $siswa->jawaban->firstWhere('pertanyaan_id', $pertanyaanItem->id);
                                    @endphp
                                    <tr>
                                        <td class="px-4">{{ $key + 1 }}</td>
                                        <td>{!! $pertanyaanItem->pertanyaan !!}</td>
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
@endsection
