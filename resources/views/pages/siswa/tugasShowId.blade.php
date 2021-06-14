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

@endsection
