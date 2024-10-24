<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';
    protected $fillable = ['kode', 'nama'];

    public function setKodeAttribute($value)
    {
        $this->attributes['kode'] = strtoupper($value);
    }
}
