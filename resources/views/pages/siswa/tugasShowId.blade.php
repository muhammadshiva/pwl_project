@extends('layout.template')

@section('title')
    {{-- <h1>Siswa</h1> --}}
@endsection

@section('content')
    <h1>Tugas Mata Pelajaran - {{$tugas->mapel->name}}</h1>
    <table class="table bg-white">
        <thead>
            <tr>
            <th scope="col">Deadline</th>
            <th scope="col">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{$tugas->duedate}}</td>
            <td scope="row">{{$tugas->deskripsi}}</td>
            </tr>
        </tbody>
    </table>
    <div style="position: relative; overflow: hidden; width: 100%; ">
        <iframe src="{{asset('storage/'.$tugas->file)}}" width="100%" height="900"></iframe>
    </div>
@endsection
