@extends('layout.template')

@section('title')
    <h1>Mata Pelajaran</h1>
@endsection

@section('content')

      <div class="card">
        <div class="card-header">
            <div class="row ">
                <div class="col-sm-auto"><a class="btn btn-primary" href="{{ route('mapel.create') }}"> Input Mata Pelajran Baru</a></div>
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
                      <th>
                          Name
                      </th>
                      <th>
                          Gambar
                      </th>
                      <th>
                          Action
                      </th>
                  </tr>
              </thead>
              <tbody>

                      @foreach ($mapels as $mapel)
                      <tr>
                    <td>
                        <a>
                            {{$mapel->name}}
                        </a>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <img width="100px" height="100px" src="{{asset('storage/'.$mapel->image)}}" alt="image" style="object-fit: cover">
                            </li>
                        </ul>
                    </td>
                    <td class="project-actions">
                        <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST">
                        <a class="btn btn-primary btn-sm" href="{{route('mapel.show', $mapel->id)}}" >
                            <i class="fas fa-folder">
                            </i>
                            Lihat
                        </a>
                        <a class="btn btn-info btn-sm" href="{{route('mapel.edit', $mapel->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Hapus
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
