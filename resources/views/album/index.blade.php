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
                    <h4 class="card-title"> Data Album </h4>
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
                    <a href="{{ url("album/add") }}" class="btn btn-success btn-sm">Tambah Data</a>
                      <table class="table">
                        <thead class=" text-primary">
                            <th>No</th>
                            <th>Nama Album</th>
                            <th>Judul Foto</th>
                            <th>Keterangan Album</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($album as $item)
                            <tr>
                            <td>{{ $loop ->iteration }}</td>
                            <td>{{ $item ->album_name }}</td>
                            <td>{{ $item ->photo->photo_title}}</td>
                            <td>{{ $item ->album_text }}</td>
                            <td class="text-center">
                                <a href="{{ url("/album/{$item->album_id}/edit") }}" class="btn btn-primary btn-sm">
                                    Edit</i>
                                </a>
                                <form action="{{ url ("/album/{$item->album_id}") }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin Hapus Data?')">
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
