<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lokasi extends Model
{
    protected $table = 'lokasi_parkir';
    protected $fillable = [
        'id_lantai', 'id_blok', 'nomor', 'status'
    ];

    // relasi
    public function lantai()
    {
        return $this->belongsTo('App\Lantai', 'id_lantai');
    }
    public function blok()
    {
        return $this->belongsTo('App\Blok', 'id_blok');
    }

    // public function getCreatedAtAttribute($value)
    // {
    //     $time = Carbon::createFromFormat('Y-m-d H:i:s', $value);

    //     return $time->format('d/m/Y H.i');
    // }

    // public function getUpdatedAtAttribute($value)
    // {
    //     $time = Carbon::createFromFormat('Y-m-d H:i:s', $value);

    //     return $time->format('d/m/Y H.i');
    // }
}
