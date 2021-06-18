@extends('layout.template')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 200vh;">
        <div class="card-header">Upload Tugas Mata Pelajaran {{$tugas->mapel->name}}
            @if ($tugas->file_result != null)
                <span class="font-weight-bold text-danger"> *Anda sudah mengumpulkan tugas</span>
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
    <form method="post" action="{{ route('tugas-siswa.update', $tugas->id) }}" id="myForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="file_result">Upload Tugas Anda</label>
                <input type="file" class="form-control" required="required" name="file_result">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    </div>
    <div class="d-flex">
    <h3 class="text-bold">Jawaban:</h3>
    @if ($tugas->file_result != null)
        <div class="pl-1" style="position: relative; overflow: hidden; width: 100%;">
            <iframe src="{{asset('storage/'.$tugas->file_result)}}" width="100%" height="900" style="border: none" ></iframe>
        </div>
    @else

    <span class="text-danger font-weight-bold mt-1 pl-1"> *Sepertinya Anda masih belum mengumpulkan tugas</span>

    @endif
    </div>

</div>
@endsection
