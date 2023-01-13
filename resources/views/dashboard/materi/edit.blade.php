@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col col-lg">

            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{ route('materi.update', $materi->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="judul_materi" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul_materi') is-invalid @enderror" name="judul_materi"
                                id="judul_materi" value="{{ old('judul_materi', $materi->judul_materi) }}" required>
                            @error('judul_materi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_matakuliah" class="form-label">Matakuliah</label>
                            <select class="form-select" name="id_matakuliah" id="id_matakuliah">
                                @foreach ($matakuliahs as $matakuliah)
                                    @if (old('id_matakuliah') == $matakuliah->id)
                                        <option value="{{ $matakuliah->id }}" selected>{{ $matakuliah->nama }}</option>
                                    @else
                                        <option value="{{ $matakuliah->id }}">{{ $matakuliah->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="desc" id="summernote" class="form-control  @error('desc') is-invalid @enderror">{{ $materi->body }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Tambah Materi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
