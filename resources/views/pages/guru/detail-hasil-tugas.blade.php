@extends('layout.template')

@section('title')
    <h1>Tugas Dikumpulkan</h1>
@endsection

@section('content')

      <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                    <th>Nama Siswa</th>
                    <th>Tugas</th>
                    <th>Comment</th>
                    <th>File Tugas</th>
                  </tr>
              </thead>
              <tbody>

                      @foreach ($hasil as $hsl)
                      <tr>
                    <td>
                            {{$hsl->name_student}}
                    </td>
                    <td>
                            {{$hsl->title}}
                    </td>
                    <td>
                            {{$hsl->comment}}
                    </td>
                    <td class="project-actions">
                        <form action="{{ route('hasil.destroy', $hsl->id) }}" method="POST">
                        <a class="btn btn-primary btn-sm" href="{{route('hasilTugasShow', $hsl->id)}}" >
                            <i class="fas fa-eye">
                            </i>
                            See
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
