@extends('layouts.app')

@section('content')
    <a href="{{ route('eventkpop.create') }}" class="btn btn-info btn-sm">Artikel Baru</a>
    
    @if ($message = Session::get('message'))
        <div class="alert alert-success martop-sm">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-responsive martop-sm">
        <thead>
            <th>ID</th>
            <th>nama</th>
            <th>tempat</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($eventkpops as $eventkpop)
                <tr>
                    <td>{{ $eventkpop->id }}</td>
                    <td><a href="{{ route('eventkpop.show', $eventkpop->id) }}">{{ $eventkpop->nama }}</a></td>
                    <td><a href="{{ route('eventkpop.show', $eventkpop->id) }}">{{ $eventkpop->tempat }}</a></td>
                    <td>
                        <form action="{{ route('eventkpop.destroy', $eventkpop->id) }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('eventkpop.edit', $eventkpop->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection