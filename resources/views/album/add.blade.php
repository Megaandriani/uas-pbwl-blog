@extends('layouts.main')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Tambah Data Album </h4>
            </div>
            </div>
        </div>
    </div>
</div> 

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">  
                <div class="card-body">
                <form action="{{ url("/album") }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Album</label>
                        <input type="text" name="album_name" class="form-control @error('album_name')
                        is-invalid @enderror" value="{{ old('album_name') }}" autofocus>
                        @error('album_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror 
                      </div>
                    </div>
                  </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Judul Foto</label>
                                <select name="photo_id" class="form-control @error('photo_id')
                                is-invalid @enderror" value="{{ old('photo_id') }}" autofocus>
                                    <option value="">-Pilih Judul Foto-</option>
                                    @foreach($photo as $item)
                                    <option value="{{ $item->photo_id }}">{{ $item->photo_title }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
                      
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                                <textarea type="text" name="album_text" class="form-control @error('album_text')
                                is-invalid @enderror" >{{ old('album_text') }}</textarea>
                                @error('album_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
