<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->home = new Home();
    }

    public function index()
    {
        $data = [
            'barang' => $this->home->countBarang(),
            'pasien' => $this->home->countPasien(),
        ];
        return view('home', $data);
    }
}
