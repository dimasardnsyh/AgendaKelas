@extends('layouts.admin')

@section('content')

    <h3 class="py-2">Nama guru : {{ $agenda->guru['nama_guru'] }} </h3>
    <h3 class="py-2">Nama Mata Pelajaran : {{ $agenda->guru['mapel'] }}</h3>
    <h3 class="py-2">Materi : {{ $agenda->materi }}</h3>
    <h3 class="py-2">Jenis Pembelajaran :  {{ $agenda->jenis }}</h3>
    <h3 class="py-2">Link Pembelajaran :  {{ $agenda->materi }}</h3>
    <h3 class="py-2">Nama Kelas : {{ $agenda->kelas['nema_kelas'] }}</h3>
    <h3 class="py-2">Siswa hadir :  {{ $agenda->siswa_hadir }}</h3>
    <h3 class="py-2">Siswa tidak hadir :  {{ $agenda->siswa_tidak_hadir }}</h3>
    <h3 class="py-2">Keterangan :  {{ $agenda->keterangan }}</h3>
    <h3 class="py-2">Dokumentasi</h3>
    <td>
        <img src="{{ asset('storage/dokumentasi-img/'.$agenda->dokumentasi) }}" style="width: 200px">
    </td>
    <h3 class="py-2">jam mulai :  {{ $agenda->jam_mulai }}</h3>
    <h3 class="py-2">Jam Akhir : {{ $agenda->jam_akhir }}</h3>
@endsection