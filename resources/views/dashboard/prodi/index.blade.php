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
            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="fa-regular fa-plus me-2"></i>
                Tambah
            </a>

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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus">
                                        <i class="fa-regular fa-trash-can fa-lg"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal Hapus User --}}
                            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Prodi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            @method('delete')
                                            @csrf
                                            <div class="modal-body">
                                                <p class="fs-6">Apakah anda yakin akan menghapus Data prodi
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
                            {{-- / Modal Hapus User --}}

                            {{-- Modal Edit --}}
                            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                                    <label for=" Nama Prodi" class="form-label">Prodi</label>
                                                    <div id="pwd1" class="input-group">
                                                        <input type="Prodi"
                                                            class="form-control border-end-0 @error('Prodi') is-invalid @enderror"
                                                            name="Prodi" id="Prodi" value=""
                                                            required>
                                                        @error('Prodi')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="KetuaProdi" class="form-label">Ubah Nama Ketua
                                                        Prodi</label>
                                                    <div id="pwd1" class="input-group">
                                                        <input type="KetuaProdi"
                                                            class="form-control border-end-0 @error('KetuaProdi') is-invalid @enderror"
                                                            name="KetuaProdi" id="KetuaProdi" value=""
                                                            required>
                                                        @error('KetuaProdi')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- / Modal edit --}}

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
                                        <form action="/dashboard/user/reset-password" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="">
                                                <div class="mb-3">
                                                    <label for="Prodi" class="form-label"> Nama Prodi</label>
                                                    <div id="pwd1" class="input-group">
                                                        <input type=" Nama Prodi"
                                                            class="form-control border-end-0 @error(' Nama Prodi') is-invalid @enderror"
                                                            name=" Nama Prodi" id=" Nama Prodi" value=""
                                                            required>
                                                        @error(' Nama Prodi')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for=" Nama Prodi" class="form-label"> Nama Ketua
                                                        Prodi</label>
                                                    <div id="pwd1" class="input-group">
                                                        <input type=" Nama Prodi"
                                                            class="form-control border-end-0 @error(' Nama Prodi') is-invalid @enderror"
                                                            name=" Nama Prodi" id=" Nama Prodi" value=""
                                                            required>
                                                        @error(' Nama Prodi')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
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
                            {{-- / Modal Tambah --}}
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
