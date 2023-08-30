<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->barang = new Barang();
    }

    public function index()
    {

        $data = [
            'barang' => $this->barang->list(),
            'kodeotomatis' => $this->barang->generateNextCode(),
        ];
        return view('barang', $data);
    }

    public function save(Request $request)
    {
        $data = [
            'barangnama' => Request()->namahide,
            'barangharga' => Request()->harga,
        ];
        $this->barang->saveData($data);
        return redirect('/barang')->with('success-message', 'Data saved successfully');
    }

    public function update(Request $request)
    {
        $id = Request()->idbarang;

        $data = [
            'barangnama' => Request()->namahide,
            'barangharga' => Request()->harga,
        ];
        $this->barang->updateData($id, $data);
        return redirect('/barang')->with('success-message', 'Data updated successfully');
    }

    public function delete()
    {
        $id = Request()->idbarang;
        $this->barang->deleteData($id);
        return redirect('/barang')->with('success-message', 'Data deleted successfully');
    }
}
