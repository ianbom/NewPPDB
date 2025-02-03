@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Edit Pertanyaan</h3>
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
                <a href="#">Edit Pertanyaan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Edit Pertanyaan</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('pertanyaan.update', $pertanyaan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tipe">Tipe Pertanyaan</label>
                            <select class="form-control" name="tipe" id="tipe" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="text" {{ $pertanyaan->tipe == 'text' ? 'selected' : '' }}>Text</option>
                                <option value="date" {{ $pertanyaan->tipe == 'date' ? 'selected' : '' }}>Tanggal</option>
                                <option value="file" {{ $pertanyaan->tipe == 'file' ? 'selected' : '' }}>File Upload</option>
                                <option value="radio" {{ $pertanyaan->tipe == 'radio' ? 'selected' : '' }}>Radio</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="editor">Pertanyaan</label>
                            <div id="editor" style="height: 200px;"></div>
                            <input type="hidden" name="pertanyaan" id="pertanyaan_hidden" value="{{ $pertanyaan->pertanyaan }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

    // Set nilai awal editor dari data yang ada
    quill.root.innerHTML = {!! json_encode($pertanyaan->pertanyaan) !!};

    // Set nilai awal hidden input
    document.getElementById('pertanyaan_hidden').value = quill.root.innerHTML;

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
