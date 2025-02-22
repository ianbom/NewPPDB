@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner">
    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-3">Data Siswa</h3>


        <a href="{{ route('siswa.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row g-4">

        @if (session('success'))
        <div class="alert alert-info alert-dismissible alert-label-icon rounded-label fade show" role="alert">
            <i class="ri-checkbox-circle-line label-icon"></i>
            <strong>Sukses</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label fade show" role="alert">
            <i class="ri-checkbox-circle-line label-icon"></i>
            <strong>Error</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Profile Card -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="position-relative mb-4 d-flex justify-content-center">
                        @if($siswa->profile )
                            <img src="{{ asset('storage/' . $siswa->profile) }}"
                                 class="img-fluid border border-2 border-dark shadow"
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
                            <i class="bi bi-telephone me-2"></i>{{ $siswa->telp ?? '-'}}
                        </div>
                        <div class="px-3 py-2 bg-light rounded-3">
                            <i class="bi bi-person-badge me-2"></i>Status Seleksi: {{ $siswa->status->tipe ?? 'Belum verifikasi' }}
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

                    <br>
                    <a href="{{ route('siswa.editPassword', $siswa->id) }}" class="btn btn-secondary w-100"> Ubah Password</a>
                    <br>
                    <br>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Apakah Anda yakin ingin mengahpus siswa ini')">
                            <i class="bi bi-trash-fill me-2"></i> Hapus Siswa
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
                                                    <span class="">
                                                       {{ $jawabanSiswa->jawaban }}
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

@section('scripts')
<script>
$(document).ready(function () {
    $("#basic-datatables").DataTable({
    });

});

</script>
@endsection
