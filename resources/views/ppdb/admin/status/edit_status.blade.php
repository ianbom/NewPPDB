@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Edit Status</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Status</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit Status</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Edit Status</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('status.update', $status->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tipe">Tipe Status</label>
                            <select class="form-control" name="tipe" id="tipe" required>
                                <option value="verifikasi" {{ $status->tipe == 'verifikasi' ? 'selected' : '' }}>Verifikasi</option>
                                <option value="administrasi" {{ $status->tipe == 'administrasi' ? 'selected' : '' }}>Administrasi</option>
                                <option value="lolos" {{ $status->tipe == 'lolos' ? 'selected' : '' }}>Lolos</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" value="{{ $status->judul }}" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required>{{ $status->deskripsi }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('status.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
