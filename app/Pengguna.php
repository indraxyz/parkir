<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = [
        'username', 'password', 'akses', 'nama', 'mail', 'tlp'
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d H:i:s',
    //     'updated_at' => 'datetime:d-m-Y H:i:s',
    // ];

    public function getCreatedAtAttribute($time)
    {
        return Carbon::parse($time)->format('d-m-Y H.i');
    }

    public function getUpdatedAtAttribute($time)
    {
        return Carbon::parse($time)->format('d-m-Y H.i');
    }

}
