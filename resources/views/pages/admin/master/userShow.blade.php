
@extends('layout.template')

@section('title')
    <h1>Detail User</h1>
@endsection

@section('content')
<div class="container">
    <div class="row col-md-12">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            Nama : {{$user->name}}
        </div>
        <div class="card-header">
            Email : {{$user->email}}
        </div>
        <div class="card-header">
            Level :
            @if ($user->level==1)
                Admin
            @elseif($user->level==2)
                Guru
            @elseif($user->level==3)
                Siswa
            @endif
        </div>
        <a class="btn btn-success mt-3" href="{{ route('admin') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection
