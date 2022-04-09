<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function data()
    {
        return $this->hasMany(Data::class);
    }
}
