@extends('ppdb.admin.layout.admin_app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">Edit Password Siswa</h2>

    {{-- Success message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form for updating password --}}
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <form action="{{ route('siswa.updatePassword', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Input for new password --}}
            <div class="mb-4 position-relative">
                <label for="password" class="form-label fw-semibold">Password Baru</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password baru" required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                        <i class="bi bi-eye-slash" id="passwordIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Update Password</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');

        // Toggle password visibility
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordIcon.classList.remove('bi-eye-slash');
            passwordIcon.classList.add('bi-eye');
        } else {
            passwordField.type = 'password';
            passwordIcon.classList.remove('bi-eye');
            passwordIcon.classList.add('bi-eye-slash');
        }
    });
</script>
@endsection
