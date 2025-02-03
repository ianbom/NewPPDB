@extends('ppdb.user.layout.user_app')

@section('content')

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Jawaban Pemberkasan</h3>
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
                <a href="#">Pemberkasan</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Jawaban Pemberkasan</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Jawaban Pemberkasan</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('pemberkasan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Hidden input untuk pertanyaan_id -->
                        <input type="hidden" name="pertanyaan_id" value="{{ $pemberkasan->id }}">

                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan co</label>
                            <span>{!! $pemberkasan->pertanyaan !!}</span>
                        </div>

                        <div class="form-group">
                            <label for="jawaban">Jawaban Anda</label>

                            @if($pemberkasan->tipe == 'text')
                                <input type="text" class="form-control" name="jawaban" required>

                            @elseif($pemberkasan->tipe == 'date')
                                <input type="date" class="form-control" name="jawaban" required>

                            @elseif($pemberkasan->tipe == 'file')
                                <input type="file" class="form-control" name="jawaban" required>

                            @elseif($pemberkasan->tipe == 'radio')
                                <input type="text" class="form-control" name="jawaban" placeholder="Masukkan pilihan jawaban" required>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pemberkasan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
