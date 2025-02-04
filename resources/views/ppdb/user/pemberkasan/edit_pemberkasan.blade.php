@extends('ppdb.user.layout.user_app')

@section('content')

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Edit Pertanyaan</h3>
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
                <a href="#">Edit Pertanyaan</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Edit Jawaban Pemberkasan</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('pemberkasan.update', $jawaban->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Hidden input untuk pertanyaan_id -->
                        <input type="hidden" name="pertanyaan_id" value="{{ $jawaban->pertanyaan_id }}">

                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <p class="fw-bold">{{ $jawaban->pertanyaan->pertanyaan }}</p>
                        </div>

                        <div class="form-group">
                            <label for="jawaban">Jawaban Anda</label>

                            @if($jawaban->pertanyaan->tipe == 'text')
                                <input type="text" class="form-control" name="jawaban" value="{{ $jawaban->jawaban }}" required>

                            @elseif($jawaban->pertanyaan->tipe == 'date')
                                <input type="date" class="form-control" name="jawaban" value="{{ $jawaban->jawaban }}" required>

                            @elseif($jawaban->pertanyaan->tipe == 'file')
                                <input type="file" class="form-control" name="jawaban">
                                @if($jawaban->jawaban)
                                    <p class="mt-2">File saat ini: <a href="{{ asset('storage/' . $jawaban->jawaban) }}" target="_blank">Lihat Berkas</a></p>
                                @endif

                            @elseif($jawaban->pertanyaan->tipe == 'radio')
                                @foreach(['A', 'B', 'C', 'D', 'E'] as $opsi)
                                    @php $opsiKey = 'opsi_' . $opsi; @endphp
                                    @if(!empty($jawaban->pertanyaan->$opsiKey))
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jawaban" value="{{ $jawaban->pertanyaan->$opsiKey }}" {{ $jawaban->jawaban == $jawaban->pertanyaan->$opsiKey ? 'checked' : '' }} required>
                                            <label class="form-check-label">{{ $jawaban->pertanyaan->$opsiKey }}</label>
                                        </div>
                                    @endif
                                @endforeach

                            @elseif($jawaban->pertanyaan->tipe == 'checkbox')
                                @php $selectedJawaban = json_decode($jawaban->jawaban, true) ?? []; @endphp
                                @foreach(['A', 'B', 'C', 'D', 'E'] as $opsi)
                                    @php $opsiKey = 'opsi_' . $opsi; @endphp
                                    @if(!empty($jawaban->pertanyaan->$opsiKey))
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="jawaban[]" value="{{ $jawaban->pertanyaan->$opsiKey }}" {{ in_array($jawaban->pertanyaan->$opsiKey, $selectedJawaban) ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $jawaban->pertanyaan->$opsiKey }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Jawaban</button>
                        <a href="{{ route('pemberkasan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
