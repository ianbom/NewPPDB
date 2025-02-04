@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Data Siswa</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="bi bi-person"></i>
                </a>
            </li>
            <li class="separator">
                <i class="bi bi-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tables</a>
            </li>
            <li class="separator">
                <i class="bi bi-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data Siswa</a>
            </li>
        </ul>
    </div>
    <div class="row">
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Siswa</h4>
                </div>
                <div class="card-body">

                    <div class="d-flex align-items-center mb-3">
                        <form action="{{ route('siswa.genratePdf') }}" method="GET" class="d-flex align-items-center">
                            <select name="status_id" class="form-select w-auto me-2" required>
                                <option value="">Pilih Status</option>
                                <option value="">Belum Verifikasi</option>
                                @foreach($status as $st)
                                    <option value="{{ $st->id }}">{{ ucfirst($st->tipe) }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-file-earmark-pdf"></i> Export PDF
                            </button>
                        </form>
                    </div>

                    <form id="bulkUpdateForm" action="{{ route('siswa.bulkUpdateStatus') }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-center mb-3">
                            <select name="status_id" class="form-select w-auto me-2" required>
                                <option value="">Pilih Status Baru</option>
                                @foreach($status as $st)
                                    <option value="{{ $st->id }}">{{ ucfirst($st->tipe) }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengubah status siswa yang dipilih?')">
                                <i class="bi bi-arrow-repeat"></i> Update Status
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover">
                                <thead class="">
                                    <tr>
                                        <th class="text-center"><input type="checkbox" id="selectAll"></th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswa as $s)
                                    <tr>
                                        <td class="text-center"><input type="checkbox" name="selected_ids[]" value="{{ $s->id }}"></td>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->name }}</td>
                                        <td>{{ $s->email }}</td>
                                        <td>{{ $s->telp ?? '-' }}</td>
                                        <td>
                                            <span class="badge text-white bg-info">
                                                {{ ucfirst($s->status->tipe ?? 'Belum diverifikasi') }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
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
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]],
        "pageLength": 10 // Default jumlah data yang ditampilkan
    });

    // Select All Checkbox
    $("#selectAll").click(function () {
        $("input[name='selected_ids[]']").prop("checked", this.checked);
    });
});

</script>
@endsection
