@extends('layout.template')

@section('title')
    <h1>Buat Tugas</h1>
@endsection

@section('content')

      <div class="card">
        <div class="card-header">
            <div class="row ">
            <div class="col-sm-auto"><a class="btn btn-primary" href="{{ route('tambahTugas', $id) }}">Input Tugas</a></div>
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
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>

                      @foreach ($tugas as $tgs)
                      <tr>
                    <td>
                            {{$tgs->deskripsi}}
                    </td>
                    <td>
                            {{$tgs->tanggal}}
                    </td>
                    <td>
                            {{$tgs->duedate}}
                    </td>
                    <td class="project-actions">
                        <form action="{{ route('guru.destroy', $tgs->id) }}" method="POST">
                        <a class="btn btn-primary btn-sm" href="{{route('detailTugas', $tgs->id)}}" >
                            <i class="fas fa-eye">
                            </i>
                            See
                        </a>
                        <a class="btn btn-info btn-sm" href="{{route('guru.edit', $tgs->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                      </form>
                    </td>
                </tr>
                      @endforeach


              </tbody>
          </table>
        </div>
      </div>
@endsection
