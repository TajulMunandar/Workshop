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
            <a class="btn btn-primary" href="{{ route('materi.create') }}">
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
                                <th>Judul Materi</th>
                                <th>Nama Matakuliah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materis as $materi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $materi->judul_materi }}</td>
                                <td>{{ $materi->matakuliahs->nama }}</td>
                                <td>
                                    <a href="{{ route('materi.edit', $materi->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus{{ $loop->iteration }}">
                                        <i class="fa-regular fa-trash-can fa-lg"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal Hapus User --}}
                            <div class="modal fade" id="modalHapus{{ $loop->iteration }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Materi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('materi.update', $materi->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <div class="modal-body">
                                                <p class="fs-6">Apakah anda yakin akan menghapus materi
                                                    <b>{{ $materi->judul_materi }}</b>?</p>
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
                            @endforeach
                        </tbody>
                    </table>
                    {{-- End Table --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
