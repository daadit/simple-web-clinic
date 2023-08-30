<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('transaksi')->join('pasien', 'pasien.pasienid', '=', 'transaksi.tpasien')->get();
    }

    public function generateNextCode()
    {
        $lastTransaksi = DB::table('transaksi')->orderBy('tid', 'desc')->first();
        
        if ($lastTransaksi) {
            $lastCode = $lastTransaksi->tnoinvoice;
            $lastNumber = intval(substr($lastCode, 8));
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }
        
        $year = date('y');
        $month = date('m');

        return 'INV-' . $year . $month . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function saveData($data)
    {
        DB::table('transaksi')->insert($data);
    }

    public function saveDataDetail($data)
    {
        DB::table('detailtransaksi')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('transaksi')
            ->where('tid', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('transaksi')
            ->where('tid', '=', $id)
            ->delete();
    }

    public function deleteDataDetail($id)
    {
        DB::table('detailtransaksi')
            ->where('dtid', '=', $id)
            ->delete();
    }

    public function getDetail($invoice)
    {
        return DB::table('transaksi')
            ->join('pasien', 'pasien.pasienid', '=', 'transaksi.tpasien')
            ->where('transaksi.tnoinvoice', '=', $invoice)
            ->get();
    }

    public function getDataDetail($invoice)
    {
        return DB::table('detailtransaksi')
            ->join('barang', 'detailtransaksi.dtbarang', '=', 'barang.barangid')
            ->where('detailtransaksi.dtinvoice', '=', $invoice)
            ->get();
    }

    public function countTotalItem($invoice)
    {
        return DB::table('detailtransaksi')->where('detailtransaksi.dtinvoice', '=', $invoice)->count('dtid');
    }

    public function sumTotalHarga($invoice)
    {
        return DB::table('detailtransaksi')->where('detailtransaksi.dtinvoice', '=', $invoice)->sum('dttotal');
    }
}
