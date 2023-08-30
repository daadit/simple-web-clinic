<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('pasien')->get();
    }

    public function generateNextCode()
    {
        $lastPasien = DB::table('pasien')->orderBy('pasienid', 'desc')->first();
        
        if ($lastPasien) {
            $lastCode = $lastPasien->pasienkode;
            $lastNumber = intval(substr($lastCode, 7));
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }
        
        $year = date('y');
        $month = date('m');

        return 'EM-' . $year . $month . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function saveData($data)
    {
        DB::table('pasien')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('pasien')
            ->where('pasienid', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('pasien')
            ->where('pasienid', '=', $id)
            ->delete();
    }
}
