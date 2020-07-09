@extends('layouts.main')
@section('content') 

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                    <h4 class="card-title"> Tambah Data Post </h4>

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
                <form action="{{ url("/post") }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Kategori</label>
                        <select name="category_id" class="form-control @error('category_id')
                                is-invalid @enderror" value="{{ old('category_id') }}" autofocus">
                        <option value="">-Pilih Kategori-</option>
                        @foreach($category as $item)
                        <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Post</label>
                            <input type="date" name="post_date" class="form-control @error('post_date')
                            is-invalid @enderror" value="{{ old('post_date') }}" autofocus>
                            @error('post_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                      
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Post Slug</label>
                            <input type="text" name="post_slug" class="form-control @error('post_slug')
                            is-invalid @enderror" value="{{ old('post_slug') }}" autofocus>
                            @error('post_slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Judul Post</label>
                            <input type="text" name="post_title" class="form-control @error('post_title')
                            is-invalid @enderror" value="{{ old('post_title') }}" autofocus>
                            @error('post_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea type="text" name="post_text" class="form-control @error('post_text')
                            is-invalid @enderror" >{{ old('post_text') }}</textarea>
                            @error('post_text')
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
