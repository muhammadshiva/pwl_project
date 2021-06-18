@extends('layout.template')

@section('title')

@endsection

@section('content')
    <div class="d-flex justify-content-around">
        @foreach ($mapels as $mapel)
        <div class="card mr-5" style="width: 18rem;">
        <img src="{{asset('storage/'.$mapel->image)}}" class="card-img-top" alt="image">
            <div class="card-body">
                <h4 class="text-center">{{$mapel->name}}</h4>
                <p class="card-text"></p>
                <a href="{{route('guru.show', $mapel->id)}}" class="btn btn-primary d-flex justify-content-center">Go somewhere</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
