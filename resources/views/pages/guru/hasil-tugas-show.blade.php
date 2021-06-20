
@extends('layout.template')

@section('title')
    <h1>Detail Mata Pelajaran</h1>
@endsection

@section('content')
<div class="container">
    <object data="{{asset('storage/' . $hasil->file)}}" type="application/pdf" class="w-100" height="600" id="viewerPdf">
        <iframe src="https://docs.google.com/viewer?url={{asset('storage/' .  $hasil->file)}}&embedded=true"></iframe>
    </object>
</div>
@endsection
