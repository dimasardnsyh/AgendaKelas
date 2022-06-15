<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_guru','id_kelas','materi','jenis','link','siswa_hadir',
        'siswa_tidak_hadir','dokumentasi','keterangan','jam_mulai','jam_akhir'
    ];


    public function guru()
    {
        return $this->belongsTo('App\Models\Guru', 'id_guru');
    }
    
    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
}
