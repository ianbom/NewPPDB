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

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="table table-bordered table-striped">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Status Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pertanyaan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{!! $item->pertanyaan !!}</td>
                            <td>
                                @if(isset($jawaban[$item->id]))
                                    <span class="badge bg-success">Sudah dijawab</span>
                                @else
                                    <span class="badge bg-secondary">Belum dijawab</span>
                                @endif
                            </td>
                            <td>
                                @if(isset($jawaban[$item->id]))
                                    <a href="{{ route('pemberkasan.edit', $jawaban[$item->id]) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                @else
                                    <a href="{{ route('pemberkasan.show', $item->id) }}" class="btn btn-primary btn-sm">Jawab</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
