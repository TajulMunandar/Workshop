@extends("materi.layout_materi.main")

@section("container")
<nav>
    <div class="row border">
        <div class="col pt-1">
         <a href="/beranda" class="a fw-bold fs-5"><i class="bi bi-arrow-left"></i> {{ $materi->matakuliahs->nama }} </a>
        </div>
        @include('materi.layout_materi.offcanvas')
    </div>
</nav>

<div class="container pt-3 pb-3">
    <article class="p-5">
        <h1 class="fw-bold">{{ $materi->judul_materi }}</h1>
        <div class="row-cols-12">
            <div class="col">
                {!! $materi->body !!}
            </div>
        </div>

    </article>
</div>

<footer>
    <hr>
    <ul class=" ul d-flex">
        <li class="li"></li>
        <li class="li ms-5 ps-5 fw-bolder b">{{ $materi->judul_materi }}</li>
        <li class="li">
            {{-- <form action="" method="post"> --}}
                {{-- @csrf --}}
                {{-- <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="materi" value=""> --}}
                <a href="/beranda" class="btn btn-outline-success">
                    Selesai <i class="bi bi-chevron-right"></i>
                </a>
            {{-- </form> --}}
        </li>
    </ul>
</footer>
@endsection
