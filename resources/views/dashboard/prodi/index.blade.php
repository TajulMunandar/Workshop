@extends('dashboard.layouts.main')

@section('content')

    <body>
        <h1>Prodi</h1>
    </body>
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
                                <th>Nama Prodi</th>
                                <th>Nama Ketua Prodi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prodis as $prodi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $prodi->name_prodi }}</td>
                                    <td>{{ $prodi->nama_ketua_prodi }}</td>
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

                                {{-- Modal Tambah Jabatan --}}
                                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Prodi Baru
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('prodi.store') }}" method="post">
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="name_prodi" class="form-label">Nama Prodi</label>
                                                        <input type="text"
                                                            class="form-control @error('name_prodi') is-invalid @enderror"
                                                            name="name_prodi" id="name_prodi"
                                                            value="{{ old('name_prodi') }}" autofocus required>
                                                        @error('name_prodi')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_ketua_prodi" class="form-label">Nama Prodi</label>
                                                        <input type="text"
                                                            class="form-control @error('nama_ketua_prodi') is-invalid @enderror"
                                                            name="nama_ketua_prodi" id="nama_ketua_prodi"
                                                            value="{{ old('nama_ketua_prodi') }}" autofocus required>
                                                        @error('nama_ketua_prodi')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Jabatan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- / Modal Tambah Jabatan --}}

                                {{-- Modal Hapus Prodi --}}
                                <div class="modal fade" id="modalHapus{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Prodi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('prodi.destroy', $prodi->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <div class="modal-body">
                                                    <p class="fs-6">Apakah anda yakin akan Prodi
                                                        <b>{{ $prodi->name_prodi }}</b>?
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

                                {{-- Modal Edit Jabatan --}}
                                <div class="modal fade" id="modalEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Prodi Baru
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('prodi.update', $prodi->id) }}" method="post">
                                                <div class="modal-body">
                                                    @method('put')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="name_prodi" class="form-label">Nama Prodi</label>
                                                        <input type="text"
                                                            class="form-control @error('name_prodi') is-invalid @enderror"
                                                            name="name_prodi" id="name_prodi"
                                                            value="{{ old('name_prodi',$prodi->name_prodi) }}" autofocus required>
                                                        @error('name_prodi')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_ketua_prodi" class="form-label">Nama Prodi</label>
                                                        <input type="text"
                                                            class="form-control @error('nama_ketua_prodi') is-invalid @enderror"
                                                            name="nama_ketua_prodi" id="nama_ketua_prodi"
                                                            value="{{ old('nama_ketua_prodi',$prodi->nama_ketua_prodi) }}" autofocus required>
                                                        @error('nama_ketua_prodi')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Jabatan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- / Modal Edit Jabatan --}}


                            @endforeach
                        </tbody>
                    </table>
                    {{-- End Table --}}
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        const input1 = document.querySelector("#pwd1 input");
        const eye1 = document.querySelector("#pwd1 .fa-eye-slash");

        eye1.addEventListener("click", () => {
            if (input1.type === "password") {
                input1.type = "text";

                eye1.classList.remove("fa-eye-slash");
                eye1.classList.add("fa-eye");
            } else {
                input1.type = "password";

                eye1.classList.remove("fa-eye");
                eye1.classList.add("fa-eye-slash");
            }
        });

        const input2 = document.querySelector("#pwd2 input");
        const eye2 = document.querySelector("#pwd2 .fa-eye-slash");

        eye2.addEventListener("click", () => {
            if (input2.type === "password") {
                input2.type = "text";

                eye2.classList.remove("fa-eye-slash");
                eye2.classList.add("fa-eye");
            } else {
                input2.type = "password";

                eye2.classList.remove("fa-eye");
                eye2.classList.add("fa-eye-slash");
            }
        });
    </script>
@endsection
