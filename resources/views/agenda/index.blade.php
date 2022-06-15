@extends('layouts.admin')

@section('content')
<a href="/agenda/create" type="button" class="btn btn-primary mb-4">Tambah data</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Guru</th>
            <th scope="col">Nama Mapel</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Jenis</th>
            <th scope="col">Dokumentasi</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataagenda as $agenda)            
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $agenda->guru->nama_guru }}</td>
            <td>{{ $agenda->guru->mapel }}</td>
            <td>{{ $agenda->kelas->nama_kelas }}</td>
            <td>{{ $agenda->jenis }}</td>
            
            <td>
                <img src="{{ asset('storage/dokumentasi-img/'.$agenda->dokumentasi) }}" style="width: 40px">
            </td>
            <td>
            <form action="{{ route('agenda.destroy',$agenda->id) }}" method="POST"> 
                <a class="btn btn-info" href="{{ route('agenda.show',$agenda->id) }}">Detail</a> 
                <a class="btn btn-primary" href="{{ route('agenda.edit',$agenda->id) }}">Edit</a> 
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