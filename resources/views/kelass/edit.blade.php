@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card-body">
                <form action="{{ route('kelass.update',$kelass->id) }}" method="post">
                    @csrf
                    @method('PUT')

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" name="nama_kelas" value="{{ $kelass->nama_kelas }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Wali Kelas</label>
                    <input type="text" class="form-control" name="nama_walas" value="{{ $kelass->nama_walas }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection