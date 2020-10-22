<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrangModel extends Model
{
    use HasFactory;
    protected $table = 'orang';
    protected $fillable = ['nama', 'alamat'];

    public function getAll()
    {
        return DB::table('orang');
    }

    public function searchOrang($keyword)
    {
        return DB::table('orang')
            ->where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('alamat', 'like', '%' . $keyword . '%');
    }
}
