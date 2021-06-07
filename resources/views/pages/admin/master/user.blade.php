@extends('layout.template')

@section('content')
<div class="row">
    <div class="col-md-12">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Buat User</h3>
        </div>
        @if(!empty($successMsg))
          <div class="alert alert-success"> {{ $successMsg }}</div>
        @endif
        <form action="{{ route('user.store')}}" method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
                <label for="inputName">Username</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputName">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="level">Level</label>
              <select name="level" id="level" class="form-control custom-select">
                <option selected disabled>Select one</option>
                <option value="1" {{old('level') == "1" ? 'selected' : ''}}>Admin</option>
                <option value="2" {{old('level') == "2" ? 'selected' : ''}}>Guru</option>
                <option value="3" {{old('level') == "3" ? 'selected' : ''}}>Siswa</option>
              </select>
            </div>
            <div class="form-group">
                <label for="inputName">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="inputName">Konfirmasi Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

            <div class="form-group col-12">
                {{-- <button type="reset" class="btn btn-danger">Hapus</button> --}}
                <a href="/" class="btn btn-danger ml-3">Cancel</a>
                <button type="submit" class="btn btn-success float-right mr-3 toastDefaultSuccess">Buat User</button>
            </div>
      </form>
  </div>

  @endsection
