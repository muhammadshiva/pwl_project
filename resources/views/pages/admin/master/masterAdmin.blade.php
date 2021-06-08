@extends('layout.template')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Admin</h3>
      <!-- SidebarSearch Form -->

        <form action="{{ route('masterAdmin.index')}}" method="get">
          <input class="form-control" type="text" name='keywords' placeholder="Search by name" aria-label="Search">
        </form>

    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th>
                    Name
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Level
                 </th>
                  <th>
                    Action
                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach ($posts as $User)
              <tr>
                  <td>
                    {{$User->name}}
                  </td>
                  <td>
                    {{$User->email}}
                  </td>
                  <td>
                    @if ($User->level==1)
                        Admin
                    @elseif($User->level==2)
                        Guru
                    @elseif($User->level==3)
                        Siswa
                    @endif
                  </td>
                  <td class="project-actions">
                    <form action="{{ route('masterAdmin.destroy', $User->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" href="{{route('masterAdmin.show', $User->id)}}" >
                        <i class="fas fa-folder">
                        </i>
                        Lihat
                    </a>
                    <a class="btn btn-info btn-sm" href="{{route('masterAdmin.edit', $User->id)}}">
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
      <div class="d-flex float-right mt-3">
        {{$posts->links('pagination::bootstrap-4')}}
    </div>
    </div>
  </div>
@endsection
