<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('barang')->get();
    }

    public function generateNextCode()
    {
        $lastBarang = DB::table('barang')->orderBy('barangid', 'desc')->first();
        
        if ($lastBarang) {
            $lastCode = $lastBarang->barangnama;
            $lastNumber = intval(substr($lastCode, 6));
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }
        
        $year = date('y');
        $month = date('m');

        return 'P-' . $year . $month . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function saveData($data)
    {
        DB::table('barang')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('barang')
            ->where('barangid', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('barang')
            ->where('barangid', '=', $id)
            ->delete();
    }
}
