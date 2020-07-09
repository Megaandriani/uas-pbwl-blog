@extends('layouts.main')
@section('content') 
<div class="content mt-3">
    <div class="animated fadeIn">
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Data Foto </h4>
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
                    <div class="table-responsive">
                    <a href="{{ url("photo/add") }}" class="btn btn-success btn-sm">Tambah Data</a>
                      <table class="table">
                        <thead class=" text-primary">
                            <th>No</th>
                            <th>Nama Post</th>
                            <th>Tanggal Post</th>
                            <th>Foto</th>
                            <th>Keterangan Foto</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($photo as $item)
                            <tr>
                            <td>{{ $loop-> iteration }}</td>
                            <td>{{ $item ->post->post_title }}</td>
                            <td>{{ $item ->photo_date }}</td>
                            <td><img src="{{ asset('upload/'.$item->photo_title) }}" class="img-table" width="100px" height="100px"></td>
                            <td>{{ $item ->photo_text }}</td>
                            <td>
                                <a href="{{ url("/photo/{$item->photo_id}/edit") }}" class="btn btn-primary btn-sm">
                                   Edit</i>
                                </a>
                                <form action="{{ url ("/photo/{$item->photo_id}") }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                       Hapus  
                                    </button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
