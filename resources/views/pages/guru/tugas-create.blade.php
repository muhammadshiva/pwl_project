
@extends('layout.template')

@section('title')
    <h1>Buat Tugas</h1>
@endsection

@section('content')
<div style="width: 100%;">
    @if ($message = Session::get('success'))
        <div class="alert alert-default-success bg-success" role="alert">
            <strong class="text-white">{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    @endif
</div>
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
        <div class="card-header">Tambah Tugas</div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('guru.store') }}" id="myForm" enctype="multipart/form-data">
    @csrf

        <div class="form-group">
            <label for="id_mapel">Mapel</label>
            <input disabled type="text" value="{{$mapel->name}}" name="name" class="form-control" id="name" aria-describedby="name" >
            <input type="hidden" value="{{$mapel->id}}" name="id_mapel" class="form-control" id="id_mapel" aria-describedby="id_mapel" >
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="name" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="deskripsi" >
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal Dibuat</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal" >
        </div>
        <div class="form-group">
            <label for="duedate">Waktu Pengumpulan</label>
            <input type="date" name="duedate" class="form-control" id="duedate" aria-describedby="tanggal" >
        </div>
        <div class="form-group">
            <label for="file">File: </label>
            <input type="file" class= "form-control" required="required" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    </div>
</div>
@endsection
