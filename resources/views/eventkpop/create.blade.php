@extends('layouts.app')

@section('content')
<h4>Artikel Baru</h4>
<form action="{{ route('eventkpop.store') }}" method="post">
    {{csrf_field()}}
    <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
        <label for="nama" class="control-label">nama</label>
        <input type="text" class="form-control" name="nama" placeholder="nama">
        @if ($errors->has('nama'))
            <span class="help-block">{{ $errors->first('nama') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('tempat') ? 'has-error' : '' }}">
        <label for="tempat" class="control-label">tempat</label>
        <textarea name="tempat" cols="30" rows="5" class="form-control"></textarea>
        @if ($errors->has('tempat'))
            <span class="help-block">{{ $errors->first('tempat') }}</span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route('eventkpop.index') }}" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection