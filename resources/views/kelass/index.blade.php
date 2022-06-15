@extends('layouts.admin')

@section('content')
<a href="/kelass/create" type="button" class="btn btn-primary mb-4">Tambah data</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Nama Wali Kelas</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datakelas as $kelass)            
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $kelass->nama_kelas }}</td>
            <td>{{ $kelass->nama_walas }}</td>
            <td>
            <form action="{{ route('kelass.destroy',$kelass->id) }}" method="POST"> 
                <a class="btn btn-primary" href="{{ route('kelass.edit',$kelass->id) }}">Edit</a> 
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