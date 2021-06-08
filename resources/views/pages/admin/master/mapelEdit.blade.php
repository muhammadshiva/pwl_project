
@extends('layout.template')

@section('title')
    <h1>Edit Mata Pelajaran</h1>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
        <div class="card-header">
            Edit Mata Pelajaran {{$mapel->name}}
        </div>
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
    <form method="post" action="{{ route('mapel.update', $mapel->id) }}" id="myForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $mapel->name }}" ariadescribedby="name" >
        </div>
        <div class="form-group">
            <label for="image">Foto</label>
            <input type="file" class="form-control" required="required" name="image" value="{{$mapel->image}}"></br>
            <img width="150px" src="{{asset('storage/'.$mapel->image)}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
</div>
</div>
@endsection
