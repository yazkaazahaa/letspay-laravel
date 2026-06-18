<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nama_siswa',
        'kelas',
        'nama_wali',
        'no_hp_wali',
        'alamat',
        'biaya_bulanan',
        'tanggal_jatuh_tempo'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}