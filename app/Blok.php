<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Blok extends Model
{
    protected $table = 'blok';
    protected $fillable = [
        'nama', 'keterangan'
    ];

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
