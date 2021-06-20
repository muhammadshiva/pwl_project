@extends('layout.template')

{{-- @section('title') --}}
{{-- @endsection --}}

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
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
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{$tugas->deskripsi}}</h3>
        </div>
        @if(!empty($successMsg))
          <div class="alert alert-success"> {{ $successMsg }}</div>
        @endif
        <form action="{{ route('tugas-siswa.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
                <input type="hidden" class="form-control" name="name_student" value="{{Auth::user()->name}}">
                <input type="hidden" value="{{$tugas->id}}" name="id_assigment" class="form-control" aria-describedby="id_assigment" >
                <input type="hidden" value="{{$tugas->deskripsi}}" name="title" class="form-control" aria-describedby="title">
            </div>
            <div class="form-group">
                <label for="inputName">Komentar</label>
                <input placeholder="Silahkan beri komentar jika Anda membutuhkan" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" autocomplete="name" autofocus>
                @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="file">Upload Tugas Anda</label>
                <input type="file" class="form-control" required="required" name="file">
            </div>
          </div>
            <div class="form-group col-12">
                <a href="/tugas-siswas" class="btn btn-danger ml-3">Batal</a>
                <button type="submit" class="btn btn-success float-right mr-3 toastDefaultSuccess">Kirim Tugas</button>
            </div>
        </form>
    </div>
</div>
@endsection
