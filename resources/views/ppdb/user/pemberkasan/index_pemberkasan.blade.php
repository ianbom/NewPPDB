@extends('ppdb.user.layout.user_app')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Daftar Pertanyaan</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="bi bi-house"></i>
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
                <a href="#">Daftar Pertanyaan</a>
            </li>
        </ul>
    </div>

    <div class="row">
        @foreach ($pertanyaan as $item)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-bold">{!! $item->pertanyaan !!}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Jawaban Anda:</strong>
                        @if(isset($jawaban[$item->id]))
                            <span class="badge bg-success">{{ $jawaban[$item->id]->jawaban }}</span>
                        @else
                            <a href="{{ route('pemberkasan.show', $item->id) }}" class="btn btn-sm btn-info"> Tambah Jawaban </a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
