<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\Anggaran;
use App\Models\KasMasjid;
use App\Models\Pembangunan;
use App\Models\Material;
use App\Models\Pengeluaran;
class PengeluaranController extends Controller
{
    public function index(){
       $totalKas = KasMasjid::sum('amount');
       $totalAnggaran = Anggaran::sum('amount');
       $totalPengeluaran = Pengeluaran::sum('total');
       $totalPembangunan = Pembangunan::sum('amount');

       $data = Pengeluaran::orderBy('id', 'desc')->take(3)->get();
        return view('admin.pengeluaran.analisa', compact('totalKas','totalAnggaran','totalPengeluaran','totalPembangunan', 'data'));
    }
}
