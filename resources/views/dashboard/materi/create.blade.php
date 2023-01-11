@extends('dashboard.layouts.main')

@section('content')
<div class="row">
    <div class="col">
        <div class="card mt-3">
            <div class="card-body">
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

                    <div class="form-group mb-3">
                        <label for="">Upload Image</label>
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
            </div>
        </div>
    </div>
</div>
@endsection
