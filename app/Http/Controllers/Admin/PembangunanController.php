<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\Pembangunan;
use App\Models\Pengeluaran;
use App\Models\Anggaran;
class PembangunanController extends Controller
{
    public function index(Pembangunan $pembangunan, Anggaran $anggaran){
        $pembangunan = $pembangunan::orderBy('id', 'desc')->get();
        $master = $anggaran::orderBy('id', 'desc')->get();
        return view('admin.pembangunan.manage', compact('pembangunan', 'master'));
    }

    public function store(Request $request, Pembangunan $pembangunan, Pengeluaran $pengeluaran){
        $data = [
            'anggaran_id' => $request->anggaran_id,
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date
        ];

        if($pembangunan->create($data)){
            $data =[
                'type' => 'Dana Pembangunan',
                'total' => $request->amount,
                'date' => $request->date,
                'created_by' => 1
            ];
            $storeDataPengeluaran = $pengeluaran->create($data);
            Alert::success('Sukses', 'Simpan berhasil!');
            return to_route('pembangunan.index');
        }else{
            Alert::error('Gagal', 'Simpan gagal! Silahkan coba lagi.');
            return to_route('pembangunan.index');
        }
    }

    public function edit($id, Pembangunan $pembangunan, Anggaran $anggaran){
        $pembangunan = $pembangunan::findOrFail($id);
        $master = $anggaran::orderBy('id', 'desc')->get();
        return view('admin.pembangunan.form_edit', compact('pembangunan', 'master'));
    }

    public function update(Request $request, $id, Pembangunan $pembangunan){
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'anggaran_id' => $request->anggaran_id,
            'amount' => $request->amount,
            'date' => $request->date
        ];

        if($pembangunan->where('id', $id)->update($data)){
            Alert::success('Sukses', 'Update berhasil!');
            return to_route('pembangunan.index');
        }else{
            Alert::error('Gagal', 'Update gagal! Silahkan coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id, Pembangunan $pembangunan){
        if($pembangunan->where('id', $id)->delete()){
            Alert::success('Sukses', 'Hapus berhasil!');
            return to_route('pembangunan.index');
        }else{
            Alert::error('Gagal', 'Hapus gagal! Silahkan coba lagi.');
            return to_route('pembangunan.index');
        }
    }
}
