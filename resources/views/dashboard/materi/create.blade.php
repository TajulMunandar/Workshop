@extends('dashboard.layouts.main')

@section('content')
<form action="/store" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
        <label for="">Masukan Judul</label>
        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul">
        @error('judul')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group mb-3"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        {{-- Summernote CSS --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
        <label for="">Upload Image</label>
        <div class="py-2">
            <img class="img-preview">
        </div>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
            id="image" onchange="previewImage()">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="">Masukan Artikel</label>
        <textarea name="desc" id="summernote" class="form-control  @error('desc') is-invalid @enderror"></textarea>
        @error('desc')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
