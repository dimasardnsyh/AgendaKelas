@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card-body">
                <form action="{{ route('guru.update',$guru->id) }}" method="post">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" name="nama_guru" value="{{ $guru->nama_guru }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mapel" value="{{ $guru->mapel }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection