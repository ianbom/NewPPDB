@extends('ppdb.user.layout.user_app')

@section('content')

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Input Pemberkasan</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="bi bi-archive"></i>
                </a>
            </li>
            <li class="separator">
                <i class="bi bi-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Pemberkasan</a>
            </li>
            <li class="separator">
                <i class="bi bi-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Input Data</a>
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
                        <input type="hidden" name="pertanyaan_id" value="{{ $pemberkasan->id }}">

                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <p><strong>{{ $pemberkasan->pertanyaan }}</strong></p>
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
                                @foreach(['A', 'B', 'C', 'D', 'E'] as $opsi)
                                    @php $opsiKey = 'opsi_' . $opsi; @endphp
                                    @if(!empty($pemberkasan->$opsiKey))
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban" value="{{ $pemberkasan->$opsiKey }}" required>
                                            <label class="form-check-label">{{ $pemberkasan->$opsiKey }}</label>
                                        </div>
                                    @endif
                                @endforeach

                            @elseif($pemberkasan->tipe == 'checkbox')
                                @foreach(['A', 'B', 'C', 'D', 'E'] as $opsi)
                                    @php $opsiKey = 'opsi_' . $opsi; @endphp
                                    @if(!empty($pemberkasan->$opsiKey))
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="jawaban[]" value="{{ $pemberkasan->$opsiKey }}">
                                            <label class="form-check-label">{{ $pemberkasan->$opsiKey }}</label>
                                        </div>
                                    @endif
                                @endforeach
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
