@extends('layout.template')

@section('title')

@endsection

@section('content')
    <div class="d-flex flex-wrap">
        @foreach ($tugas as $tgs)
        <div class="card mr-3" style="width: 15.4rem;">
        <img src="{{asset('storage/'.$tgs->image)}}" class="card-img-top" alt="image" style="max-height: 185px; min-height: 185px; object-fit: cover;">
            <div class="card-body">
                <h4 class="text-center">{{$tgs->name}}</h4>
                <p class="card-text"></p>
                <a href="{{route('tugas-siswas.show', $tgs->id)}}" class="btn btn-primary d-flex justify-content-center">Go somewhere</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
