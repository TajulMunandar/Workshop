@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col col-md-6">

            <div class="card mt-3">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                id="nim" value="" autofocus required>
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                id="nama" value="" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="asalkampus" class="form-label">Asal Sekolah</label>
                            <input type="text" class="form-control @error('asalkampus') is-invalid @enderror"
                                name="asalkampus" id="asalkampus" value="" required>
                            @error('asalkampus')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div id="pwd" class="input-group">
                                <input type="password"
                                    class="form-control border-end-0 @error('password') is-invalid @enderror"
                                    name="password" id="password" value="" required>
                                <span class="input-group-text cursor-pointer">
                                    <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
                                </span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role">
                                <option value="0">Mahasiswa</option>
                                <option value="1">Guru</option>
                                <option value="2">Operator</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Tambah User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/show-hide-password.js') }}"></script>
@endsection
