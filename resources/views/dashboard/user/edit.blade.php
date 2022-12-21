@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col col-md-6">

            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                id="nim" value="{{ old('nim', $user->nim) }}" autofocus required>
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name',$user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="asalkampus" class="form-label">Asal Sekolah</label>
                            <input type="text" class="form-control @error('asalkampus') is-invalid @enderror"
                                name="asalkampus" id="asalkampus" value="{{ old('asalkampus',$user->asalkampus) }}" required>
                            @error('asalkampus')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_prodi" class="form-label">Prodi</label>
                            <select class="form-select" name="id_prodi" id="id_prodi">
                              @foreach ($prodis as $prodi)
                                @if (old('id_prodi') == $prodi->id)
                                  <option value="{{ $prodi->id }}" selected>{{ $prodi->name_prodi }}</option>
                                @else
                                  <option value="{{ $prodi->id }}">{{ $prodi->name_prodi }}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role">
                                <option value="0">Mahasiswa</option>
                                <option value="1">Dosen</option>
                                <option value="3">ketua Prodi</option>
                                <option value="4">Admin</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Edit User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/show-hide-password.js') }}"></script>
@endsection
