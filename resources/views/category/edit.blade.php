@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                    <h4 class="card-title"> Edit Data Kategori </h4>

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
                <form action="{{ url("/category/{$category->category_id}") }}" method="POST">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="category_name" class="form-control @error('category_name')
                                is-invalid @enderror" value="{{ old('category_name', $category->category_name) }}">
                                @error('category_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="category_text" class="form-control textarea @error('category_text')
                                is-invalid @enderror">{{ old('category_text', $category->category_text)}}</textarea>
                                @error('category_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                      </div>
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
