@extends("materi.layout_materi.main")

@section("container")
<nav>
    <div class="row border">
        <div class="col pt-1">
         <a href="/beranda" class="a fw-bold fs-5"><i class="bi bi-arrow-left"></i> Penyajian Data </a>
        </div>
        @include('materi.layout_materi.offcanvas')
    </div>
</nav>

<div class="container pt-3 pb-3">
    <article class="p-5">
        <h1 class="fw-bold">PENYAJIAN DATA</h1>
        <p>Setelah mempelajari bagian ini, mahasiswa diharapkan mampu:</p>
        <p>
            <ol class="fs-3">
                <li>Memahami perlunya penyajian data</li>
                <li>Memahami cara penyajian data kategori dengan menggunakan:
                    <ul>
                        <li>Tabel </li>
                        <li>Diagram batang</li>
                        <li>Diagram Lingkar</li>
                    </ul>
                </li>
                <li>Memahami cara penyajian data waktu dengan diagram garis</li>
                <li>Menganalisis distribusi data waktu dengan diagram garis</li>
                <li>Memahami jenis penyajian data yang sesuai untuk data dari berbagai konteks</li>
            </ol>
        </p>

    </article>
</div>

<footer>
    <hr>
    <ul class=" ul d-flex">
        <li class="li"></li>
        <li class="li ms-5 ps-5 fw-bolder b"></li>
        <li class="li">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="materi" value="">
                <button type="submit" class="dropdown-item b">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </form>
        </li>
    </ul>
</footer>
@endsection
