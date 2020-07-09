@extends('layouts.main')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Welcome Admin</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Selamat Datang di Gadgets Blog
                    <br>
                    Admin  {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
