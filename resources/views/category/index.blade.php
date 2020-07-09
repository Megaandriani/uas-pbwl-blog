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
                    <h4 class="card-title"> Data Kategori </h4>

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
                <a href="{{ url("category/add") }}" class="btn btn-success btn-sm">Tambah Data</a>
                  <table class="table">
                    <thead class=" text-primary">
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @foreach($category as $item)
                            <tr>
                            <td>{{ $loop-> iteration }}</td>
                            <td>{{ $item ->category_name }}</td>
                            <td>{{ $item ->category_text }}</td>
                            <td>
                                <a href="{{ url("/category/{$item->category_id}/edit") }}" class="btn btn-primary btn-sm">
                                    Edit</i>
                                </a>
                                <form action="{{ url ("/category/{$item->category_id}") }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin Hapus Data?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                       Hapus</i>  
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
