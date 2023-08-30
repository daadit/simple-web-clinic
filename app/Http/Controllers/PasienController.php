<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->pasien = new Pasien();
    }

    public function index()
    {

        $data = [
            'pasien' => $this->pasien->list(),
            'kodeotomatis' => $this->pasien->generateNextCode(),
        ];
        return view('pasien', $data);
    }

    public function save(Request $request)
    {
        $data = [
            'pasienkode' => Request()->kodehide,
            'pasiennama' => Request()->nama,
            'pasientelepon' => Request()->notelp,
        ];
        $this->pasien->saveData($data);
        return redirect('/pasien')->with('success-message', 'Data saved successfully');
    }

    public function update(Request $request)
    {
        $id = Request()->idpasien;

        $data = [
            'pasienkode' => Request()->kodehide,
            'pasiennama' => Request()->nama,
            'pasientelepon' => Request()->notelp,
        ];
        $this->pasien->updateData($id, $data);
        return redirect('/pasien')->with('success-message', 'Data updated successfully');
    }

    public function delete()
    {
        $id = Request()->idpasien;
        $this->pasien->deleteData($id);
        return redirect('/pasien')->with('success-message', 'Data deleted successfully');
    }
}
