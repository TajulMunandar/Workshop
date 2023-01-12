@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="fa-regular fa-plus me-2"></i>
                Tambah
            </button>

            <div class="card mt-3">
                <div class="card-body">
                    {{-- Table --}}
                    <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Matakuliah</th>
                                <th>Prodi</th>
                                <th>Dosen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matakuliahs as $matkul)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $matkul->nama }}</td>
                                <td>{{ $matkul->prodis->name_prodi }}</td>
                                <td>{{ $matkul->users->name }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $loop->iteration }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $loop->iteration }}">
                                        <i class="fa-regular fa-trash-can fa-lg"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal Hapus User --}}
                            <div class="modal fade" id="modalHapus{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Mata Kuliah</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route("matakuliah.destroy", $matkul->id ) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <div class="modal-body">
                                                <p class="fs-6">Apakah anda yakin akan menghapus <b>{{ $matkul->nama }}</b>
                                                    <b></b>?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                {{-- / Modal Hapus Prodi --}}

                            {{-- Modal Reset Password --}}
                            <div class="modal fade" id="modalEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="/dashboard/user/reset-password" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="">
                                                <div class="mb-3">
                                                    <label for=" Matakuliah" class="form-label">Ubah Nama Matakuliah</label>
                                                    <div id="pwd1" class="input-group">
                                                        <input type="Matakuliah"
                                                            class="form-control border-end-0 @error('Matakuliah') is-invalid @enderror"
                                                            name="Matakuliah" id="Matakuliah" value=""
                                                            required>
                                                        @error('Matakuliah')
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
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- / Modal Edit --}}

                            {{-- / Modal Tambah --}}
                            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('matakuliah.store') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="id">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label"> Nama Matakuliah</label>
                                                    <div id="pwd1" class="input-group">
                                                        <input type="name"
                                                            class="form-control border-end-0 @error('nama') is-invalid @enderror"
                                                            name="nama" id="nama" required>
                                                        @error('nama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
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
                                                    <label for="id_user" class="form-label">User</label>
                                                    <select class="form-select" name="id_user" id="id_user">
                                                      @foreach ($users as $user)
                                                        @if (old('id_user') == $user->id)
                                                          <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                        @else
                                                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endif
                                                      @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- / Modal Tambah --}}
                        </tbody>
                    </table>
                    {{-- End Table --}}
                </div>
            </div>
        </div>
    </div>

@endsection
