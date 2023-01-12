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

                    <div class="mb-3">
                        <label for="Matakuliah" class="form-label">Matakuliah</label>
                        <div id="Matakuliah" class="input-group">
                            <select class="form-select" name="role" id="role">
                                <option value="0">Statitiska - Matematika</option>
                                <option value="1">Aljabar Linier - Faktormatika</option>
                                <option value="2">Ilmu Komunikasi - Telematika</option>
                            </select>
                        </div>
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

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Sumbit Materi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
