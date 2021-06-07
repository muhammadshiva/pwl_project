
@extends('layout.template')

@section('title')
    <h1>Detail Mata Pelajaran</h1>
@endsection

@section('content')
<div class="container">
    <div class="row col-md-12">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            Mata Pelajaran {{$mapel->name}}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <img src="{{asset('storage/'.$mapel->image)}}" alt="image"
                style="margin-left: auto; margin-right: auto; marginBottom: 10px; max-width: 300px;">
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('mapel.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection
