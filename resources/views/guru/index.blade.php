@extends('layouts.admin')

@section('content')
<a href="/guru/create" type="button" class="btn btn-primary mb-4">Tambah data</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Guru</th>
            <th scope="col">Mata Pelajaran</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataguru as $guru)            
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $guru->nama_guru }}</td>
            <td>{{ $guru->mapel }}</td>
            <td>
            <form action="{{ route('guru.destroy',$guru->id) }}" method="POST"> 
                <a class="btn btn-primary" href="{{ route('guru.edit',$guru->id) }}">Edit</a> 
                @csrf 
                @method('DELETE') 
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection