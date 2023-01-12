@extends('homepage.layouts.main')
@section('container')
    <section class="beranda">
        <div class="row image d-flex">
            <div class="col caption d-none d-md-block">
                <div id="current_date" class="mb-2"></div>
                <h4 class="fs-3">Selamat Datang {{ auth()->user()->nama }}!</h4>
                <p>Semoga Harimu Menyenangkan.</p>
            </div>
            <div class="col img float end">
                <img src="img/book.png" alt="" width="40%" class="float-end">
            </div>
        </div>

        <div class="container my-2 py-5">
            <p class="text-choose text-center ">NAMA PRODI</p>
            <h3 class="h3-choose text-center">Silahkan Pelajari Materi Dibawah</h3>
            <div class="row my-5 py-3">
                <div class="col card-choose">
                    <div class="card card-icon">
                        <div class="card-body mb-5">
                            <center><svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 448 512">
                                    <path
                                        d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg></center>
                            <h5 class="card-title">Nama Matakuliah</h5>
                            <h4 class="card-title">Nama Dosen</h4>
                            <p class="card-text">Judul Materi</p>
                        </div>
                        <div class="card-body cb-bottom">
                            <p class="text-cb">Pelajari Materi<img src="img/panahkanan.svg" alt="" class="panah"></p>
                        </div>
                    </div>
                </div>
                <div class="col card-choose">
                    <div class="card card-icon">
                        <div class="card-body mb-5">
                            <center><svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 448 512">
                                    <path
                                        d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg></center>
                            <h5 class="card-title">Nama Matakuliah</h5>
                            <h4 class="card-title">Nama Dosen</h4>
                            <p class="card-text">Judul Materi</p>
                        </div>
                        <div class="card-body cb-bottom">
                            <p class="text-cb">Pelajari Materi<img src="img/panahkanan.svg" alt="" class="panah"></p>
                        </div>
                    </div>
                </div>
                <div class="col card-choose">
                    <div class="card card-icon">
                        <div class="card-body mb-5">
                            <center><svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 448 512">
                                    <path
                                        d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg></center>
                            <h5 class="card-title">Nama Matakuliah</h5>
                            <h4 class="card-title">Nama Dosen</h4>
                            <p class="card-text">Judul Materi</p>
                        </div>
                        <div class="card-body cb-bottom">
                            <p class="text-cb">Pelajari Materi<img src="img/panahkanan.svg" alt="" class="panah"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
