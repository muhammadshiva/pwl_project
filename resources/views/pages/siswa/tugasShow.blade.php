@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-content-center justify-content-between">
                <h5 class="font-weight-bold mt-1">
                    Recent Tasks - {{$tugasMapel->name}}
                </h5>
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
                        <th>Judul</th>
                        <th>Last Modified</th>
                        <th>Due Date</th>
                        <th>Submission Status</th>
                        <th>Actions</th>
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
                            @if ($tgs->file_result == null)
                                <span class="badge badge-warning text-bold text-white" style="padding: 10px;">No attempt</span>
                            @else
                                <span class="badge badge-primary font-weight-bold" style="padding: 10px;">Submitted for grading</span>
                            @endif


                            {{-- <button class="btn btn-primary">Belum</button> --}}
                        </td>
                        <td class="project-actions flex-wrap">
                            <a class="btn btn-primary btn-sm" href="{{route('tugas-siswa.show', $tgs->id)}}" >
                                <i class="fas fa-eye">
                                </i>
                                See
                            </a>
                            <a class="btn btn-info btn-sm"  href="{{route('tugas-siswa.edit', $tgs->id)}}" >
                                <i class="fas fa-book"></i>
                                Send Assigment
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
