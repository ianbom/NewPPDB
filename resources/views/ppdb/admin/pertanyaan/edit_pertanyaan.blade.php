@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Edit Pertanyaan</h3>
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
                                <option value="checkbox" {{ $pertanyaan->tipe == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <textarea class="form-control" name="pertanyaan" id="pertanyaan" rows="3" required>{{ $pertanyaan->pertanyaan }}</textarea>
                        </div>

                        <div id="opsi-container" style="display: {{ in_array($pertanyaan->tipe, ['radio', 'checkbox']) ? 'block' : 'none' }};">
                            <label>Opsi Jawaban (Opsional)</label>
                            <input type="text" class="form-control mb-2" name="opsi_A" placeholder="Opsi A" value="{{ $pertanyaan->opsi_A }}">
                            <input type="text" class="form-control mb-2" name="opsi_B" placeholder="Opsi B" value="{{ $pertanyaan->opsi_B }}">
                            <input type="text" class="form-control mb-2" name="opsi_C" placeholder="Opsi C" value="{{ $pertanyaan->opsi_C }}">
                            <input type="text" class="form-control mb-2" name="opsi_D" placeholder="Opsi D" value="{{ $pertanyaan->opsi_D }}">
                            <input type="text" class="form-control mb-2" name="opsi_E" placeholder="Opsi E" value="{{ $pertanyaan->opsi_E }}">
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
    document.addEventListener("DOMContentLoaded", function () {
        let tipeSelect = document.getElementById("tipe");
        let opsiContainer = document.getElementById("opsi-container");

        tipeSelect.addEventListener("change", function () {
            if (this.value === "radio" || this.value === "checkbox") {
                opsiContainer.style.display = "block";
            } else {
                opsiContainer.style.display = "none";
            }
        });
    });
</script>
@endsection
