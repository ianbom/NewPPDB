@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Buat Pertanyaan</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="bi bi-book-half"></i>
                </a>
            </li>
            <li class="separator">
                <i class="bi bi-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Pertanyaan</a>
            </li>
            <li class="separator">
                <i class="bi bi-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Buat Siswa</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Tambah Pertanyaan</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('pertanyaan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tipe">Tipe Pertanyaan</label>
                            <select class="form-control" name="tipe" id="tipe" required onchange="toggleOptions()">
                                <option value="">-- Pilih Tipe --</option>
                                <option value="text">Text</option>
                                <option value="date">Tanggal</option>
                                <option value="file">File Upload</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" required>
                        </div>

                        <div id="opsi-container" style="display: none;">
                            <label>Opsi Jawaban (Opsional)</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="opsi_A" placeholder="Opsi A">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="opsi_B" placeholder="Opsi B">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="opsi_C" placeholder="Opsi C">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="opsi_D" placeholder="Opsi D">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="opsi_E" placeholder="Opsi E">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pertanyaan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function toggleOptions() {
        let tipe = document.getElementById('tipe').value;
        let opsiContainer = document.getElementById('opsi-container');

        if (tipe === 'radio' || tipe === 'checkbox') {
            opsiContainer.style.display = 'block';
        } else {
            opsiContainer.style.display = 'none';
        }
    }
</script>
@endsection
