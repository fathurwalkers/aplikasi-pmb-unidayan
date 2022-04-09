<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Prodi;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data_mahasiswa';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function login()
    {
        return $this->hasMany(Login::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

}
