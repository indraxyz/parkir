<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaksi extends Model
{
    protected $table = 'transaksi_parkir';
    protected $fillable = [
        'nota', 'plat_nomor', 'status', 'durasi', 'id_tarif', 'id_lokasi', 'waktu_masuk', 'waktu_keluar', 'petugas_masuk', 'petuga_keluar', 'biaya'
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d H:i:s',
    //     'updated_at' => 'datetime:d-m-Y H:i:s',
    // ];

    public function lokasi()
    {
        return $this->belongsTo('App\Lokasi', 'id_lokasi');
    }
    public function petugas()
    {
        return $this->belongsTo('App\Pengguna', 'petugas_masuk');
    }
    public function petugasKeluar()
    {
        return $this->belongsTo('App\Pengguna', 'petugas_keluar');
    }
    public function tarif()
    {
        return $this->belongsTo('App\Tarif', 'id_tarif');
    }


    public function getCreatedAtAttribute($time)
    {
        return Carbon::parse($time)->format('d-m-Y H.i');
    }

    public function getUpdatedAtAttribute($time)
    {
        return Carbon::parse($time)->format('d-m-Y H.i');
    }

    public function getWaktuMasukAttribute($time)
    {
        return Carbon::parse($time)->format('d-m-Y H.i');
    }
    public function getWaktuKeluarAttribute($time)
    {
        return Carbon::parse($time)->format('d-m-Y H.i');
    }

    // public function getDurasiAttribute($time)
    // {
    //     return Carbon::parse($time)->format('H.i');
    // }

}
