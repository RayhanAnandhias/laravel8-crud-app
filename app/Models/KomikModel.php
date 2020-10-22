<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomikModel extends Model
{
    use HasFactory;
    protected $table = 'komik';
    protected $fillable = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function getKomik($slug = false)
    {
        if (!$slug) return $this->all();
        return $this->where('slug', '=', $slug)->first();
    }
}
