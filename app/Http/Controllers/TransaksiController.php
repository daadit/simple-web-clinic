<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pasien;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->transaksi = new Transaksi();
        $this->pasien = new Pasien();
        $this->barang = new Barang();
    }

    public function index()
    {
        $data = [
            'transaksi' => $this->transaksi->list(),
        ];
        return view('transaksi', $data);
    }

    public function addTransaksi()
    {
        $datenow = date('Y-m-d');

        $data = [
            'kodeotomatis' => $this->transaksi->generateNextCode(),
            'datenow' => $datenow,
            'pasien' => $this->pasien->list(),
            'barang' => $this->barang->list(),
        ];
        return view('add-transaksi', $data);
    }

    public function save(Request $request)
    {
        $data = [
            'tnoinvoice' => Request()->invoicehide,
            'ttanggal' => Request()->tanggal,
            'tpasien' => Request()->idpasienhide,
            'ttotalitem' => Request()->totalitemhide,
            'ttotalharga' => Request()->totalbayarhide,
        ];
        $this->transaksi->saveData($data);
        return redirect('/transaksi')->with('success-message', 'Data saved successfully');
    }

    public function update(Request $request)
    {
        $id = Request()->idtransaksi;

        $data = [
            'tnoinvoice' => Request()->namahide,
            'ttanggal' => Request()->harga,
            'tpasien' => Request()->harga,
        ];
        $this->transaksi->updateData($id, $data);
        return redirect('/transaksi')->with('success-message', 'Data updated successfully');
    }

    public function delete()
    {
        $id = Request()->idtransaksi;
        $this->transaksi->deleteData($id);
        return redirect('/transaksi')->with('success-message', 'Data deleted successfully');
    }

    public function detailDelete()
    {
        $id = Request()->id;
        $this->transaksi->deleteDataDetail($id);
    }

    public function detailShow(Request $request)
    {
        $invoice = Request()->invoice;

        $data = [
            'detail' =>  $this->transaksi->getDataDetail($invoice)
        ];

        echo view('table-transaksi', $data);
    }

    public function detailSave(Request $request)
    {
        $data = [
            'dtinvoice' => Request()->invoice,
            'dtbarang' => Request()->idbaranghide,
            'dtjumlah' => Request()->qty,
            'dttotal' => Request()->jumlah,
        ];
        $this->transaksi->saveDataDetail($data);
    }

    public function detailCount(Request $request)
    {
        $invoice = Request()->invoice;

        $data = [
            'totalItem' =>  $this->transaksi->countTotalItem($invoice),
            'totalHarga' =>  $this->transaksi->sumTotalHarga($invoice)
        ];

        return response()->json($data);
    }

    public function fakturtransaksi($id)
    {
        $data = [
            'transaksi' => $this->transaksi->getDetail($id),
            'detailtransaksi' => $this->transaksi->getDataDetail($id),
        ];

        return view('invoice-transaksi', $data);
    }

    public function detailBarang($id)
    {
        $barang = DB::select("SELECT * FROM barang WHERE NOT EXISTS (SELECT * FROM detailtransaksi WHERE barang.barangid = detailtransaksi.dtbarang AND dtinvoice = '$id')");

        $data['barang'] = $barang;
        return view('modal-barang', $data);
    }
}
