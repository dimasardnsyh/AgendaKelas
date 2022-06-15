@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card-body">
                <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Guru</label>
                    <select class="form-select form-control" name="id_guru">
                        <option selected>Nama Guru</option>
                        @foreach ($gurudata as $agenda)
                            <option value="{{ $agenda->id }}">{{ $agenda->nama_guru }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select class="form-select form-control" name="mapel">
                        <option selected>Nama Mapel</option>
                        @foreach ($gurudata as $agenda)
                            <option value="{{ $agenda->id }}">{{ $agenda->mapel }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Materi</label>
                    <input type="text" name="materi"  class="form-control">
                </div>

                <div class="form-group">
                    <label>Jenis Pembelajaran</label>
                    <select class="form-select form-control" name="jenis">
                        <option selected>Online atau Offline</option>
                        <option value="PTM">Tatap Muka</option>
                        <option value="PJJ">Daring / Jarak Jauh</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Link pembelajaran</label>
                    <input type="text" name="link"  class="form-control" placeholder="(  -  ) apabila memilih PTM">
                </div>

                <div class="form-grup">
                    <div class="row">
                        <h3 class="masthead-brand text-black"></h3>
                        <div class="col">Siswa Hadir
                          <input type="number" class="form-control my-2" name="siswa_hadir">
                        </div>
                        <div class="col">Siswa Tidak Hadir
                          <input type="number" class="form-control my-2" name="siswa_tidak_hadir">
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="form-label">Dokumentasi</label>
                    <input type="file" name="dokumentasi"  id="dokumentasi"  class="form-control">
                </div>

                <div class="form-group">
                    <label>Nama Kelas</label>
                    <select class="form-select form-control" name="id_kelas">
                        <option selected>Nama Kelas</option>
                        @foreach ($kelasdata as $agenda)
                            <option value="{{ $agenda->id }}">{{ $agenda->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Keterangan</label>
                    <textarea  class="form-control" name="keterangan"  id="keterangan" rows="3"></textarea>
                </div>

                <div class="form-grup">
                    <div class="row">
                        <h3 class="masthead-brand text-black"></h3>
                        <div class="col">Jam Mulai
                          <input type="time" class="form-control my-2" name="jam_mulai" placeholder="08.00 WIB">
                        </div>
                        <div class="col">Jam Akhir
                          <input type="time" class="form-control my-2" name="jam_akhir" placeholder="10.00 WIB">
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection