@extends('layouts.main')
@section('content') 
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                    <h4 class="card-title"> Edit Data Post </h4>

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
                <form action="{{ url("/post/{$post->post_id}") }}" method="POST">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kategori</label>
                            <select name="category_id" class="form-control">
                                <option value="{{ $post->category->category_id }}">{{ $post->category->category_name }}</option>
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
                                is-invalid @enderror" value="{{ old('post_date', $post->post_date) }}">
                                @error('post_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Slug</label>
                                <input type="text" name="post_slug" class="form-control @error('post_slug')
                                is-invalid @enderror" value="{{ old('post_slug', $post->post_slug) }}">
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
                                is-invalid @enderror" value="{{ old('post_title', $post->post_title) }}">
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
                                is-invalid @enderror">{{ old('post_text', $post->post_text)}}</textarea>
                                @error('post_text')
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
