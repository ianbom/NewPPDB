@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Data Status</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="bi bi-megaphone-fill"></i>
                </a>
            </li>
            <li class="separator">
                <i class="bi bi-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Status Pengumuman</a>
            </li>
            <li class="separator">
                <i class="bi bi-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">List Status Pengumuman</a>
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
                    <h4 class="card-title">Daftar Status</h4>
                    <a href="{{ route('status.create') }}" class="btn btn-sm btn-info"> Buat Status</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipe</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($status as $s)
                                <tr>
                                    <td>{{ $s->id }}</td>
                                    <td>{{ ucfirst($s->tipe) }}</td>
                                    <td>{{ $s->judul }}</td>
                                    <td>{{ Str::limit($s->deskripsi, 50) }}</td>
                                    <td>
                                        <a href="{{ route('status.edit', $s->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('status.destroy', $s->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
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
      $("#basic-datatables").DataTable({});
    });
</script>
@endsection
