
@extends('layout.template')

@section('title')
    <h1>User</h1>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
        <div class="card-header">
            Edit User {{$user->name}}
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
    <form method="post" action="{{ route('masterAdmin.update', $user->id) }}" id="myForm">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" ariadescribedby="name" >
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ $user->email }}" ariadescribedby="email" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
</div>
</div>
@endsection
