
@extends('layout.template')

@section('title')
    <h1>Mapel Create</h1>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
        <div class="card-header">Tambah Mata Pelajaran</div>
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
    <form method="post" action="{{ route('mapel.store') }}" id="myForm" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Nama Mata Pelajaran</label>
            <input type="name" name="name" class="form-control" id="name" aria-describedby="name" >
        </div>
        <div class="form-group">
            <label for="image">Gambar Mata Pelajaran: </label>
            <input type="file" class= "form-control" required="required" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    </div>
</div>
@endsection
