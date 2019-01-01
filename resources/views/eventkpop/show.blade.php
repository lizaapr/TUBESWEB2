@extends('layouts.app')

@section('content')
<h4>{{ $eventkpop->nama }}</h4>
<p>{{ $eventkpop->tempat }}</p>
<a href="{{ route('eventkpop.index') }}" class="btn btn-default">Kembali</a>
@endsection