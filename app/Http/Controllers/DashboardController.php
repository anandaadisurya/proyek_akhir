<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use App\Models\Daftaruser;
use App\Models\Produk;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

      public function index()
    {

        $totalDummy = Dummy::count();
        $users = Daftaruser::count();
        $produk = Produk::count();
        return view('dashboard.index', compact('totalDummy','users', 'produk'));
    }
}
