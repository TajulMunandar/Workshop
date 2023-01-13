@extends('homepage.layouts.main')
@section('container')
    <section class="beranda">
        <div class="row-cols-12 image d-flex">
            <div class="col caption d-none d-md-block">
                <div id="current_date" class="mb-2"></div>
                <h4 class="fs-3">Selamat Datang {{ auth()->user()->name }}!</h4>
                <p>Semoga Harimu Menyenangkan.</p>
            </div>
            <div class="col">
                <img src="img/book.png" alt="" width="40%" class="float-end">
            </div>
        </div>
        <div class="container py-5">
            <p class="text text-center fw-bolder fs-3">{{ auth()->user()->prodis->name_prodi }}</p>
            <h3 class="h3 text-center fw-normal">Silahkan Pelajari Materi Dibawah</h3>

            <div class="row py-3">
                @foreach ($materis as $materi)
                <div class="col-lg-3 mt-5">
                    <div class="card">
                        <div class="card-body mb-5">
                            <div class="row d-block">
                                <div class="col d-flex justify-content-center">
                                    <i class="fa-book fa-solid h2 text-primary"></i>
                                </div>
                                <div class="col">
                                    <h4 class="card-title text-center text-primary mb-3">{{ $materi->matakuliahs->nama }}</h4>
                                    <h5 class="card-title text-center">{{ $materi->matakuliahs->users->name }}</h5>
                                    <p class="card-text text-center">{{ $materi->judul_materi }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer  ">
                            <a href="/materi/{{ $materi->id }}" class="btn btn-info ms-2 d-block text-white">Pelajari Materi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
