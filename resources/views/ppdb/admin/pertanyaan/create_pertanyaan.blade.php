@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Tambah Pertanyaan</h3>
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
                <a href="#">Pertanyaan</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Pertanyaan</a>
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
                            <select class="form-control" name="tipe" id="tipe" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="text">Text</option>
                                <option value="date">Tanggal</option>
                                <option value="file">File Upload</option>
                                <option value="radio">Radio</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="editor">Pertanyaan</label>
                            <!-- Div untuk Quill editor -->
                            <div id="editor" style="height: 200px;"></div>
                            <!-- Hidden input untuk menyimpan konten -->
                            <input type="hidden" name="pertanyaan" id="pertanyaan_hidden">
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
<!-- Pastikan Quill JS dan CSS sudah di-include di layout -->
<script>
    // Inisialisasi Quill
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                ['clean']
            ]
        }
    });

    // Update hidden input sebelum form disubmit
    document.querySelector('form').addEventListener('submit', function() {
        var content = quill.root.innerHTML;
        document.getElementById('pertanyaan_hidden').value = content;
    });

    // Optional: Update hidden input saat content berubah
    quill.on('text-change', function() {
        var content = quill.root.innerHTML;
        document.getElementById('pertanyaan_hidden').value = content;
    });
</script>
@endsection
