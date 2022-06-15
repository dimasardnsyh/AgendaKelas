@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card-body">
                <form action="{{ route('guru.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Guru </label>
                    <input type="text" class="form-control" name="nama_guru">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mapel">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection