@extends('layout.template')

@section('title')
    <h1>Siswa</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row ">
                {{-- <div class="col-sm-auto"><a class="btn btn-primary" href="{{ route('tugas.create') }}">Input Mata Pelajran Baru</a></div> --}}
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-2">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Waktu Pengumpulan</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugas as $tgs)
                    <tr>
                        <td>
                            <a>
                                {{$tgs->deskripsi}}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$tgs->tanggal}}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$tgs->duedate}}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{$tgs->file}}
                            </a>
                        </td>
                        <td class="project-actions">
                            <a class="btn btn-primary btn-sm" href="{{route('tugas-siswa.show', $tgs->id)}}" >
                                <i class="fas fa-folder">
                                </i>
                                Lihat
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('mapel.edit', $tgs->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Kirim Tugas
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
