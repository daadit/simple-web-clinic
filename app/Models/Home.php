<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    public function countBarang()
    {
        return DB::table('barang')->get()->count('barangid');
    }

    public function countPasien()
    {
        return DB::table('pasien')->get()->count('pasienid');
    }
}
