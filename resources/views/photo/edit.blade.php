@extends('layouts.main')
@section('content') 
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                    <h4 class="card-title"> Edit Data Foto </h4>

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
                    
                <form action="{{ url("/photo/{$photo->photo_id}") }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Post</label>
                                <select name="post_id" class="form-control">
                                    <option value="{{ $photo->post->post_id }}">{{ $photo->post->post_title }}</option>
                                    @foreach($post as $item)
                                    <option value="{{ $item->post_id }}">{{ $item->post_title}}</option>
                                    @endforeach
            
                                </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tanggal Post</label>
                                <input type="date" name="photo_date" class="form-control @error('photo_date')
                                is-invalid @enderror" value="{{ old('photo_date', $photo->photo_date) }}">
                                @error('photo_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Foto</label>
                        </div>
                        <div class="img-wrapper">
                          <img src="{{ asset('upload/'.$photo->photo_title) }}">
                      </div>
                        <input type="file" name="photo_title" class="form-control @error('photo_title')
                                is-invalid @enderror" value="{{ old('photo_title', $photo->photo_title) }}">
                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan Foto</label>
                                <textarea type="text" name="photo_text" class="form-control @error('photo_text')
                                is-invalid @enderror">{{ old('photo_text', $photo->photo_text)}}</textarea>
                                @error('photo_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Update</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
